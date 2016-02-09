<?php

/*
 * This file is part of the API Client Bundle.
 *
 * (c) Daniel Kiesel <https://github.com/iCodr8>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Craffft\ApiClientBundle\Security;

use Craffft\ApiClientBundle\Entity\ApiClient;
use Craffft\ApiClientBundle\Repository\ApiClientRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

class ApiKeyUserProvider implements UserProviderInterface
{
    private $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function getUsernameForApiKey($apiKey)
    {
        $username = '';

        /** @var ApiClientRepository $apiClientRepository */
        $apiClientRepository = $this->em->getRepository('CraffftApiClientBundle:ApiClient');

        /** @var ApiClient $apiClient */
        $apiClient = $apiClientRepository->findOneByApiKey($apiKey);

        if ($apiClient) {
            $username = $apiClient->getClientId();
        }

        return $username;
    }

    public function loadUserByUsername($username)
    {
        return new User(
            $username,
            null,
            // the roles for the user - you may choose to determine
            // these dynamically somehow based on the user
            array('ROLE_USER')
        );
    }

    public function refreshUser(UserInterface $user)
    {
        // this is used for storing authentication in the session
        // but in this example, the token is sent in each request,
        // so authentication can be stateless. Throwing this exception
        // is proper to make things stateless
        throw new UnsupportedUserException();
    }

    public function supportsClass($class)
    {
        return 'Symfony\Component\Security\Core\User\User' === $class;
    }
}
