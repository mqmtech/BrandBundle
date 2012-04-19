<?php

namespace MQM\BrandBundle\Model;

use MQM\BrandBundle\Model\BrandInterface;

interface BrandFactoryInterface
{
    /**
     *
     * @return BrandInterface
     */
    public function createBrand();
    
    /**
     * @return string 
     */
    public function getBrandClass();
}


