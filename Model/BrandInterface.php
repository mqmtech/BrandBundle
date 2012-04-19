<?php

namespace MQM\BrandBundle\Model;

use MQM\ImageBundle\Model\ImageInterface;

interface BrandInterface
{
    public function getOffer();

    public function setOffer($offer);
        
    /**
    * Set products
     * 
    * @param array $products
    */
    public function setProducts(array $products);
    
    /**
     * Get products
     * 
     * @return array
     */
    public function getProducts();
    
    /**
     * Set image
     * 
     * @param ImageInterface $image
     */
    public function setImage(ImageInterface $image);
    
    /**
     * Get image
     * @return ImageInterface
     */
    public function getImage();
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId();

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name);

    /**
     * Get name
     *
     * @return string 
     */
    public function getName();

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description);

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription();
    
    /**
     * Set createdAt
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt);

    /**
     * Get createdAt
     *
     * @return datetime 
     */
    public function getCreatedAt();

    /**
     * Set modifiedAt
     *
     * @param datetime $modifiedAt
     */
    public function setModifiedAt($modifiedAt);

    /**
     * Get modifiedAt
     *
     * @return datetime 
     */
    public function getModifiedAt();
}