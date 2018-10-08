<?php

namespace Bacart\SymfonyCommon\Aware\Interfaces;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

interface SessionAwareInterface
{
    /**
     * @param SessionInterface|null $session
     */
    public function setSession(SessionInterface $session = null): void;
}
