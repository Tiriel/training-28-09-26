<?php

namespace App\EventListener;

use App\Entity\Book;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Events;
use Symfony\Component\String\Slugger\SluggerInterface;

#[AsEntityListener(event: Events::prePersist, method: 'slugify', entity: Book::class)]
#[AsEntityListener(event: Events::preUpdate, method: 'slugify', entity: Book::class)]
class BookSlugListener
{
    public function __construct(
        private readonly SluggerInterface $slugger
    ) {}

    public function slugify(Book $book): void
    {
        $book->setSlug($this->slugger->slug($book->getTitle())->lower()->toString());
    }
}
