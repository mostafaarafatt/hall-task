<?php

namespace app\Entities;


class User
{
    private $name;
    private $address;
    private $age;
    private $gender;

    public function __construct($name, Address $address, $age, $gender)
    {
        $this->name = $name;
        $this->address = $address;
        $this->age = $age;
        $this->gender = $gender;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getGender()
    {
        return $this->gender;
    }


    public function notify($message)
    {
        // We can Implement the notification logic to send messages to the user
    }
}
