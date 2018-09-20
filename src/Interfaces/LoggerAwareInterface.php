<?php

namespace Bacart\SymfonyCommon\Interfaces;

use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

interface LoggerAwareInterface
{
    /**
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger): void;

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
