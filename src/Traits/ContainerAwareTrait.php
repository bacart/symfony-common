<?php

namespace Bacart\SymfonyCommon\Traits;

use Symfony\Component\DependencyInjection\ContainerInterface;

trait ContainerAwareTrait
{
    /** @var ContainerInterface */
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
