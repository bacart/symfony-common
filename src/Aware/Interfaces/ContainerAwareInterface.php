<?php

namespace Bacart\SymfonyCommon\Aware\Interfaces;

use Symfony\Component\DependencyInjection\ContainerInterface;

interface ContainerAwareInterface
{
    /**
     * @param ContainerInterface $container
     */
    public function setContainer(ContainerInterface $container): void;
}
