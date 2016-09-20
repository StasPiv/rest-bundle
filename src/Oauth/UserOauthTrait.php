<?php
/**
 * Created by PhpStorm.
 * User: stas
 * Date: 20.09.16
 * Time: 10:41.
 */
namespace NorseDigital\Symfony\RestBundle\Oauth;

trait UserOauthTrait
{
    /**
     * @var string
     */
    protected $oauthAccessToken;

    /**
     * @var string
     */
    protected $oauthProvider;

    /**
     * @var string
     */
    protected $oauthId;

    /**
     * @return string
     */
    public function getOauthProvider(): string
    {
        return $this->oauthProvider;
    }

    /**
     * @param string $oauthProvider
     *
     * @return UserOathInterface|self
     */
    public function setOauthProvider(string $oauthProvider): UserOathInterface
    {
        $this->oauthProvider = $oauthProvider;

        return $this;
    }

    /**
     * @return string
     */
    public function getOauthAccessToken(): string
    {
        return $this->oauthAccessToken;
    }

    /**
     * @param string $oauthAccessToken
     *
     * @return UserOathInterface|self
     */
    public function setOauthAccessToken(string $oauthAccessToken): UserOathInterface
    {
        $this->oauthAccessToken = $oauthAccessToken;

        return $this;
    }

    /**
     * @return string
     */
    public function getOauthId(): string
    {
        return $this->oauthId;
    }

    /**
     * @param string $oauthId
     *
     * @return UserOathInterface|self
     */
    public function setOauthId(string $oauthId): UserOathInterface
    {
        $this->oauthId = $oauthId;

        return $this;
    }
}
