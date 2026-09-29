<?php

namespace App\Controller;

use App\Entity\Book;
use App\Form\BookSearchType;
use App\Repository\BookRepository;
use App\Repository\GenreRepository;
use App\Search\BookSearchCriteria;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Requirement\Requirement;

class BookController extends AbstractController
{
    private const PER_PAGE = 10;

    #[Route('/books', name: 'app_book_index')]
    public function index(
        Request $request,
        BookRepository $books,
        GenreRepository $genres,
        #[MapQueryString] BookSearchCriteria $criteria = new BookSearchCriteria(),
    ): Response {
        $page = max(1, $request->query->getInt('page', 1));
        $paginator = $books->search($criteria, $page, self::PER_PAGE);

        return $this->render('book/index.html.twig', [
            'books' => $paginator,
            'criteria' => $criteria,
            'genres' => $genres->findAll(),
            'page' => $page,
            'lastPage' => max(1, (int) ceil($paginator->count() / self::PER_PAGE)),
        ]);
    }

    #[Route('/book/{slug:book}', name: 'app_book_show', methods: ['GET'])]
    public function show(Book $book): Response
    {
        return $this->render('book/show.html.twig', ['book' => $book]);
    }
}
