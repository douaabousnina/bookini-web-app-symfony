<?php

// src/Repository/BookRepository.php

namespace App\Repository;

use App\Entity\Book;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class BookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Book::class);
    }

    /**
     * Fetch all books from the database.
     *
     * @return Book[] Array of Book objects
     */
    public function findAll(): array
    {
        return $this->createQueryBuilder('b')
            ->getQuery()
            ->getResult();
    }
}
?>
