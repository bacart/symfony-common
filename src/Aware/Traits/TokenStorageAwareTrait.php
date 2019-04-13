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

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

trait TokenStorageAwareTrait
{
    /** @var TokenStorageInterface */
    protected $tokenStorage;

    /**
     * @required
     *
     * @param TokenStorageInterface $tokenStorage
     */
    public function setTokenStorage(TokenStorageInterface $tokenStorage): void
    {
        $this->tokenStorage = $tokenStorage;
    }
}
