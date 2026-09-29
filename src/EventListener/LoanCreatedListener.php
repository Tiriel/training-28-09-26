<?php

namespace App\EventListener;

use App\Event\LoanCreatedEvent;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;

#[AsEventListener]
final class LoanCreatedListener
{
    public function __construct(
        private readonly LoggerInterface $logger,
    ) {}

    public function __invoke(LoanCreatedEvent $event): void
    {
        $loan = $event->loan;
        $this->logger->info('Loan created', [
            'loan_id' => $loan->getId(),
            'user'    => $loan->getUser()->getEmail(),
            'book'    => $loan->getBook()->getTitle(),
            'dueDate' => $loan->getDueDate()->format(\DateTimeInterface::ATOM),
        ]);
    }
}
