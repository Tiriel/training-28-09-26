<?php

namespace App\Loan;

use App\Entity\Book;
use App\Entity\Loan;
use App\Entity\User;
use App\Event\LoanCreatedEvent;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use function Symfony\Component\Clock\now;

class LoanManager
{
    public function __construct(
        private readonly EntityManagerInterface $manager,
        private readonly EventDispatcherInterface $dispatcher,
        private readonly LoanDurationPolicyInterface $policy,
    ) {}

    public function createLoan(Book $book, User $user): Loan
    {
        if (!$book->isAvailable()) {
            throw new UnavailableBookException($book);
        }

        $duration = $this->policy->getDurationDays($user);

        $loan = (new Loan())
            ->setBook($book)
            ->setUser($user)
            ->setLoanDate(now())
            ->setDueDate(now()->modify('+'.$duration.' days'))
            ->setStatus(LoanStatus::Active);
        ;
        $book->setAvailable(false);

        $this->manager->persist($loan);
        $this->manager->flush();

        $this->dispatcher->dispatch(new LoanCreatedEvent($loan));

        return $loan;
    }

    public function returnLoan(Loan $loan): Loan
    {
        $loan
            ->setReturnDate(now())
            ->setStatus(LoanStatus::Returned);
        $loan->getBook()->setAvailable(true);

        $this->manager->flush();

        return $loan;
    }
}
