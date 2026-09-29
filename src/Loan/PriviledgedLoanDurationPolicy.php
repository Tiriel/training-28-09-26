<?php

namespace App\Loan;

use App\Entity\User;
use App\Loan\LoanDurationPolicyInterface;
use Symfony\Component\DependencyInjection\Attribute\AsAlias;
use Symfony\Component\Security\Core\Role\RoleHierarchyInterface;

#[AsAlias]
class PriviledgedLoanDurationPolicy implements LoanDurationPolicyInterface
{
    public function __construct(
        private readonly RoleHierarchyInterface $roleHierarchy,
    ) {}

    public function getDurationDays(User $user): int
    {
        return \in_array('ROLE_ADMIN', $this->roleHierarchy->getReachableRoleNames($user->getRoles()), true);
    }
}
