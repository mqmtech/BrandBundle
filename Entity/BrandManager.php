<?php

namespace MQM\BrandBundle\Entity;

use MQM\BrandBundle\Model\BrandManagerInterface;
use MQM\BrandBundle\Model\BrandFactoryInterface;
use MQM\BrandBundle\Model\BrandInterface;
use MQM\PaginationBundle\Pagination\PaginationInterface;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class BrandManager implements BrandManagerInterface
{
    private $factory;
    private $entityManager;
    private $repository;
   
    public function __construct(EntityManager $entityManager, BrandFactoryInterface $factory)
    {
        $this->entityManager = $entityManager;
        $this->factory = $factory;
        $brandClass = $factory->getBrandClass();
        $this->repository = $entityManager->getRepository($brandClass);
    }
    
    /**
     * {@inheritDoc} 
     */
    public function createBrand()
    {
        return $this->getFactory()->createBrand();
    }
    
    /**
     * {@inheritDoc} 
     */
    public function saveBrand(BrandInterface $brand, $andFlush = true)
    {
        $this->getEntityManager()->persist($brand);
        if ($andFlush) {
            $this->getEntityManager()->flush();
        }
    }
    
    /**
     * {@inheritDoc} 
     */
    public function deleteBrand(BrandInterface $brand, $andFlush = true)
    {
        $this->getEntityManager()->remove($brand);
        if ($andFlush) {
            $this->getEntityManager()->flush();
        }
    }
    
    /**
     * {@inheritDoc} 
     */
    public function flush()
    {
        $this->getEntityManager()->flush();
    }
    
    /**
     * {@inheritDoc} 
     */
    public function findRandomBrands($maxCount = self::MAX_RANDOM_RESULTS)
    {
        return $this->getRepository()->findRandomBrands($maxCount);
    }
    
    /**
     * {@inheritDoc} 
     */
    public function findBrandBy(array $criteria)
    {
        return $this->getRepository()->findOneBy($criteria);
    }

    /**
     * {@inheritDoc} 
     */
    public function findBrands(PaginationInterface $pagination = null)
    {
        return $this->getRepository()->findAll($pagination);
    }
    
    /**
     * @return BrandFactoryInterface
     */
    protected function getFactory()
    {
        return $this->factory;
    }
    
    /**
     * @return EntityManager
     */
    protected function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
    * @return EntityRepository
    */
    protected function getRepository()
    {
        return $this->repository;
    }
}