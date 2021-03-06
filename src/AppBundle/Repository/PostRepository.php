<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * PostRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PostRepository extends EntityRepository
{
    public function findLatest($num)
    {
        $qb = $this->getBuilder()
            ->orderBy('p.publishedAt', 'desc')->setMaxResults($num);

        return $qb->getQuery()->getResult();

    }

    private function getBuilder()
    {
        $em = $this->getEntityManager();

        $builder = $em->getRepository('AppBundle:Post')
            ->createQueryBuilder('p');

        return $builder;
    }
}
