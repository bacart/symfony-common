<?php

namespace Bacart\SymfonyCommon\Interfaces;

use Doctrine\Common\Annotations\Reader;

interface ReaderAwareInterface
{
    /**
     * @param Reader $reader
     */
    public function setReader(Reader $reader): void;
}
