<?php

namespace Bacart\SymfonyCommon\Interfaces;

use Doctrine\ODM\MongoDB\DocumentManager;

interface DocumentManagerAwareInterface
{
    /**
     * @param DocumentManager $documentManager
     */
    public function setDocumentManager(DocumentManager $documentManager): void;
}
