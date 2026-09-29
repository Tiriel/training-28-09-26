<?php

namespace App\Controller;

use App\Entity\Book;
use App\Entity\Loan;
use App\Loan\LoanManager;
use App\Repository\LoanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_USER')]
final class LoanController extends AbstractController
{
    #[Route('/loan', name: 'app_loan_index', methods: ['GET'])]
    public function index(LoanRepository $loans): Response
    {
        return $this->render('loan/index.html.twig', [
            'loans' => $loans->findBy(['user' => $this->getUser()], ['loanDate' => 'DESC']),
        ]);
    }

    #[Route('/new/{id:book}', name: 'app_loan_new', methods: ['POST'])]
    public function new(Book $book, LoanManager $manager): Response
    {
        try {
            $manager->createLoan($book, $this->getUser());
            $this->addFlash('success', 'Book loaned.');
        } catch (\RuntimeException $e) {
            $this->addFlash('error', $e->getMessage());
        }

        return $this->redirectToRoute('app_book_index');
    }

    #[Route('/{id:loan}/return', name: 'app_loan_return', methods: ['POST'])]
    public function return(Loan $loan, LoanManager $manager): Response
    {
        if ($loan->getUser() !== $this->getUser()) {
            throw $this->createAccessDeniedException('You can only return your own loans.');
        }

        $manager->returnLoan($loan);

        return $this->redirectToRoute('app_loan_index');
    }
}
