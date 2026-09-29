<?php

namespace App\Event;

use App\Entity\Loan;
use Symfony\Contracts\EventDispatcher\Event;

class LoanCreatedEvent extends Event
{
    public function __construct(
        public readonly Loan $loan,
    ) {}
}
