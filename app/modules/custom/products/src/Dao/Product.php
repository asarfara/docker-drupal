<?php
/**
 * @file
 * Retrieve product information from database.
 */

namespace Drupal\products\Dao;

class Product implements DaoInterface
{

    /**
     * Return all products with their information
     */
    public function getAllProducts()
    {
        $nids = \Drupal::entityQuery('node')->condition('type','product')->execute();
        $nodes =  \Drupal\node\Entity\Node::loadMultiple($nids);
        return $nodes;
    }
}
