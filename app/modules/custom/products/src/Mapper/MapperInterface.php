<?php
/**
 * @file
 * Map information.
 */

namespace Drupal\products\Mapper;

interface MapperInterface {

    /**
     * @return array
     */
    public function convert(array $data);

}
