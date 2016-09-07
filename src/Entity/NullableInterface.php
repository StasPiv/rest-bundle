<?php

namespace NorseDigital\Symfony\RestBundle\Entity;

/**
 * Interface NullableInterface.
 */
interface NullableInterface
{
    /**
     * @return bool
     */
    public function isNull(): bool;
}
