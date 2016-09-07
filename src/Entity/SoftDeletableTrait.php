<?php

namespace NorseDigital\Symfony\RestBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * Class SoftDeletableTrait.
 */
trait SoftDeletableTrait
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deleted_at", type="datetime", nullable=true)
     * @JMS\Exclude()
     */
    protected $deletedAt;

    /**
     * {@inheritdoc}
     */
    public function isDeleted()
    {
        return null !== $this->deletedAt && new \DateTime() >= $this->deletedAt;
    }

    /**
     * {@inheritdoc}
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * {@inheritdoc}
     */
    public function setDeletedAt(\DateTime $deletedAt = null)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * @param Collection $collection
     *
     * @return ArrayCollection
     */
    private function filterDeleted(Collection $collection) : ArrayCollection
    {
        // getValues => reset keys
        return new ArrayCollection(
            $collection->filter(
                function ($entity) {
                    return !$entity instanceof SoftDeletableInterface || $entity->isDeleted() === false;
                }
            )->getValues()
        );
    }

    /**
     * @JMS\PreSerialize
     */
    public function filterCollectionWithoutDeleted()
    {
        $this->iteratePropertiesToFoundCollections(function (\ReflectionProperty $reflectionProperty, Collection $value, string $propertyBak) {
            $reflectionProperty->setValue($this, $this->filterDeleted($value));
            $this->$propertyBak = $value;
        });
    }

    /**
     * @JMS\PostSerialize
     */
    public function restoreDeletedToCollection()
    {
        $this->iteratePropertiesToFoundCollections(function (\ReflectionProperty $reflectionProperty, Collection $value, string $propertyBak) {
            $reflectionProperty->setValue($this, $this->$propertyBak);
        });
    }

    /**
     * @param \Closure $p
     */
    private function iteratePropertiesToFoundCollections(\Closure $p)
    {
        $reflectionClass = new \ReflectionClass(get_class($this));
        $properties = $reflectionClass->getProperties();

        foreach ($properties as $property) {
            $property->setAccessible(true);

            $value = $property->getValue($this);
            if ($value instanceof Collection) {
                $propertyBak = '__'.$property->getName().'__bak';
                $p($property, $value, $propertyBak);
            }

            $property->setAccessible(false);
        }
    }
}
