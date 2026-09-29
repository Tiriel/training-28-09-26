<?php

namespace App\Loan;

use App\Entity\User;
use App\Loan\LoanDurationPolicyInterface;

class StandardLoanDurationPolicy implements LoanDurationPolicyInterface
{

    public function getDurationDays(User $user): int
    {
        return 14;
    }
}
