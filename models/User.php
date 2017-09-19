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

require_once 'ShoppingCart.php';

/**
 * User class
 *
 * @category Demo
 * @package  SampleEcommerce/models
 * @author   Dang Nguyen <ndhdang@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://link.com
 * @since    1.0.0
 */
class User
{
    public $name;
    public $email;
    public $shoppingCart;

    /**
     * Constructor
     *
     * @param string $name  name of a user
     * @param string $email email of a user
     */
    public function __construct($name, $email)
    {
        $this->name         = $name;
        $this->email        = $email;
        $this->shoppingCart = new ShoppingCart($this);
    }

    /**
     * Add a product with its quantity to user's shopping cart
     *
     * @param Product $product a Product object
     * @param integer $number  the number of product to add
     *
     * @return void
     */
    public function addProduct($product, $number)
    {
        $this->shoppingCart->addProduct($product, $number);
    }

    /**
     * Remove a product by quantity from user's shopping cart
     *
     * @param Product $product a Product object
     * @param integer $number  the number of product to remove
     *
     * @return void
     */
    public function removeProduct($product, $number)
    {
        $this->shoppingCart->removeProduct($product, $number);
    }

}
