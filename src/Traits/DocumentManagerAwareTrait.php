<?php

namespace Bacart\SymfonyCommon\Traits;

use Doctrine\ODM\MongoDB\DocumentManager;

trait DocumentManagerAwareTrait
{
    /** @var DocumentManager */
    protected $documentManager;

    /**
     * @required
     *
     * @param DocumentManager $documentManager
     */
    public function setDocumentManager(DocumentManager $documentManager): void
    {
        $this->documentManager = $documentManager;
    }
}
