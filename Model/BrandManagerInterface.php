<?php

namespace MQM\BrandBundle\Model;

use MQM\BrandBundle\Model\BrandInterface;
use MQM\PaginationBundle\Pagination\PaginationInterface;

interface BrandManagerInterface
{    
    const MAX_RANDOM_RESULTS = 10;
    
    /**
     * @return BrandInterface 
     */
    public function createBrand();
    
    /**
     *
     * @param BrandInterface $brand
     * @param boolean $andFlush 
     */
    public function saveBrand(BrandInterface $brand, $andFlush = true);
    
    /**
     *
     * @param BrandInterface $brand
     * @param boolean $andFlush 
     */
    public function deleteBrand(BrandInterface $brand, $andFlush = true);
    
    /**
     * @return BrandManagerInterface 
     */
    public function flush();
    
    /**
     * @param array $criteria
     * @return BrandInterface 
     */
    public function findBrandBy(array $criteria);
    
    /**
     * @return array 
     */
    public function findBrands(PaginationInterface $pagination = null);
    
    /**
     * @return array  
     */
    public function findRandomBrands($maxCount = self::MAX_RANDOM_RESULTS);
}