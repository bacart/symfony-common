<?php

namespace Bacart\SymfonyCommon\Interfaces;

use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

interface LoggerAwareInterface extends LoggerInterface
{
    /**
     * @param LoggerInterface|null $logger
     */
    public function setLogger(LoggerInterface $logger = null): void;

    /**
     * @param \Throwable $exception
     * @param array      $variables
     * @param string     $level
     */
    public function logException(
        \Throwable $exception,
        array $variables = [],
        string $level = LogLevel::ERROR
    ): void;
}
