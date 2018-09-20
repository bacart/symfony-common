<?php

namespace Bacart\SymfonyCommon\Interfaces;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

interface ParameterBagAwareInterface
{
    /**
     * @param ParameterBagInterface $parameterBag
     */
    public function setParameterBag(ParameterBagInterface $parameterBag): void;
}
