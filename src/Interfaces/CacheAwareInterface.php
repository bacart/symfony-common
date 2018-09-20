<?php

namespace Bacart\SymfonyCommon\Interfaces;

use Psr\Cache\CacheItemPoolInterface;
use Symfony\Component\Cache\Adapter\TagAwareAdapterInterface;

interface CacheAwareInterface
{
    /**
     * @param CacheItemPoolInterface|TagAwareAdapterInterface $cache
     */
    public function setCache(CacheItemPoolInterface $cache): void;
}
