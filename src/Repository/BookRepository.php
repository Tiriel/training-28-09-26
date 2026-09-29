<?php

namespace App\Repository;

use App\Entity\Book;
use App\Search\BookSearchCriteria;
use App\Search\BookSortColumn;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Book>
 */
class BookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Book::class);
    }

    public function findBySlugAndPublicationDate(): ?Book
    {

    }

    public function search(
        BookSearchCriteria $criteria,
        int $page = 1,
        int $perPage = 10,
    ): Paginator {
        $qb = $this->createQueryBuilder('b');

        // Author join — needed for the author filter OR for sorting by author
        if ($criteria->author || $criteria->sort === BookSortColumn::Author) {
            $qb->innerJoin('b.authors', 'a');
        }

        if ($criteria->q) {
            $qb->andWhere('b.title LIKE :q')->setParameter('q', "%".$criteria->q."%");
        }
        if ($criteria->author) {
            $qb->andWhere('a.name LIKE :author')->setParameter('author', "%".$criteria->author."%");
        }
        if ($criteria->genre) {
            $qb->innerJoin('b.genres', 'g')
               ->andWhere('g.id = :gid')->setParameter('gid', $criteria->genre);
        }
        if ($criteria->available) {
            $qb->andWhere('b.available = true');
        }

        $sortField = $criteria->sort === BookSortColumn::Author
            ? 'a.name'
            : "b.".$criteria->sort->column();

        $direction = strtolower($criteria->direction) === 'desc' ? 'DESC' : 'ASC';

        $qb
            ->orderBy($sortField, $direction)
            ->setFirstResult(($page - 1) * $perPage)
            ->setMaxResults($perPage);

        return new Paginator($qb);
    }

//    /**
//     * @return Book[] Returns an array of Book objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Book
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
