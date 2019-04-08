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

namespace Bacart\SymfonyCommon\Aware\Interfaces;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

interface SessionAwareInterface
{
    /**
     * @param SessionInterface|null $session
     */
    public function setSession(SessionInterface $session = null): void;
}
