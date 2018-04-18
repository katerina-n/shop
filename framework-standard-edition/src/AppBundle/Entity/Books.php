<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Books
 *
 * @ORM\Table(name="books")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BooksRepository")
 */
class Books
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="category_book", type="string", length=255)
     */
    private $categoryBook;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="short_content", type="string", length=255)
     */
    private $shortContent;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=255)
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255)
     */
    private $photo;

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer")
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="tags", type="string", length=255)
     */
    private $tags;

    /**
     * @var int
     *
     * @ORM\Column(name="sale", type="integer")
     */
    private $sale;

    /**
     * @var string
     *
     * @ORM\Column(name="category_sale", type="string", length=255)
     */
    private $categorySale;

    /**
     * @var string
     *
     * @ORM\Column(name="other_photo", type="string", length=255)
     */
    private $otherPhoto;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set categoryBook
     *
     * @param string $categoryBook
     *
     * @return Books
     */
    public function setCategoryBook($categoryBook)
    {
        $this->categoryBook = $categoryBook;

        return $this;
    }

    /**
     * Get categoryBook
     *
     * @return string
     */
    public function getCategoryBook()
    {
        return $this->categoryBook;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Books
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set shortContent
     *
     * @param string $shortContent
     *
     * @return Books
     */
    public function setShortContent($shortContent)
    {
        $this->shortContent = $shortContent;

        return $this;
    }

    /**
     * Get shortContent
     *
     * @return string
     */
    public function getShortContent()
    {
        return $this->shortContent;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Books
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return Books
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return Books
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set tags
     *
     * @param string $tags
     *
     * @return Books
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return string
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set sale
     *
     * @param integer $sale
     *
     * @return Books
     */
    public function setSale($sale)
    {
        $this->sale = $sale;

        return $this;
    }

    /**
     * Get sale
     *
     * @return int
     */
    public function getSale()
    {
        return $this->sale;
    }

    /**
     * Set categorySale
     *
     * @param string $categorySale
     *
     * @return Books
     */
    public function setCategorySale($categorySale)
    {
        $this->categorySale = $categorySale;

        return $this;
    }

    /**
     * Get categorySale
     *
     * @return string
     */
    public function getCategorySale()
    {
        return $this->categorySale;
    }

    /**
     * Get otherPhoto
     *
     * @return string
     */
    public function getOtherPhoto()
    {
        return $this->otherPhoto;
    }

    /**
     * Set otherPhoto
     *
     * @param string $otherPhoto
     *
     * @return Books
     */
    public function setOtherPhoto($otherPhoto)
    {
        $this->otherPhoto = $otherPhoto;
        return $this;
    }

}

