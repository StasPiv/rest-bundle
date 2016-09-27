<?php
/**
 * Created by PhpStorm.
 * User: stas
 * Date: 20.09.16
 * Time: 10:57.
 */
namespace CoreBundle\Tests\Service\OauthProvider;

use NorseDigital\Symfony\RestBundle\Service\OauthProvider\FacebookProvider;
use PHPUnit\Framework\TestCase;

class FacebookProviderTest extends TestCase
{
    /**
     * @var FacebookProvider
     */
    private $provider;

    protected function setUp()
    {
        parent::setUp();
        $this->provider = new FacebookProvider();
    }

    public function testAuthenticate()
    {
        $result = $this->provider->authenticate(
            'EAACEdEose0cBANuhE7ZBEcksVJmFKt26sONsTV5i8GJYAYBAzxZCEGteDcSvGS1LqntaFj2CnU8wledyMNbAZCPRraXgTPc3ugwTSkBNQsW3b0AjfcasnMhQwnfXN4ZCYIZBhBQQ23lF7CjG6yyY6ziLaBwxxlNZBsyBM2qVIMxQZDZD',
   $errorMessage);
    }
}
