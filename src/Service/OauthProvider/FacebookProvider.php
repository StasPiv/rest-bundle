<?php
/**
 * Created by PhpStorm.
 * User: stas
 * Date: 20.09.16
 * Time: 10:48.
 */
namespace NorseDigital\Symfony\RestBundle\Service\OauthProvider;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use NorseDigital\Symfony\RestBundle\Oauth\OauthProviderInterface;
use NorseDigital\Symfony\RestBundle\Oauth\OauthUser;

class FacebookProvider implements OauthProviderInterface
{
    private $oauthUrl = 'https://graph.facebook.com/v2.5/me';

    /**
     * @var Client
     */
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getName(): string
    {
        return 'facebook';
    }

    /**
     * @param string $accessToken
     * @param mixed  $errorMessage
     *
     * @return mixed oauth identifier if exists or false otherwise
     */
    public function authenticate(string $accessToken, &$errorMessage): OauthUser
    {
        $url = $this->oauthUrl.'?'.http_build_query(
            [
                'access_token' => $accessToken,
            ]
        );

        try {
            $response = json_decode($this->client->get($url)->getBody(), true);
        } catch (ClientException $e) {
            $errorResponse = json_decode($e->getResponse()->getBody(), true);

            if (isset($errorResponse['error']['message'])) {
                $errorMessage = $errorResponse['error']['message'];
            }

            return false;
        }

        if (isset($response['id'])) {
            return (new OauthUser())->setName($response['name'])->setId($response['id'])
                                    ->setPictureUrl($this->getPictureUrl($accessToken));
        } else {
            return false;
        }
    }

    /**
     * @param string $accessToken
     * @param int $height
     * @return string
     */
    private function getPictureUrl(string $accessToken, int $height = 200): string
    {
        return $this->oauthUrl.'/picture?'.http_build_query(
                [
                    'access_token' => $accessToken,
                    'height' => $height
                ]
            );
    }
}
