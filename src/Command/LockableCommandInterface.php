<?php

namespace Bacart\SymfonyCommon\Command;

interface LockableCommandInterface
{
    /**
     * @return int
     */
    public function getLockTtl(): int;
}
