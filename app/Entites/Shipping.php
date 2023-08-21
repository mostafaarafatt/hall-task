<?php

namespace app\Entities;

use app\Entites\Country;
use app\Entites\ShippingMethod;

class Shipping
{
    private $name;
    private $cost;
    private $tax;

    public function __construct($name, $cost, $tax)
    {
        $this->name = $name;
        $this->cost = $cost;
        $this->tax = $tax;
    }

    public function calculateTax(Address $address)
    {
        switch ($this->name) {
            case ShippingMethod::ARAMEX:
                if ($address->getCountry() == Country::EGYPT) {
                    return $this->tax + 0.14;
                } elseif ($address->getCountry() == Country::KUWAIT) {
                    return $this->tax + 0.1;
                }
                break;
            case ShippingMethod::FEDEX:
                if ($address->getCountry() == Country::EGYPT) {
                    return $this->tax + 0.20;
                } elseif ($address->getCountry() == Country::KUWAIT) {
                    return $this->tax + 0.13;
                }
                break;
            case ShippingMethod::FETCHER:
                // Handle this as you need.
                break;
            default:
                throw new \Exception("Invalid shipping method");
        }
        return 0;
    }

    public function getCost()
    {
        return $this->cost;
    }

    public function notify($message)
    {
        // We can Implement the notification logic to shipping company
    }
}
