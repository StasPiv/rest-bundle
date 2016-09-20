<?php
/**
 * Created by PhpStorm.
 * User: stas
 * Date: 20.09.16
 * Time: 12:13.
 */
namespace NorseDigital\Symfony\RestBundle\Oauth;

use NorseDigital\Symfony\RestBundle\Exception\Oauth\UnknownOauthProviderException;
use NorseDigital\Symfony\RestBundle\Service\OauthProvider\FacebookProvider;

class OauthProviderFactory
{
    /**
     * @param string $provider
     *
     * @return OauthProviderInterface
     *
     * @throws UnknownOauthProviderException
     */
    public static function create(string $provider): OauthProviderInterface
    {
        switch ($provider) {
            case 'facebook':
                return new FacebookProvider();
            default:
                throw new UnknownOauthProviderException();
        }
    }
}
