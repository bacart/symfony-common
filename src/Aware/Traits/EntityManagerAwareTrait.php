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

use Doctrine\ORM\EntityManagerInterface;

trait EntityManagerAwareTrait
{
    /**
     * @var EntityManagerInterface
     */
    protected $em;

    /**
     * @required
     */
    public function setEntityManager(EntityManagerInterface $em): void
    {
        $this->em = $em;
    }
}
