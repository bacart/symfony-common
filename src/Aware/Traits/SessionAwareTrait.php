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

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

trait SessionAwareTrait
{
    /** @var Session|null */
    protected $session;

    /**
     * @required
     *
     * @param SessionInterface|null $session
     */
    public function setSession(?SessionInterface $session): void
    {
        $this->session = $session;
    }
}
