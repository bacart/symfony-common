<?php

namespace Bacart\SymfonyCommon\Aware\Traits;

use Doctrine\Common\Annotations\Reader;

trait ReaderAwareTrait
{
    /** @var Reader */
    protected $reader;

    /**
     * @required
     *
     * @param Reader $reader
     */
    public function setReader(Reader $reader): void
    {
        $this->reader = $reader;
    }
}
