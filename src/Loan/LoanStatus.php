<?php

namespace App\Loan;

enum LoanStatus: string
{
    case Pending = 'pending';
    case Active = 'active';
    case Cancelled = 'cancelled';
    case Overdue = 'overdue';
    case Returned = 'returned';
}
