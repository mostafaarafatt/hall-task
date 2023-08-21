<?php

namespace app\Entities\Tests;

use app\Entites\Status;
use PHPUnit\Framework\TestCase;
use app\Entities\Address;
use app\Entities\Shipping;
use app\Entities\Product;
use app\Entities\User;
use app\Entities\Order;

class OrderTest extends TestCase
{
    public function testOrderHasReceipt()
    {
        $address = new Address('cairo', 'el tahrir', 'egypt', 'nearest_point', 'map');

        $shipping = new Shipping('aramex', 10, 0.13);

        $attributes = ['size' => 'small', 'color' => 'red'];
        $product = new Product('t-shirt', 30, 'men', $attributes, 50);

        $user = new User('ahmed mohamed', $address, 20, 'male');

        $order = new Order($user, $shipping);

        // Change the status using the new changeStatus method
        $order->changeStatus(Status::DELIVERING);

        // Calculate the expected total price with tax and shipping
        $expectedTotalPrice = $product->getPrice() + ($product->getPrice() * $order->getTax()) + $shipping->getCost();

        // Create the expected receipt string
        $expectedReceipt = "total price : $expectedTotalPrice #|# user name : ahmed mohamed #|# product name : t-shirt category : men price : {$product->getPrice()} #|# size small #|# color red";

        // Print the receipt
        $print_receipt = $order->printReceipt();

        // Compare the expected receipt with the actual printed receipt
        $this->assertEquals($expectedReceipt, $print_receipt);
    }
}
