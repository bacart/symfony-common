<?php

declare(strict_types=1);

/*
 * This file is part of the Bacart package.
 *
 * (c) Alex Bacart <alex@bacart.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bacart\SymfonyCommon\Aware\Traits;

use Symfony\Component\HttpKernel\KernelInterface;

trait KernelAwareTrait
{
    /** @var KernelInterface */
    protected $kernel;

    /**
     * @required
     */
    public function setKernel(KernelInterface $kernel): void
    {
        $this->kernel = $kernel;
    }
}
