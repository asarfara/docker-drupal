<?php
/**
 * @file
 * Stores product into its own entity.
 */

namespace Drupal\products\Entity;

class Product {

    /** @var string */
    private $title;

    /** @var array */
    private $imgUrls = [];

    /** @var string */
    private $description;

    /** @var string */
    private $bannerUrl;

    public function __construct(
        $title,
        $imgUrls,
        $description,
        $bannerUrl
    )
    {
        $this->title = $title;
        $this->imgUrls = $imgUrls;
        $this->description = $description;
        $this->bannerUrl = $bannerUrl;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return array
     */
    public function getImgUrls()
    {
        return $this->imgUrls;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getBannerUrl()
    {
        return $this->bannerUrl;
    }

    public function toArray()
    {
        return [
            'title' => $this->getTitle(),
            'description' => $this->getDescription(),
            'imgUrls' => $this->getImgUrls(),
            'banner' => $this->getBannerUrl(),
        ];
    }

}