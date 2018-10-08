<?php

namespace Bacart\SymfonyCommon\Aware\Interfaces;

use Psr\Log\LoggerInterface;

interface LoggerAwareInterface extends LoggerInterface
{
    /**
     * @param LoggerInterface|null $logger
     */
    public function setLogger(LoggerInterface $logger = null): void;
}
