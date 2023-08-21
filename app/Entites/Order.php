<?php

namespace app\Entities;

use app\Entites\Status;

class Order
{
    private $products = [];
    private $user;
    private $shipping;
    private $invoiceNumber;
    private $status;
    private $tax;
    private $price;
    private $isDone = false;

    // Constructor
    public function __construct(User $user, Shipping $shipping)
    {
        $this->user = $user;
        $this->shipping = $shipping;
    }

    public function getTax()
    {
        return $this->tax;
    }

    // Setters and Getters
    // ... Implement getters and setters for properties if needed

    public function addProduct(Product $product)
    {
        $this->products[] = $product;
    }

    public function changeStatus($status, $extra = false)
    {
        $this->validateStatus($status);

        switch ($status) {
            case Status::ACCEPTED:
                $this->handleAcceptedStatus($extra);
                break;
            case Status::PROCESSING:
                $this->status = Status::PROCESSING;
                $this->user->notify("Your order is being processed");
                break;
            case Status::DELIVERING:
                $this->handleDeliveringStatus();
                break;
            case Status::RECEIVED:
                $this->status = Status::PENDING;
                $this->isDone = true;
                break;
            case Status::REJECTED:
                $this->status = Status::PENDING;
                $this->user->notify("Your order is rejected");
                break;
            default:
                throw new \Exception("Internal error");
        }
    }

    public function printReceipt($format = 'json')
    {
        switch ($format) {
            case 'json':
                return $this->generateJsonReceipt();
            case 'xml':
                return $this->generateXmlReceipt();
            default:
                throw new \Exception("Unsupported receipt format");
        }
    }

    // Private methods for handling status changes
    private function handleAcceptedStatus($extra)
    {
        $this->status = Status::ACCEPTED;
        $this->user->notify("Your order is accepted");
        $this->calculatePrice();
        if ($extra) {
            $this->price += $this->tax * 2;
        }
    }

    private function handleDeliveringStatus()
    {
        $this->status = Status::DELIVERING;
        $this->user->notify("Your order is delivering");
        $this->invoiceNumber = rand(1, 10);
        $this->shipping->notify('We have an order; we need to deliver it');
        $this->calculatePrice();
        $tax = $this->tax + $this->shipping->calculateTax($this->user->getAddress());
        $this->price += $tax + $this->shipping->getCost();
    }

    // Private method for calculating price based on products
    private function calculatePrice()
    {
        $this->price = 0;
        foreach ($this->products as $product) {
            $this->price += $product->calculatePrice();
        }
    }

    // Private method for validating status
    private function validateStatus($status)
    {
        if (!in_array($status, Status::getAllStatuses())) {
            throw new \Exception("Invalid status provided");
        }
    }

    // Private methods for generating receipt in different formats
    private function generateJsonReceipt()
    {
        // JSON receipt generation logic, we can do it later
    }

    private function generateXmlReceipt()
    {
        // XML receipt generation logic, we can do it later
    }
}
