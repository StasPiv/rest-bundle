<?php
/**
 * Created by rest-bundle.
 * User: ssp
 * Date: 14.09.16
 * Time: 16:35.
 */
namespace NorseDigital\Symfony\RestBundle\Service;

use NorseDigital\Symfony\RestBundle\Entity\EnumInterface;

interface EnumServiceInterface
{
    /**
     * @return EnumInterface
     */
    public function getDefault(): EnumInterface;
}
