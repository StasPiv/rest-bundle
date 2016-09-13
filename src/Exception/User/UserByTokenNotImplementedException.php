<?php
/**
 * Created by rest-bundle.
 * User: ssp
 * Date: 13.09.16
 * Time: 12:12.
 */
namespace NorseDigital\Symfony\RestBundle\Exception\User;

use Exception;

class UserByTokenNotImplementedException extends \Exception
{
    public function __construct($message = 'You should implement getUserByToken method in your class', $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
