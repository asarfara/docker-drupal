<?php
/**
 * @file
 * Deals with showing products based on criteria.
 */

namespace Drupal\products\Plugin\Shortcode;

use Drupal\Core\Language\Language;
use Drupal\products\Dao\Product;
use Drupal\products\Mapper\ProductEntity;
use Drupal\shortcode\Plugin\ShortcodeBase;

/**
 * Provides a shortcode for products.
 *
 * @Shortcode(
 *   id = "products",
 *   title = @Translation("Show products based on criteria"),
 *   description = @Translation("Show templated products based on criteria")
 * )
 */
class ProductsShortcode extends ShortcodeBase {

    public function process($attributes, $text, $langcode = Language::LANGCODE_NOT_SPECIFIED) {
        /** Just copied database into 1, 2 and 3 so that I dont have to create more products on CMS side :P */
        $productDao1 = new Product();
        $productMapper1 = new ProductEntity();
        $products1 = $productMapper1->convert($productDao1->getAllProducts());

        $productDao2 = new Product();
        $productMapper2 = new ProductEntity();
        $products2 = $productMapper2->convert($productDao2->getAllProducts());

        $productDao3 = new Product();
        $productMapper3 = new ProductEntity();
        $products3 = $productMapper3->convert($productDao3->getAllProducts());

        $output = [
            '#theme' => 'shortcode_products',
            '#attributes' => array_merge($products1, $products2, $products3),
        ];

        return $this->render($output);
    }

    /**
     * {@inheritdoc}
     */
    public function tips($long = FALSE) {
        $output = array();
        $output[] = '<p><strong>' . $this->t('[products][/products]') . '</strong> ';
        $output[] = $this->t('Show products based on criteria.') . '</p>';
        return implode(' ', $output);
    }
}