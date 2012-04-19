<?php

namespace MQM\BrandBundle\Entity;

use MQM\BrandBundle\Model\BrandFactoryInterface;

class BrandFactory implements BrandFactoryInterface
{
    private $brandClass;
    
    public function __construct($brandClass) {
        $this->brandClass = $brandClass;
    }
    
    /**
     * {@inheritDoc}
     */
    public function createBrand()
    {
        return new $this->brandClass();
    }

    /**
     * {@inheritDoc}
     */
    public function getBrandClass()
    {
        return $this->brandClass;
    }
}