<?php

namespace App\Controller\Admin;

use App\Entity\Book;
use App\Form\BookType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BookController extends AbstractController
{
    #[Route('/admin/books/new', name: 'app_admin_book_new')]
    #[Route('/admin/books/{id}/edit', name: 'app_admin_book_edit')]
    public function save(
        Request $request,
        EntityManagerInterface $em,
        ?Book $book = null
    ): Response {
        $isNew = $book === null;
        $book ??= new Book();

        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($book);
            $em->flush();

            $this->addFlash('success', $isNew ? 'Book created.' : 'Book updated.');

            return $this->redirectToRoute('app_book_index');
        }

        return $this->render('admin/book/save.html.twig', [
            'form' => $form,
        ]);
    }
}
