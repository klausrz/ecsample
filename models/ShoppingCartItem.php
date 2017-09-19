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

require_once 'Product.php';

/**
 * ShoppingCartItem class. This class represent an item in a shopping cart
 *
 * @category Demo
 * @package  SampleEcommerce/models
 * @author   Dang Nguyen <ndhdang@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://link.com
 * @since    1.0.0
 */
class ShoppingCartItem
{
    public $product;
    public $quantity;
    public $position; // the position of this ShoppingCartItem in a ShoppingCart

    /**
     * Constructor
     *
     * @param Product $product  a product in this ShoppingCartItem
     * @param integer $quantity the quantity of the product
     * @param integer $position the position of a kind of product in a ShoppingCart
     */
    public function __construct($product, $quantity = 0, $position = 0)
    {
        $this->product  = $product;
        $this->quantity = $quantity;
    }

    /**
     * Increase the quantity of a product in a ShoppingCartItem
     *
     * @param integer $quantity the number to increase
     *
     * @return void
     */
    public function increaseQuantity($quantity = 1)
    {
        $this->quantity += $quantity;
    }

    /**
     * Decrease the quantity of a product in a ShoppingCartItem
     *
     * @param integer $quantity the number to decrease
     *
     * @return void
     */
    public function decreaseQuantity($quantity = 1)
    {
        if ($this->quantity > 0 && $this->quantity >= $quantity) {
            $this->quantity -= $quantity;
        }
    }

    /**
     * Calculate the price of products in this ShoppingCartItem
     *
     * @return void
     */
    public function calculatePrice()
    {
        if ($this->quantity == 0) {
            return 0;
        }

        if ($this->product instanceof Product) {
            return $this->product->price * $this->quantity;
        }

    }
}
