<?php

namespace Bacart\SymfonyCommon\Aware\Traits;

use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

trait LoggerAwareTrait
{
    /** @var AbstractLogger|null */
    protected $logger;

    /**
     * @required
     *
     * @param LoggerInterface|null $logger
     */
    public function setLogger(LoggerInterface $logger = null): void
    {
        $this->logger = $logger;
    }

    /**
     * Logs with an arbitrary level.
     *
     * @param string            $level
     * @param \Throwable|string $messageOrException
     * @param array             $context
     */
    public function log($level, $messageOrException, array $context = []): void
    {
        if (null === $this->logger) {
            return;
        }

        if ($messageOrException instanceof \Throwable) {
            $exception = $messageOrException;
            $variables = $context;

            $messageOrException = sprintf(
                'Exception %s: "%s" at %s line %s',
                \get_class($exception),
                $exception->getMessage(),
                $exception->getFile(),
                $exception->getLine()
            );

            if (false !== $exceptionIndex = array_search($exception, $variables, true)) {
                unset($variables[$exceptionIndex]);
            }

            $context = [
                'exception' => $exception,
                'variables' => $variables,
            ];
        }

        $this->logger->log($level, $messageOrException, $context);
    }

    /**
     * System is unusable.
     *
     * @param \Throwable|string $message
     * @param array             $context
     */
    public function emergency($message, array $context = []): void
    {
        $this->log(LogLevel::EMERGENCY, $message, $context);
    }

    /**
     * Action must be taken immediately.
     *
     * Example: Entire website down, database unavailable, etc. This should
     * trigger the SMS alerts and wake you up.
     *
     * @param \Throwable|string $message
     * @param array             $context
     */
    public function alert($message, array $context = []): void
    {
        $this->log(LogLevel::ALERT, $message, $context);
    }

    /**
     * Critical conditions.
     *
     * Example: Application component unavailable, unexpected exception.
     *
     * @param \Throwable|string $message
     * @param array             $context
     */
    public function critical($message, array $context = []): void
    {
        $this->log(LogLevel::CRITICAL, $message, $context);
    }

    /**
     * Runtime errors that do not require immediate action but should typically
     * be logged and monitored.
     *
     * @param \Throwable|string $message
     * @param array             $context
     */
    public function error($message, array $context = []): void
    {
        $this->log(LogLevel::ERROR, $message, $context);
    }

    /**
     * Exceptional occurrences that are not errors.
     *
     * Example: Use of deprecated APIs, poor use of an API, undesirable things
     * that are not necessarily wrong.
     *
     * @param \Throwable|string $message
     * @param array             $context
     */
    public function warning($message, array $context = []): void
    {
        $this->log(LogLevel::WARNING, $message, $context);
    }

    /**
     * Normal but significant events.
     *
     * @param \Throwable|string $message
     * @param array             $context
     */
    public function notice($message, array $context = []): void
    {
        $this->log(LogLevel::NOTICE, $message, $context);
    }

    /**
     * Interesting events.
     *
     * Example: User logs in, SQL logs.
     *
     * @param \Throwable|string $message
     * @param array             $context
     */
    public function info($message, array $context = []): void
    {
        $this->log(LogLevel::INFO, $message, $context);
    }

    /**
     * Detailed debug information.
     *
     * @param \Throwable|string $message
     * @param array             $context
     */
    public function debug($message, array $context = []): void
    {
        $this->log(LogLevel::DEBUG, $message, $context);
    }
}
