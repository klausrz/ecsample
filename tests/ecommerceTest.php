<?php

require_once './models/Product.php';
require_once './models/User.php';
require_once './models/ShoppingCart.php';

use PHPUnit\Framework\TestCase;
use SampleEcommerce\Model\Product;
use SampleEcommerce\Model\ShoppingCart;
use SampleEcommerce\Model\User;

class ecommerceTest extends TestCase
{
    public function testAddProductAndCalculatePrice()
    {
        $user   = new User('John Doe', 'john.doe@example.com');
        $apple  = new Product('Apple', 4.95);
        $apple2 = new Product('Apple 2', 4.95);
        $orange = new Product('Orange', 3.99);

        $user->addProduct($apple);
        $user->addProduct($apple2);
        $user->addProduct($orange);
        $this->assertEquals(13.89, $user->shoppingCart->calculatePrice());
    }

    public function testAddRemoveProductAndCalculatePrice()
    {
        $user   = new User('John Doe', 'john.doe@example.com');
        $apple  = new Product('Apple', 4.95);
        $apple2 = new Product('Apple 2', 4.95);
        $apple3 = new Product('Apple 3', 4.95);

        $user->addProduct($apple);
        $user->addProduct($apple2);
        $user->addProduct($apple3);
        $user->removeProduct($apple2);
        $this->assertEquals(9.9, $user->shoppingCart->calculatePrice());
    }
}
