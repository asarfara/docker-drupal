<?php
/**
 * @file
 * Deals with products.
 */

namespace Drupal\products\Plugin\Filter;

use Drupal\filter\Plugin\FilterBase;

/**
 * Filter that shows products added by wysiwyg editors around shortcodes.
 *
 * @Filter(
 *   id = "shortcode_product",
 *   module = "products",
 *   title = @Translation("Shortcodes - Products"),
 *   description = @Translation("Filter that shows products added by wysiwyg editors around shortcodes."),
 *   type = Drupal\filter\Plugin\FilterInterface::TYPE_MARKUP_LANGUAGE,
 * )
 */
class ProductsFilter extends FilterBase {

    /**
     * Performs the filter processing.
     *
     * @param string $text
     *   The text string to be filtered.
     * @param string $langcode
     *   The language code of the text to be filtered.
     *
     * @return \Drupal\filter\FilterProcessResult
     *   The filtered text, wrapped in a FilterProcessResult object, and possibly
     *   with associated assets, cacheability metadata and placeholders.
     *
     * @see \Drupal\filter\FilterProcessResult
     */
    public function process($text, $langcode)
    {
        // TODO: Implement process() method.
    }
}