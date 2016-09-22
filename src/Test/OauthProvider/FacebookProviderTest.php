<?php
/**
 * Created by PhpStorm.
 * User: stas
 * Date: 20.09.16
 * Time: 10:57
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
            'EAACEdEose0cBACY1jBUT2VXijB6u03w7vy0HvJvAAGq6aao5lSo1kdoU8NaTXOU52oHVOjPSAdSqMUaucXD7IvQbM0PaHQQkHTZBvkwHEy3ouPBtprDJlZCbLtAbF2kuQIKTVkSUYWV0y3djPy6j1zHjZCbHszGPg6i1BKaHwZDZD',
   $errorMessage);
    }
}