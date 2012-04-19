<?php

namespace MQM\BrandBundle\Entity;

use MQM\BrandBundle\Model\BrandInterface;
use MQM\ImageBundle\Model\ImageInterface;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 * @ORM\Table(name="shop_brand")
 * @ORM\Entity(repositoryClass="MQM\BrandBundle\Entity\BrandRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Brand implements BrandInterface
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var text $description
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;
    
    /**
     * @var datetime $createdAt
     *
     * @ORM\Column(name="createdAt", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var datetime $modifiedAt
     *
     * @ORM\Column(name="modifiedAt", type="datetime", nullable=true)
     */
    private $modifiedAt;
    
    /**
     * @Assert\Type(type="MQM\ImageBundle\Entity\Image")
     *
     *
     * @ORM\ManyToOne(targetEntity="MQM\ImageBundle\Entity\Image", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="imageId", referencedColumnName="id", nullable=true)
     *
     * @var ImageInterface $image
     */
    private $image;
    
    /**
     * @ORM\OneToMany(targetEntity="MQM\ProductBundle\Entity\Product", mappedBy="brand")
     * @var ArrayCollection $products
     */
    private $products;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }
    
    function __clone()
    {
        if ($this->id) {

        }

        if ($this->image) {
            $this->image = null;
        }
    }
    
     /**
     * Invoked before the entity is updated.
     *
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        $this->updatedAt = new \DateTime();
    }
    
    public function __toString()
    {
        return '' . $this->getName();
    }
    
    /**
     *
     * {@inheritDoc}
     */
    public function getOffer()
    {
        return $this->offer;
    }

    /**
     *
     * {@inheritDoc}
     */
    public function setOffer($offer)
    {
        $this->offer = $offer;
    }
        
    /**
     *
     * {@inheritDoc}
     */
    public function setProducts(array $products)
    {
        $this->products = $products;
    }
    
    /**
     *
     * {@inheritDoc}
     */
    public function getProducts()
    {
        return $this->products;
    }
    
    /**
     *
     * {@inheritDoc}
     */
    public function setImage(ImageInterface $image)
    {
        $this->image = $image;
    }
    
    /**
     *
     * {@inheritDoc}
     */
    public function getImage()
    {
        return $this->image;
    }
    
    /**
     *
     * {@inheritDoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * {@inheritDoc}
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     *
     * {@inheritDoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     *
     * {@inheritDoc}
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     *
     * {@inheritDoc}
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     *
     * {@inheritDoc}
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     *
     * {@inheritDoc}
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     *
     * {@inheritDoc}
     */
    public function setModifiedAt($modifiedAt)
    {
        $this->modifiedAt = $modifiedAt;
    }

    /**
     *
     * {@inheritDoc}
     */
    public function getModifiedAt()
    {
        return $this->modifiedAt;
    }
}