<?php

namespace app\Entities;

class Product
{
    private $name;
    private $quantity;
    private $category;
    private $attributes;
    private $price;

    public function __construct($name, $quantity, $category, $attributes, $price)
    {
        $this->name = $name;
        $this->quantity = $quantity;
        $this->category = $category;
        $this->attributes = $attributes;
        $this->price = $price;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function calculatePrice()
    {
        foreach ($this->attributes as $key => $attribute) {
            if ($key == 'size') {
                if ($attribute == 'small') {
                    $this->price -= 10;
                } elseif ($attribute == 'medium') {
                    $this->price += 20;
                } elseif ($attribute == 'large') {
                    $this->price += 50;
                } else {
                    throw new \Exception("Invalid size attribute");
                }
            } elseif ($key == 'color') {
                if ($attribute == 'white') {
                    $this->price -= 15;
                } elseif ($attribute == 'red') {
                    $this->price += 20;
                } elseif ($attribute == 'blue') {
                    $this->price += 18;
                } else {
                    throw new \Exception("Invalid color attribute");
                }
            } else {
                throw new \Exception("Invalid attribute");
            }
        }
        return $this->price;
    }
}
