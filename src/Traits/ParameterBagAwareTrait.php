<?php

namespace Bacart\SymfonyCommon\Traits;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

trait ParameterBagAwareTrait
{
    /** @var ParameterBagInterface */
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
