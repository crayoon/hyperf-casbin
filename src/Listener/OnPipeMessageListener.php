<?php

namespace Donjan\Casbin\Listener;

use Psr\Container\ContainerInterface;
use Hyperf\Event\Contract\ListenerInterface;
use Hyperf\Framework\Event\OnPipeMessage;
use Hyperf\Process\Event\PipeMessage as UserProcessPipeMessage;
use Donjan\Casbin\Event\PipeMessage;
use Casbin\Enforcer;

class OnPipeMessageListener implements ListenerInterface
{

    /**
     * @var ContainerInterface
     */
    private ContainerInterface $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @return string[] returns the events that you want to listen
     */
    public function listen(): array
    {
        return [
            OnPipeMessage::class,
            UserProcessPipeMessage::class,
        ];
    }


    public function process(object $event): void {
        if (($event instanceof OnPipeMessage || $event instanceof UserProcessPipeMessage) && $event->data instanceof PipeMessage) {
            $message = $event->data;
            if ($message->action == PipeMessage::LOAD_POLICY) {
                $this->container->get(Enforcer::class)->loadPolicy();
            }
        }
    }
}
