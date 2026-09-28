<?php

namespace App\Search;

final class BookSearchCriteria
{
    public function __construct(
        public ?string $q = null,
        public ?string $author = null,
        public ?int $genre = null,
        public bool $available = false,
        public BookSortColumn $sort = BookSortColumn::Title,
        public string $direction = 'asc',
    ) {}
}
