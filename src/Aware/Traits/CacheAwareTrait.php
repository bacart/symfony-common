<?php

namespace Bacart\SymfonyCommon\Aware\Traits;

use Psr\Cache\CacheItemPoolInterface;
use Symfony\Component\Cache\Adapter\TagAwareAdapterInterface;

trait CacheAwareTrait
{
    /** @var CacheItemPoolInterface|TagAwareAdapterInterface */
    protected $cache;

    /**
     * @required
     *
     * @param CacheItemPoolInterface|TagAwareAdapterInterface $cache
     */
    public function setCache(CacheItemPoolInterface $cache): void
    {
        $this->cache = $cache;
    }
}
