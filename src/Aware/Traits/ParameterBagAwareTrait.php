<?php

namespace Bacart\SymfonyCommon\Aware\Traits;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

trait ParameterBagAwareTrait
{
    /** @var ParameterBag */
    protected $parameterBag;

    /**
     * @required
     *
     * @param ParameterBagInterface $parameterBag
     */
    public function setParameterBag(ParameterBagInterface $parameterBag): void
    {
        $this->parameterBag = $parameterBag;
    }
}
