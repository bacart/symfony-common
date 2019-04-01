<?php

/*
 * This file is part of the Bacart package.
 *
 * (c) Alex Bacart <alex@bacart.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bacart\SymfonyCommon\Aware\Interfaces;

use Symfony\Component\Validator\Validator\ValidatorInterface;

interface ValidatorAwareInterface
{
    /**
     * @param ValidatorInterface $validator
     */
    public function setValidator(ValidatorInterface $validator): void;
}
