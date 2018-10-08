<?php

namespace Bacart\SymfonyCommon\Aware\Interfaces;

use Doctrine\ODM\MongoDB\DocumentManager;

interface DocumentManagerAwareInterface
{
    /**
     * @param DocumentManager $documentManager
     */
    public function setDocumentManager(DocumentManager $documentManager): void;
}
