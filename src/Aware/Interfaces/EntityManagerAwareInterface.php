<?php

namespace Bacart\SymfonyCommon\Aware\Interfaces;

use Doctrine\ORM\EntityManagerInterface;

interface EntityManagerAwareInterface
{
    /**
     * @param EntityManagerInterface $em
     */
    public function setEntityManager(EntityManagerInterface $em): void;
}
