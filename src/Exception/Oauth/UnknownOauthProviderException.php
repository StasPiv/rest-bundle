<?php
/**
 * Created by PhpStorm.
 * User: stas
 * Date: 20.09.16
 * Time: 12:14.
 */
namespace NorseDigital\Symfony\RestBundle\Exception\Oauth;

use Exception;

class UnknownOauthProviderException extends \Exception
{
    public function __construct($message = 'Unknown oauth provider', $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
