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

require_once 'ShoppingCartItem.php';

/**
 * ShoppingCart class. This class represent a shopping cart belonging to a user
 *
 * @category Demo
 * @package  SampleEcommerce/models
 * @author   Dang Nguyen <ndhdang@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://link.com
 * @since    1.0.0
 */
class ShoppingCart
{
    public $user;
    public $productList = array();

    /**
     * Constructor
     *
     * @param User  $user        the user possessing this ShoppingCart
     * @param array $productList a list of products contained in this ShoppingCart
     */
    public function __construct($user, $productList = array())
    {
        $this->user        = $user;
        $this->productList = $productList;
    }

    /**
     * Add a product with its quantity to this shopping cart
     *
     * @param Product $product a Product object
     * @param integer $number  the number of product to add
     *
     * @return void
     */
    public function addProduct($product, $number)
    {
        $existedCartItem = $this->findProduct($product);
        if (empty($this->productList) || !$existedCartItem) {
            array_push(
                $this->productList, new ShoppingCartItem(
                    $product, $number, 
                    count($this->productList)
                )
            );
        } else if ($existedCartItem) {
            $existedCartItem->increaseQuantity($number);
        }

    }

    /**
     * Find a product in this shopping cart
     *
     * @param Product $product the product to find
     *
     * @return a Product object if found, otherwise, return false
     */
    public function findProduct($product)
    {
        if (count($this->productList) == 0) {
            return false;
        }

        foreach ($this->productList as $key => $cartItem) {
            if ($cartItem->product == $product) {
                return $cartItem;
            }
        }
        return false;
    }

    /**
     * Remove a product by quantity from this shopping cart
     *
     * @param Product $product a Product object
     * @param integer $number  the number of product to remove
     *
     * @return void
     */
    public function removeProduct($product, $number)
    {
        $existedCartItem = $this->findProduct($product);
        if (empty($this->productList) || $existedCartItem === false) {
            return false;
        }

        if ($existedCartItem->quantity > $number) {
            $existedCartItem->decreaseQuantity($number);
        } else {
            array_splice($this->productList, $existedCartItem->position, 1);
        }

        return true;
    }

    /**
     * Calculate total price of all products in this shopping cart
     *
     * @return a Product object if found, otherwise, return false
     */
    public function calculatePrice()
    {
        if (count($this->productList) == 0) {
            return 0;
        }
        $price = 0;
        foreach ($this->productList as $cartItem) {
            $price += $cartItem->calculatePrice();
        }
        return $price;
    }
}
