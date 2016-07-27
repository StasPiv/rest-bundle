<?php

namespace StasPiv\RestBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ProcessorEvent.
 */
class ProcessorEvent extends Event
{
    /**
     * @var Request
     */
    private $request;

    /**
     * ProcessorEvent constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}
