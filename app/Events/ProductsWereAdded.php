<?php
/**
 * Created by PhpStorm.
 * User: danielsmith
 * Date: 29/11/2018
 * Time: 20:14
 */

namespace App\Events;


class ProductsWereAdded
{
    /**
     * @var array
     */
    private $products;

    /**
     * ProductsWereAdded constructor.
     * @param array $all
     */
    public function __construct(array $products)
    {
        $this->products = $products;
    }

    public function getProducts()
    {
        return $this->products;
    }
}