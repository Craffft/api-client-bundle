<?php

/*
 * This file is part of the API Client Bundle.
 *
 * (c) Daniel Kiesel <https://github.com/iCodr8>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Craffft\ApiClientBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * ApiClient
 *
 * @ORM\Table(name="api_client",uniqueConstraints={
 *     @ORM\UniqueConstraint(name="clientId", columns={"clientId"}),
 *     @ORM\UniqueConstraint(name="clientSecret", columns={"clientSecret"}),
 *     @ORM\UniqueConstraint(name="currentAccessToken", columns={"currentAccessToken"})
 * })
 * @ORM\Entity(repositoryClass="Craffft\ApiClientBundle\Repository\ApiClientRepository")
 */
class ApiClient implements UserInterface, \Serializable
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", options={"unsigned" = true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="tstamp", type="integer", length=10, options={"default" = 0, "unsigned" = true})
     */
    private $tstamp;

    /**
     * @var int
     *
     * @ORM\Column(name="dateAdded", type="integer", length=10, options={"default" = 0, "unsigned" = true})
     */
    private $dateAdded;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, options={"default" = ""})
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="clientId", type="string", length=64, options={"default" = ""})
     */
    private $clientId;

    /**
     * @var string
     *
     * @ORM\Column(name="clientSecret", type="string", length=128, options={"default" = ""})
     */
    private $clientSecret;

    /**
     * @var string
     *
     * @ORM\Column(name="currentAccessToken", type="string", length=128, options={"default" = ""})
     */
    private $currentAccessToken;

    /**
     * @var string
     *
     * @ORM\Column(name="accessTokenExpireDate", type="string", length=10, options={"default" = ""})
     */
    private $accessTokenExpireDate;

    /**
     * @var bool
     *
     * @ORM\Column(name="disable", type="boolean")
     */
    private $disable;

    /**
     * @var string
     *
     * @ORM\Column(name="start", type="string", length=10, options={"default" = ""})
     */
    private $start;

    /**
     * @var string
     *
     * @ORM\Column(name="stop", type="string", length=10, options={"default" = ""})
     */
    private $stop;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set tstamp
     *
     * @param integer $tstamp
     *
     * @return ApiClient
     */
    public function setTstamp($tstamp)
    {
        $this->tstamp = $tstamp;

        return $this;
    }

    /**
     * Get tstamp
     *
     * @return int
     */
    public function getTstamp()
    {
        return $this->tstamp;
    }

    /**
     * Set dateAdded
     *
     * @param integer $dateAdded
     *
     * @return ApiClient
     */
    public function setDateAdded($dateAdded)
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }

    /**
     * Get dateAdded
     *
     * @return int
     */
    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return ApiClient
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set clientId
     *
     * @param string $clientId
     *
     * @return ApiClient
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * Get clientId
     *
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Set clientSecret
     *
     * @param string $clientSecret
     *
     * @return ApiClient
     */
    public function setClientSecret($clientSecret)
    {
        $this->clientSecret = $clientSecret;

        return $this;
    }

    /**
     * Get clientSecret
     *
     * @return string
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    /**
     * Set currentAccessToken
     *
     * @param string $currentAccessToken
     *
     * @return ApiClient
     */
    public function setCurrentAccessToken($currentAccessToken)
    {
        $this->currentAccessToken = $currentAccessToken;

        return $this;
    }

    /**
     * Get currentAccessToken
     *
     * @return string
     */
    public function getCurrentAccessToken()
    {
        return $this->currentAccessToken;
    }

    /**
     * Set accessTokenExpireDate
     *
     * @param string $accessTokenExpireDate
     *
     * @return ApiClient
     */
    public function setAccessTokenExpireDate($accessTokenExpireDate)
    {
        $this->accessTokenExpireDate = $accessTokenExpireDate;

        return $this;
    }

    /**
     * Get accessTokenExpireDate
     *
     * @return string
     */
    public function getAccessTokenExpireDate()
    {
        return $this->accessTokenExpireDate;
    }

    /**
     * Set disable
     *
     * @param boolean $disable
     *
     * @return ApiClient
     */
    public function setDisable($disable)
    {
        $this->disable = $disable;

        return $this;
    }

    /**
     * Get disable
     *
     * @return bool
     */
    public function getDisable()
    {
        return $this->disable;
    }

    /**
     * Set start
     *
     * @param string $start
     *
     * @return ApiClient
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return string
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set stop
     *
     * @param string $stop
     *
     * @return ApiClient
     */
    public function setStop($stop)
    {
        $this->stop = $stop;

        return $this;
    }

    /**
     * Get stop
     *
     * @return string
     */
    public function getStop()
    {
        return $this->stop;
    }


    /**
     * @return array
     */
    public function getRoles()
    {
        return array('ROLE_USER');
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->getClientSecret();
    }

    /**
     * @return null
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->getClientId();
    }

    /**
     * @return void
     */
    public function eraseCredentials()
    {

    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->clientId,
            $this->clientSecret
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->clientId,
            $this->clientSecret
            ) = unserialize($serialized);
    }
}

