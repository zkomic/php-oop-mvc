<?php 

class User {

    // Properties (attributes)
    public $name;

    // Methods (functions)
    public function sayHello() {

        return $this->name . " says hello.";
    }
}

// Instantiate a user object from user class
$user1 = new User();
$user1->name = 'John';
echo $user1->name;
echo "<br>";
echo $user1->sayHello();
echo "<br>";

// Create another user
$user2 = new User();
$user2->name = 'Jeff';
echo $user2->name;
echo "<br>";
echo $user2->sayHello();

?>