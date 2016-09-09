<?php
/**
 * Created by rest-bundle.
 * User: ssp
 * Date: 09.09.16
 * Time: 12:06.
 */
namespace NorseDigital\Symfony\RestBundle\Exception\Fixture;

use Exception;

class FixtureGeneratorException extends \Exception
{
    public function __construct($message = 'Can not generate fixture', $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
