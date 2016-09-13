<?php
/**
 * Created by cvident-backend-api.
 * User: ssp
 * Date: 13.09.16
 * Time: 11:31.
 */
namespace NorseDigital\Symfony\RestBundle\Exception\User;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class UnauthorizedException extends \RuntimeException
{
    /**
     * {@inheritdoc}
     */
    public function __construct($message = 'You are unauthorized', $code = Response::HTTP_UNAUTHORIZED, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
