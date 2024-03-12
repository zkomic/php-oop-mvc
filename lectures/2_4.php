<?php

class User
{

    public $name;
    public $age;

    // Runs when an object is created
    public function __construct($name, $age)
    {
        echo 'Class ' . __CLASS__ . ' instantiated.<br>';
        $this->name = $name;
        $this->age = $age;
    }

    public function sayHello()
    {
        return $this->name . ' says hello.';
    }

    // Called when no other references to a certain object 
    // Used for cleanup, closing connections etc.
    // public function __destruct()
    // {
    //     echo 'destructor ran...';
    // }
}

$user1 = new User('John', 36);
echo $user1->name . " is " .  $user1->age . " years old.";
echo "<br>";
echo $user1->sayHello();

echo "<br><br>";

$user1 = new User('Sarah', 25);
echo $user1->name . " is " .  $user1->age . " years old.";
echo "<br>";
echo $user1->sayHello();
