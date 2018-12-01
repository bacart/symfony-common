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

use Psr\Cache\CacheItemPoolInterface;
use Symfony\Component\Cache\Adapter\TagAwareAdapterInterface;

interface CacheAwareInterface
{
    /**
     * @param CacheItemPoolInterface|TagAwareAdapterInterface $cache
     */
    public function setCache(CacheItemPoolInterface $cache): void;
}
