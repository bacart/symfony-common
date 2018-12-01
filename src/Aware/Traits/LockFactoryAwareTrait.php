<?php

/*
 * This file is part of the Bacart package.
 *
 * (c) Alex Bacart <alex@bacart.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bacart\SymfonyCommon\Aware\Traits;

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
