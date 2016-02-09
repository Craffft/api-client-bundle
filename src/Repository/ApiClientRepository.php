<?php

/*
 * This file is part of the API Client Bundle.
 *
 * (c) Daniel Kiesel <https://github.com/iCodr8>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Craffft\ApiClientBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ApiClientRepository extends EntityRepository
{
    public function findOneByApiKey($strToken)
    {
        return $this->createQueryBuilder('ac')
            ->where('ac.currentAccessToken = :token')
            ->andWhere('ac.accessTokenExpireDate > :tstamp')
            ->andWhere('ac.disable = 0')
            ->andWhere("ac.start <= :tstamp OR ac.start = ''")
            ->andWhere("ac.stop >= :tstamp OR ac.stop = ''")
            ->setParameter('token', $strToken)
            ->setParameter('tstamp', time())
            ->getQuery()
            ->getOneOrNullResult();
    }
}
