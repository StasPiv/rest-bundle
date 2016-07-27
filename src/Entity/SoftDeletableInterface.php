<?php

namespace StasPiv\RestBundle\Entity;

/**
 * Interface SoftDeletableInterface.
 */
interface SoftDeletableInterface
{
    /**
     * Is item deleted?
     *
     * @return bool
     */
    public function isDeleted();

    /**
     * Get the time of deletion.
     *
     * @return \DateTime
     */
    public function getDeletedAt();

    /**
     * Set deletion time.
     *
     * @param \DateTime $deletedAt
     */
    public function setDeletedAt(\DateTime $deletedAt = null);
}
