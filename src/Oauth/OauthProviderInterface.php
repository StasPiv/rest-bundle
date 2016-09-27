<?php
/**
 * Created by PhpStorm.
 * User: stas
 * Date: 20.09.16
 * Time: 10:38.
 */
namespace NorseDigital\Symfony\RestBundle\Oauth;

interface OauthProviderInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $accessToken
     * @param mixed  $errorMessage
     *
     * @return mixed oauth identifier if exists or false otherwise
     */
    public function authenticate(string $accessToken, &$errorMessage): OauthUser;
}
