<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use App\Entity\Job;

class JobRepository extends EntityRepository
{
	/**
     * @param int $id
     *
     * @return Job|null
     */
    public function findActiveJobs(int $id)
    {
        /*
        $qb = $this->createQueryBuilder('j')
            ->where('j.expiresAt > :date')
            ->setParameter('date', new \DateTime())
            ->orderBy('j.expiresAt', 'DESC');

        if ($categoryId) {
            $qb->andWhere('j.category = :categoryId')
                ->setParameter('categoryId', $categoryId);
        }

        return $qb->getQuery()->getResult();
        */

        return $this->createQueryBuilder('j')
        ->where('j.id = :id')
        ->andWhere('j.expiresAt > :date')
        ->setParameter('id', $id)
        ->setParameter('date', new \DateTime())
        ->getQuery()
        ->getOneOrNullResult();
    }
}