<?php

namespace Bacart\SymfonyCommon\Command;

use Bacart\SymfonyCommon\Interfaces\EventDispatcherAwareInterface;
use Bacart\SymfonyCommon\Interfaces\LockFactoryAwareInterface;
use Bacart\SymfonyCommon\Interfaces\LoggerAwareInterface;
use Bacart\SymfonyCommon\Traits\EventDispatcherAwareTrait;
use Bacart\SymfonyCommon\Traits\LockFactoryAwareTrait;
use Bacart\SymfonyCommon\Traits\LoggerAwareTrait;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Lock\Exception\LockAcquiringException;
use Symfony\Component\Lock\Exception\LockConflictedException;
use Symfony\Component\Lock\Exception\LockExpiredException;
use Symfony\Component\Lock\LockInterface;

abstract class AbstractLockableCommand extends Command implements LockableCommandInterface, EventDispatcherAwareInterface, LockFactoryAwareInterface, LoggerAwareInterface
{
    use EventDispatcherAwareTrait;
    use LockFactoryAwareTrait;
    use LoggerAwareTrait;

    /** @var LockInterface */
    protected $lock;

    /**
     * {@inheritdoc}
     */
    public function getLockTtl(): int
    {
        return LockableCommandInterface::DEFAULT_TTL;
    }

    /**
     * {@inheritdoc}
     */
    public function run(InputInterface $input, OutputInterface $output): int
    {
        $name = $this->getName();

        $this->lock = $this->lockFactory->createLock(
            sprintf('command_lock|%s', $name),
            $this->getLockTtl()
        );

        try {
            if (!$this->lock->acquire()) {
                $this->warning(sprintf(
                    'The command "%s" is already running',
                    $name
                ));

                return LockableCommandInterface::COMMAND_IS_LOCKED_ERROR_CODE;
            }
        } catch (LockExpiredException | LockConflictedException | LockAcquiringException $e) {
            $this->error($e, get_defined_vars());

            return LockableCommandInterface::COMMAND_IS_LOCKED_ERROR_CODE;
        }

        try {
            return parent::run($input, $output);
        } finally {
            $this->lock->release();
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function initialize(InputInterface $input, OutputInterface $output): void
    {
        parent::initialize($input, $output);

        $this->dispatcher->addListener(
            LockableCommandInterface::LOCKABLE_COMMAND_REFRESH_EVENT_NAME,
            function (): void {
                $this->lock->refresh();

                $this->debug(sprintf(
                    'Command "%s" received lock refresh event',
                    $this->getName()
                ));
            }
        );
    }
}
