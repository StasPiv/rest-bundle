<?php
/**
 * Created by rest-bundle.
 * User: ssp
 * Date: 14.09.16
 * Time: 16:36.
 */
namespace NorseDigital\Symfony\RestBundle\Service;

use NorseDigital\Symfony\RestBundle\Entity\EnumInterface;
use NorseDigital\Symfony\RestBundle\Repository\EntityRepository;

trait EnumServiceTrait
{
    /**
     * @var EntityRepository
     */
    protected $repository;

    /**
     * @return EnumInterface
     */
    public function getDefault(): EnumInterface
    {
        /** @var EnumInterface $enum */
        $enum = $this->repository->findOneBy(['default' => true]);

        return $enum;
    }
}
