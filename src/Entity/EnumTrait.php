<?php
/**
 * Created by rest-bundle.
 * User: ssp
 * Date: 14.09.16
 * Time: 16:19.
 */
namespace NorseDigital\Symfony\RestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

trait EnumTrait
{
    /**
     * @var string
     *
     * @ORM\Column(type="string")
     *
     * @JMS\Expose
     * @JMS\Type("string")
     */
    private $title;

    /**
     * @var bool
     *
     * @ORM\Column(name="default_value" type="boolean")
     *
     * @JMS\Expose
     * @JMS\Type("boolean")
     */
    private $default;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return EnumInterface|self
     */
    public function setTitle(string $title): EnumInterface
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDefault(): bool
    {
        return $this->default;
    }

    /**
     * @param bool $default
     *
     * @return EnumInterface|self
     */
    public function setDefault(bool $default): EnumInterface
    {
        $this->default = $default;

        return $this;
    }
}
