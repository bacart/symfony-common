<?php

namespace Bacart\SymfonyCommon\Aware\Traits;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

trait SessionAwareTrait
{
    /** @var Session|null */
    protected $session;

    /**
     * @required
     *
     * @param SessionInterface|null $session
     */
    public function setSession(SessionInterface $session = null): void
    {
        $this->session = $session;
    }
}