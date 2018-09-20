<?php

namespace Bacart\SymfonyCommon\Traits;

use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

trait LoggerAwareTrait
{
    /** @var LoggerInterface */
    protected $logger;

    /**
     * @required
     *
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }

    /**
     * @param \Throwable $exception
     * @param array      $variables
     * @param string     $level
     */
    public function logException(
        \Throwable $exception,
        array $variables = [],
        string $level = LogLevel::ERROR
    ): void {
        if (false !== $exceptionIndex = array_search($exception, $variables, true)) {
            unset($variables[$exceptionIndex]);
        }

        $message = sprintf(
            'Exception %s: "%s" at %s line %s',
            \get_class($exception),
            $exception->getMessage(),
            $exception->getFile(),
            $exception->getLine()
        );

        $this->logger->log($level, $message, [
            'exception' => $exception,
            'variables' => $variables,
        ]);
    }
}
