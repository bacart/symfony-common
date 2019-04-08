<?php

declare(strict_types=1);

/*
 * This file is part of the Bacart package.
 *
 * (c) Alex Bacart <alex@bacart.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bacart\SymfonyCommon\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Annotations\AnnotationException;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\Mapping\Entity;
use LogicException;
use ReflectionClass;

abstract class AbstractServiceEntityRepository extends ServiceEntityRepository
{
    /**
     * {@inheritdoc}
     *
     * @throws AnnotationException
     * @throws LogicException
     */
    public function __construct(ManagerRegistry $registry)
    {
        $annotationReader = new AnnotationReader();

        foreach ($registry->getManagers() as $manager) {
            if (!$manager instanceof ObjectManager) {
                continue;
            }

            $allMetadata = $manager->getMetadataFactory()->getAllMetadata();

            foreach ($allMetadata as $metadata) {
                $reflectionClass = $metadata->getReflectionClass();

                $repositoryClass = $this->getEntityRepository(
                    $reflectionClass,
                    $annotationReader
                );

                if (static::class === $repositoryClass) {
                    parent::__construct($registry, $reflectionClass->getName());

                    return;
                }
            }
        }

        throw new LogicException(sprintf(
            'Could not find the entity class for repository "%s"',
            static::class
        ));
    }

    /**
     * @param ReflectionClass  $reflectionClass
     * @param AnnotationReader $annotationReader
     *
     * @return string|null
     */
    protected function getEntityRepository(
        ReflectionClass $reflectionClass,
        AnnotationReader $annotationReader
    ): ?string {
        $annotations = $annotationReader->getClassAnnotations($reflectionClass);

        foreach ($annotations as $annotation) {
            if ($annotation instanceof Entity) {
                return $annotation->repositoryClass;
            }
        }

        return null;
    }
}
