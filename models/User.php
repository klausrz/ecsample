<?php

namespace SampleEcommerce\Model;

require_once 'ShoppingCart.php';

class User
{
    public $name;
    public $email;
    public $shoppingCart;

    public function __construct($name, $email)
    {
        $this->name         = $name;
        $this->email        = $email;
        $this->shoppingCart = new ShoppingCart($this);
    }

    public function addProduct($product)
    {
        $this->shoppingCart->addProduct($product);
    }

    public function removeProduct($product)
    {
        $this->shoppingCart->removeProduct($product);
    }

}
