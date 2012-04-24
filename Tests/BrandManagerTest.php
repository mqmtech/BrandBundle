<?php

namespace MQM\BrandBundle\Test\Brand;


use MQM\BrandBundle\Model\BrandManagerInterface;


class BrandManagerTest extends \Symfony\Bundle\FrameworkBundle\Test\WebTestCase
{   
    protected $_container;
    
    /**
     * @var BrandManagerInterface
     */
    private $brandManager;


    public function __construct()
    {
        parent::__construct();
        
        $client = static::createClient();
        $container = $client->getContainer();
        $this->_container = $container;  
    }
    
    protected function setUp()
    {
        $this->brandManager = $this->get('mqm_brand.brand_manager');
    }

    protected function tearDown()
    {
        $this->resetBrands();
    }

    protected function get($service)
    {
        return $this->_container->get($service);
    }
    
    public function testGetAssertManager()
    {
        $this->assertNotNull($this->brandManager);
    }
    
    private function resetBrands()
    {
        $brands = $this->brandManager->findBrands();
        foreach ($brands as $brand) {
            $this->brandManager->deleteBrand($brand, false);
        }
        $this->brandManager->flush();
    }
}
