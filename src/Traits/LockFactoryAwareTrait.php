<?php

namespace Bacart\SymfonyCommon\Traits;

use Symfony\Component\Lock\Factory;

trait LockFactoryAwareTrait
{
    /** @var Factory */
    protected $lockFactory;

    /**
     * @required
     *
     * @param Factory $lockFactory
     */
    public function setLockFactory(Factory $lockFactory): void
    {
        $this->lockFactory = $lockFactory;
    }
}
