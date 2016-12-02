<?php
/**
 * Created by cvident-backend-api.
 * User: ssp
 * Date: 02.12.16
 * Time: 15:57.
 */
namespace NorseDigital\Symfony\RestBundle\Exception;

interface ParametrizedExceptionInterface
{
    /**
     * @return array
     */
    public function getParameters() : array;
}
