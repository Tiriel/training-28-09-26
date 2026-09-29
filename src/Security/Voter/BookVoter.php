<?php

namespace App\Security\Voter;

use App\Entity\Book;
use App\Entity\User;
use App\Security\Permission\BookPermission;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Vote;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

final class BookVoter extends Voter
{
    public function __construct(private AuthorizationCheckerInterface $checker) {}

    protected function supports(string $attribute, mixed $subject): bool
    {
        return in_array($attribute, [BookPermission::EDIT_DETAILS, BookPermission::CHANGE_AVAILABILITY], true)
            && $subject instanceof Book;
    }

    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token, ?Vote $vote = null): bool
    {
        $user = $token->getUser();
        if (!$user instanceof User) {
            return false;
        }

        return match ($attribute) {
            BookPermission::EDIT_DETAILS =>
                $this->checker->isGranted('ROLE_LIBRARIAN') || $subject->getAddedBy() === $user,
            BookPermission::CHANGE_AVAILABILITY =>
                $this->checker->isGranted('ROLE_LIBRARIAN'),
            default => false,
        };
    }
}
