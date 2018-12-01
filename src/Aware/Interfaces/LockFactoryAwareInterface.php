<?php

/*
 * This file is part of the Bacart package.
 *
 * (c) Alex Bacart <alex@bacart.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bacart\SymfonyCommon\Aware\Interfaces;

use Symfony\Component\Lock\Factory;

interface LockFactoryAwareInterface
{
    /**
     * @param Factory $lockFactory
     */
    public function setLockFactory(Factory $lockFactory): void;
}
