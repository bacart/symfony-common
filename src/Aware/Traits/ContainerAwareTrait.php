<?php

namespace Bacart\SymfonyCommon\Aware\Traits;

use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerInterface;

trait ContainerAwareTrait
{
    /** @var Container */
    protected $container;

    /**
     * @required
     *
     * @param ContainerInterface $container
     */
    public function setContainer(ContainerInterface $container): void
    {
        $this->container = $container;
    }
}
