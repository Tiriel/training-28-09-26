<?php

namespace App\Loan;

use App\Entity\User;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

#[AutoconfigureTag('loan.duration_policy')]
interface LoanDurationPolicyInterface
{
    public function getDurationDays(User $user): int;
}
