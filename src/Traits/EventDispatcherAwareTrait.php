<?php

namespace Bacart\SymfonyCommon\Traits;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;

trait EventDispatcherAwareTrait
{
    /** @var EventDispatcherInterface */
    protected $dispatcher;

    /**
     * @required
     *
     * @param EventDispatcherInterface $dispatcher
     */
    public function setEventDispatcher(EventDispatcherInterface $dispatcher): void
    {
        $this->dispatcher = $dispatcher;
    }
}
