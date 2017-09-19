<?php

/**
 * PHP Version 7.0.22
 *
 * @category Demo
 * @package  SampleEcommerce/models
 * @author   Dang Nguyen <ndhdang@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://link.com
 * @since    1.0.0
 */

namespace SampleEcommerce\Model;

/**
 * Product class
 *
 * @category Demo
 * @package  SampleEcommerce/models
 * @author   Dang Nguyen <ndhdang@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://link.com
 * @since    1.0.0
 */
class Product
{
    public $name;
    public $price;

    /**
     * Constructor
     *
     * @param string $name  name of a product
     * @param float  $price price of a product
     */
    public function __construct($name, $price = 0)
    {
        $this->name  = $name;
        $this->price = $price;
    }
}
