<?php
/**
 * Created by PhpStorm.
 * User: stas
 * Date: 20.09.16
 * Time: 10:39
 */
namespace NorseDigital\Symfony\RestBundle\Oauth;


/**
 * Class UserOathInterface.
 *
 */
interface UserOathInterface
{
    /**
     * @return string
     */
    public function getOauthProvider() : string;

    /**
     * @param string $oauthProvider
     * @return UserOathInterface
     */
    public function setOauthProvider(string $oauthProvider) : self;

    /**
     * @return string
     */
    public function getOauthAccessToken() : string;

    /**
     * @param string $oauthAccessToken
     * @return UserOathInterface
     */
    public function setOauthAccessToken(string $oauthAccessToken) : self;

    /**
     * @return int
     */
    public function getOauthId(): int;

    /**
     * @param int $oauthId
     * @return UserOathInterface
     */
    public function setOauthId(int $oauthId): self;
}