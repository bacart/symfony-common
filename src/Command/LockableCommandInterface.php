<?php

namespace Bacart\SymfonyCommon\Command;

interface LockableCommandInterface
{
    public const LOCKABLE_COMMAND_REFRESH_EVENT_NAME = 'lockable_command_refresh_event';
    public const DISABLE_LOCK_COMMAND_OPTION_NAME = 'disable-lock';

    public const COMMAND_IS_LOCKED_ERROR_CODE = 100;
    public const DEFAULT_TTL = 60;

    /**
     * @return string
     */
    public function getDisableLockCommandOptionName(): string;

    /**
     * @return int
     */
    public function getCommandIsLockedErrorCode(): int;

    /**
     * @return int
     */
    public function getLockTtl(): int;
}
