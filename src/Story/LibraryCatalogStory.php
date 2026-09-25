<?php

namespace App\Story;

use App\Factory\AuthorFactory;
use App\Factory\BookFactory;
use App\Factory\GenreFactory;
use Zenstruck\Foundry\Attribute\AsFixture;
use Zenstruck\Foundry\Story;

#[AsFixture('catalog')]
final class LibraryCatalogStory extends Story
{
    public function build(): void
    {
        $books = require dirname(__DIR__, 2) . '/fixtures/book_fixtures.php';

        BookFactory::createMany(\count($books), static function (int $i) use ($books): array {
            $book = $books[$i - 1];

            return [
                'title'           => $book['title'],
                'isbn'            => $book['isbn'],
                'publicationDate' => $book['publicationDate'],
                'authors'          => [AuthorFactory::findOrCreate(['name' => $book['author']])],
                'genres'          => array_map(
                    static fn (string $name) => GenreFactory::findOrCreate(['name' => $name]),
                    $book['genres'],
                )
            ];
        });
    }
}
