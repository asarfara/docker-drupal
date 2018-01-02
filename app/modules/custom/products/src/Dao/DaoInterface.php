<?php
/**
 * @file
 * Retrieve information from database.
 */

namespace Drupal\products\Dao;

interface DaoInterface {

    /**
     * @return array
     */
    public function getAllProducts();

}
