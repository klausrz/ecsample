<?php

namespace SampleEcommerce\Model;

class ShoppingCart
{
    public $user;
    public $productList = array();

    public function __construct($user, $productList = array())
    {
        $this->user        = $user;
        $this->productList = $productList;
    }

    public function addProduct($product)
    {
        array_push($this->productList, $product);
    }

    public function removeProduct($product)
    {

        if (empty($this->productList)) {
            return false;
        }

        foreach ($this->productList as $key => $productItem) {
            if ($productItem == $product) {
                array_splice($this->productList, $key, 1);
                return true;
            }
        }

    }

    public function calculatePrice()
    {
        if (count($this->productList) == 0) {
            return 0;
        }

        $price = 0;
        foreach ($this->productList as $product) {
            $price += $product->price;
        }

        return $price;
    }
}
