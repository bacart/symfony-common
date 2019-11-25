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

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

trait AuthenticationUtilsAwareTrait
{
    /** @var AuthenticationUtils */
    protected $authenticationUtils;

    /**
     * @required
     *
     * @param AuthenticationUtils $authenticationUtils
     */
    public function setAuthenticationUtils(AuthenticationUtils $authenticationUtils): void
    {
        $this->authenticationUtils = $authenticationUtils;
    }
}
