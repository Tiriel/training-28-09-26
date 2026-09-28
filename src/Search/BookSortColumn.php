<?php

namespace App\Search;

enum BookSortColumn: string
{
    case Title = 'title';
    case Author = 'author';
    case PublicationDate = 'publicationDate';

    public function column(): string
    {
        return match($this) {
            self::Title => 'title',
            self::Author => 'author',
            self::PublicationDate => 'publicationDate',
        };
    }
}
