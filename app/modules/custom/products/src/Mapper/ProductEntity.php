<?php
/**
 * @file
 * Map information from database into product entity.
 */

namespace Drupal\products\Mapper;

use Drupal\products\Entity\Product;

class ProductEntity implements MapperInterface
{

    /**
     * @return array
     */
    public function convert(array $data)
    {
        $products = [];

        if (is_array($data) && !empty($data)) {
            foreach ($data as $product ) {
                $entity = new Product(
                    $this->getTitle($product),
                    $this->getImgUrls($product),
                    $this->getDescription($product),
                    $this->getBannerUrl($product)
                );
                $products[] = $entity->toArray();
            }
        }

        return $products;
    }

    /**
     * return string
     */
    private function getTitle($product)
    {
        return $product->title->value;
    }

    /**
     * return array
     */
    private function getImgUrls($product)
    {
        $imgUrls = [];

        $imgUrlsEntity = $product->get('field_p_image_url')->getValue();

        if (!empty($imgUrlsEntity)) {
            foreach ($imgUrlsEntity as $urls) {
                $imgUrls[] = $urls['uri'];
            }
        }

        return $imgUrls;
    }

    /**
     * return string
     */
    private function getDescription($product)
    {
        return $product->body->value;
    }

    /**
     * return string
     */
    private function getBannerUrl($product)
    {
        $bannerUrl = null;

        $bannerUrlsEntity = $product->get('field_p_banner')->getValue();

        if (!empty($bannerUrlsEntity)) {
            $urlEntity = array_shift($bannerUrlsEntity);
            $bannerUrl = $urlEntity['uri'];
        }

        return $bannerUrl;
    }
}