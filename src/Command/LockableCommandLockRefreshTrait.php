<?php

namespace Bacart\SymfonyCommon\Command;

use Bacart\Common\Exception\UnexpectedTypeException;
use Bacart\SymfonyCommon\Traits\EventDispatcherAwareTrait;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * @mixin EventDispatcherAwareTrait
 */
trait LockableCommandLockRefreshTrait
{
    /**
     * @throws UnexpectedTypeException
     */
    public function refreshCommandLock(): void
    {
        if (null === $this->dispatcher
            || !($this->dispatcher instanceof EventDispatcherInterface)) {
            throw new UnexpectedTypeException(
                $this->dispatcher,
                EventDispatcherInterface::class
            );
        }

        $this->dispatcher->dispatch(
            LockableCommandInterface::LOCKABLE_COMMAND_REFRESH_EVENT_NAME
        );
    }
}
