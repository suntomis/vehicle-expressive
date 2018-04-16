<?php
declare(strict_types = 1);
namespace Isedc\AppServer\Container\Infrastructure;

use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\EntityManager;
use Psr\Container\ContainerInterface;

use Doctrine\Common\Annotations\AnnotationReader;

// use Codeliner\CargoBackend\Infrastructure\Persistence\Doctrine\Type\LegsDoctrineType;
// use Codeliner\CargoBackend\Infrastructure\Persistence\Doctrine\Type\TrackingIdDoctrineType;
final class DoctrineEntityManagerFactory
{

    /**
     * Create service
     *
     * @param ContainerInterface $container
     * @return mixed
     */
    public function __invoke(ContainerInterface $container): EntityManager
    {
        $appConfig = $container->get('config');
        
        if (! isset($appConfig['doctrine']['connection']['orm_default'])) {
            throw new \RuntimeException("Missing doctrine connection config for orm_default driver");
        }
        
        $config = new \Doctrine\ORM\Configuration();
        
        $config->setAutoGenerateProxyClasses(true);
        $config->setProxyDir('data/cache');
        $config->setProxyNamespace('Isedc\AppServer\Doctrine\Entities');
        // $config->setMetadataDriverImpl(new \Doctrine\ORM\Mapping\Driver\XmlDriver(array(
        //     __DIR__ . '/../Infrastructure/Persistence/Doctrine/ORM'
        // )));
        
        $annotationReader = new AnnotationReader();
        $config->setMetadataDriverImpl(new \Doctrine\ORM\Mapping\Driver\AnnotationDriver($annotationReader, array(
            __DIR__ . '/../Entity'
        )));

        //AnnotationDriver
        
        $config->setNamingStrategy(new \Doctrine\ORM\Mapping\UnderscoreNamingStrategy());
        
        $config->setQueryCacheImpl(new \Doctrine\Common\Cache\ArrayCache());
        $config->setMetadataCacheImpl(new \Doctrine\Common\Cache\ArrayCache());

        //$config->setResultCacheImpl(new \Doctrine\Common\Cache\ApcuCache());
        //$query = $em->createQuery('select u from \Entities\User u');
        //$query->useResultCache(true);
        //$query->setResultCacheDriver(new \Doctrine\Common\Cache\ApcuCache());
        //$query->useResultCache(false);
        //$query->setResultCacheLifetime(3600);
        //$ ./doctrine orm:clear-cache:query
        //$ ./doctrine orm:clear-cache:metadata
        //$ ./doctrine orm:clear-cache:result
        //All these tasks accept a --flush option to flush the entire contents of the cache instead of invalidating the entries.
        
        $entityManager = \Doctrine\ORM\EntityManager::create($appConfig['doctrine']['connection']['orm_default'], $config);
        
        //// Add custom DDD types to map ValueObjects correctly
        // if (! Type::hasType('cargo_itinerary_legs')) {
        // Type::addType('cargo_itinerary_legs', LegsDoctrineType::class);
        // }
        
        // if (! Type::hasType('cargo_tracking_id')) {
        // Type::addType(TrackingIdDoctrineType::NAME, TrackingIdDoctrineType::class);
        // }
        
        return $entityManager;
    }
}