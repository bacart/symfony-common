<?php

namespace Bacart\SymfonyCommon\Aware\Interfaces;

use Symfony\Component\Lock\Factory;

interface LockFactoryAwareInterface
{
    /**
     * @param Factory $lockFactory
     */
    public function setLockFactory(Factory $lockFactory): void;
}
