<?php

namespace NorseDigital\Symfony\RestBundle\Request;

/**
 * Interface ListRequestInterface.
 */
interface ListRequestInterface
{
    /**
     * @return int
     */
    public function getLimit() : int;

    /**
     * @return string
     */
    public function getSort() : string;

    /**
     * @return string
     */
    public function getOrder() : string;

    /**
     * @return int
     */
    public function getPage() : int;

    /**
     * @return mixed
     */
    public function getIncludeDeleted();

    /**
     * @param mixed $includeDeleted
     */
    public function setIncludeDeleted($includeDeleted);
}
