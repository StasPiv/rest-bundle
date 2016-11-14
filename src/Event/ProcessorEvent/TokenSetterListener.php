<?php
/**
 * Created by cvident-backend-api.
 * User: ssp
 * Date: 13.09.16
 * Time: 10:58.
 */
namespace NorseDigital\Symfony\RestBundle\Event\ProcessorEvent;

use NorseDigital\Symfony\RestBundle\Event\ProcessorEvent;
use NorseDigital\Symfony\RestBundle\Event\ProcessorEvents;
use NorseDigital\Symfony\RestBundle\User\CurrentUserContainerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class TokenSetterListener implements EventSubscriberInterface
{
    /**
     * @var array here are anonymous routers that will be ignored for token process
     */
    private $anonymousRouters = [];

    /**
     * @var CurrentUserContainerInterface
     */
    private $currentUserContainer;

    /**
     * @var string
     */
    private $httpHeaderForToken;

    /**
     * TokenSetterListener constructor.
     *
     * @param array                         $anonymousRouters
     * @param CurrentUserContainerInterface $currentUserContainer
     * @param string                        $httpHeaderForToken
     */
    public function __construct(array $anonymousRouters, CurrentUserContainerInterface $currentUserContainer, string $httpHeaderForToken)
    {
        $this->anonymousRouters = $anonymousRouters;
        $this->currentUserContainer = $currentUserContainer;
        $this->httpHeaderForToken = $httpHeaderForToken;
    }

    public static function getSubscribedEvents()
    {
        return [
            ProcessorEvents::PRE_LOAD => ['onProcessorPreLoad', 20],
        ];
    }

    /**
     * @param ProcessorEvent $event
     */
    public function onProcessorPreLoad(ProcessorEvent $event)
    {
        $request = $event->getRequest();

        if (in_array($request->attributes->get('_route'), $this->anonymousRouters)) {
            return;
        }

        $token = (string) $request->headers->get($this->httpHeaderForToken);

        $this->currentUserContainer->initCurrentUserByToken($token);
    }
}
