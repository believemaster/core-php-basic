<?php

class ItemClass {
  // // Class properties first
  // public $name;
  // public $description = "This description is default.";
  // public $price = 2.33;
  //
  // // Constructor - called whenever the object is created.
  // public function __construct($name, $description){    // constructor with arguments
  //   $this->name = $name;
  //   $this->description = $description;
  // }
  //
  // // Class methods or function (By default methods are public)
  // public function sayHello(){
  //   echo "Hello from function";
  // }
  //
  // // private methods here that cannot be accesed via object outside the class
  // private function getName(){
  //   return $this->name;
  // }

  # Getter - Setter - control what is exactly store in an objs property and reject not valid value
  // private $name;
  // private $description;
  //
  // // getter method = gets the value of the property
  // public function getName()
  // {
  //   return $this->name;
  // }
  //
  // // setter method = sets the method of the property to value passed in as an argument
  // public function setName($name)
  // {
  //   $this->name = $name;
  // }
  //
  // public function getDescription()
  // {
  //   return $this->description;
  // }
  //
  // public function setDescription($description)
  // {
  //   $this->description = $description;
  // }
  // make property read only by deleting setter and write only by deleting getter

  // # static properties & methods
  // public $name;
  // public $desc = "This is a description";
  //
  // public static $count = 0;
  //
  // public function __construct($name, $desc) {
  //   $this->name = $name;
  //   $this->desc = $desc;
  //
  //   static::$count++;
  // }
  //
  // public function sayHello()
  // {
  //   echo "Hello";
  // }
  //
  // public function getName()
  // {
  //   return $this->name;
  // }
  //
  // public static function showCount(){
  //   echo static::$count;
  // }

  // # constants using define and const to create constant values
  // # const keyword is used to define constants in class and is defined at the top of class before any variable/methods
  //
  // public CONST MAX_LENGTH = 35; // static values that don't need static keyword and all constants are public by default
  //
  // public $name;
  // public $desc;
  //
  // public function getName(){
  //   return $this->name;
  // }
  //
  // public function setName($name)
  // {
  //   $this->name = $name;
  // }

  // # inheritance using extend keywords
  // public $name;
  //
  // public function getListingDescription()
  // {
  //   return $this->name;
  // }

  # overiding methods and using the parent keyword to call the parent class code
  // public $name;
  //
  // public function getListingDescription()
  // {
  //   return "Item " . $this->name;
  // }

  # Control Access Protected Visibility of Properties & Methods
  public $name;

  protected $code = 1234; // protected visibllity is accesible by the methods in the child class

  public function getListingDescription()
  {
    return "Item " . $this->name;
  }

  /*
    Visibility        Availability
    public            anywhere: inside other classes and object instances
    private           inside the current class only
    protected         inside the current class and any subclasses
  */

}
