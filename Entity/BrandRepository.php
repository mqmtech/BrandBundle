<?php

namespace MQM\BrandBundle\Entity;

use Doctrine\ORM\EntityRepository;
use MQM\PaginationBundle\Pagination\PaginationInterface;

class BrandRepository extends EntityRepository
{
    /**
     * @return array
     */
    public function findRandomBrands($maxCount = self::MAX_RANDOM_RESULTS)
    {
        $em = $this->getEntityManager();
        $q = $em->createQuery('SELECT b from MQMBrandBundle:Brand b');
        $brands = $q->getResult();
        
        if ($brands == null) {
            return null;
        }
        $size = sizeof($brands);
        if ($size < $maxCount) {
            $maxCount = $size;
        }
        $rand_keys = array_rand($brands, $maxCount);
        $randBrands = array();
        if (sizeof($rand_keys) > 1) {
            foreach ($rand_keys as $key) {
                 $randBrands[] = $brands[$key];            
            }
        }
        else {
            $randBrands[] = $brands[$rand_keys];            
        }
        
        return $randBrands;
    }
    
    public function findAll(PaginationInterface $pagination = null)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('SELECT b from MQMBrandBundle:Brand b');
        if ($pagination) {
            $query = $pagination->paginateQuery($query);
        }
        
        return $query->getResult();
    }
}