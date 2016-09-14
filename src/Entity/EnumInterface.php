<?php
/**
 * Created by rest-bundle.
 * User: ssp
 * Date: 14.09.16
 * Time: 16:17.
 */
namespace NorseDigital\Symfony\RestBundle\Entity;

interface EnumInterface
{
    /**
     * @return string
     */
    public function getTitle(): string;

    /**
     * @param string $title
     *
     * @return EnumInterface
     */
    public function setTitle(string $title): self;

    /**
     * @return bool
     */
    public function isDefault(): bool;

    /**
     * @param bool $default
     *
     * @return EnumInterface
     */
    public function setDefault(bool $default): self;
}
