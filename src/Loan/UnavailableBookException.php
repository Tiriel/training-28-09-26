<?php

namespace App\Loan;

use App\Entity\Book;

class UnavailableBookException extends \RuntimeException
{
    public function __construct(
        public readonly Book $book,
    ) {
        parent::__construct(sprintf("Unavailable book: %s", $this->book->getTitle()));
    }
}
