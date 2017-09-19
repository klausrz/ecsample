<?php

/**
 * PHP Version 7.0.22
 *
 * @category Demo
 * @package  Tests
 * @author   Dang Nguyen <ndhdang@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://link.com
 * @since    1.0.0
 */

require_once './models/Product.php';
require_once './models/User.php';
require_once './models/ShoppingCart.php';

use PHPUnit\Framework\TestCase;
use SampleEcommerce\Model\Product;
use SampleEcommerce\Model\ShoppingCart;
use SampleEcommerce\Model\User;

/**
 * EcommerceTest class
 *
 * @category Demo
 * @package  Tests
 * @author   Dang Nguyen <ndhdang@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://link.com
 * @since    1.0.0
 */
class EcommerceTest extends TestCase
{
    /**
     * Add 2 "Apple" products with 4.95 each and 1 "Orange" product with 3.99, 
     * then calculate total price
     *
     * @return void
     */
    public function testAddProductAndCalculatePrice()
    {
        $user   = new User('John', 'john@mail.com');
        $apple  = new Product('Apple', 4.95);
        $orange = new Product('Orange', 3.99);

        $user->addProduct($apple, 2);
        $user->addProduct($orange, 1);

        $price = $user->shoppingCart->calculatePrice();
        $this->assertEquals(13.89, $price);
    }

    /**
     * Add 3 "Apple" products with 4.95 each, remove 1 "Apple"
     * then calculate total price
     *
     * @return void
     */
    public function testAddRemoveProductAndCalculatePrice()
    {
        $user  = new User('John', 'john@mail.com');
        $apple = new Product('Apple', 4.95);

        $user->addProduct($apple, 3);
        $user->removeProduct($apple, 1);

        $price = $user->shoppingCart->calculatePrice();
        $this->assertEquals(9.9, $price);
    }
}
