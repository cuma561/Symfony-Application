<?php

namespace App\EventSubscriber;

use App\Twig\SourceCodeExtension;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class ControllerSubscriber implements EventSubscriberInterface
{
    private $twigExtension;

    public function __construct(SourceCodeExtension $twigExtension)
    {
        $this->twigExtension = $twigExtension;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::CONTROLLER => 'registerCurrentController',
        ];
    }

    public function registerCurrentController(ControllerEvent $event): void
    {
        if ($event->isMasterRequest()) {
            $this->twigExtension->setController($event->getController());
        }
    }
}
