<?php

namespace App\Story;

use App\Factory\AuthorFactory;
use App\Factory\BookFactory;
use App\Factory\GenreFactory;
use App\Factory\LoanFactory;
use App\Factory\UserFactory;
use App\Loan\LoanStatus;
use Zenstruck\Foundry\Attribute\AsFixture;
use Zenstruck\Foundry\Story;
use function Symfony\Component\Clock\now;

#[AsFixture('catalog')]
final class LibraryCatalogStory extends Story
{
    public function build(): void
    {
        UserFactory::createOne([
            'email' => 'admin@library.local',
            'password' => 'admin',
            'roles' => ['ROLE_ADMIN', 'ROLE_ALLOWED_TO_SWITCH'],
        ]);
        UserFactory::createOne([
            'email' => 'manager@library.local',
            'roles' => ['ROLE_MANAGER'],
        ]);
        UserFactory::createOne([
            'email' => 'webmaster@library.local',
            'roles' => ['ROLE_WEBMASTER'],
        ]);
        $librarian = UserFactory::createOne([
            'email' => 'librarian@library.local',
            'roles' => ['ROLE_LIBRARIAN'],
        ]);
        $reader = UserFactory::createOne([
            'email' => 'reader@test.local',
        ]);

        $books = require dirname(__DIR__, 2) . '/fixtures/book_fixtures.php';

        BookFactory::createMany(\count($books), static function (int $i) use ($books, $reader, $librarian): array {
            $book = $books[$i - 1];

            return [
                'title'           => $book['title'],
                'isbn'            => $book['isbn'],
                'summary'         => $book['summary'],
                'publicationDate' => $book['publicationDate'],
                'authors'          => [AuthorFactory::findOrCreate(['name' => $book['author']])],
                'genres'          => array_map(
                    static fn (string $name) => GenreFactory::findOrCreate(['name' => $name]),
                    $book['genres'],
                ),
                'addedBy' => $i % 3 === 0 ? $reader : $librarian,
            ];
        });
        $activeBook  = BookFactory::random(['available' => false]);
        $overdueBook = BookFactory::random(['available' => false]);

        LoanFactory::createOne([
            'user' => $librarian,
            'book' => $activeBook,
            'loanDate' => now('-3 days'),
            'dueDate'  => now('+11 days'),
            'status'   => LoanStatus::Active,
        ]);

        LoanFactory::createOne([
            'user' => $reader,
            'book' => $overdueBook,
            'loanDate' => now('-30 days'),
            'dueDate'  => now('-16 days'),
            'status'   => LoanStatus::Overdue,
        ]);
    }
}
