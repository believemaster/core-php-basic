<?php

  require 'ItemClass.php';
  require 'BookClass.php';

  // $object1 = new ItemClass();
  //
  // $object1->name = "Example Item Name";
  // // $object1->description = "Example Description"; // here it can be override.
  //
  // $object2 = new ItemClass();
  // $object2->name = "Example Item Name from object 2";

  // var_dump($object1);
  // echo "<br/>";
  // var_dump($object1->name);
  // echo "<br/>";
  // var_dump($object1->description);
  // echo "<br/>";

  // $object1->sayHello();
  // echo "<br>";
  // echo $object1->getName();
  // echo "<br>";
  // echo $object2->getName();

  // Constructor - Methods
  // $objConstruct = new ItemClass("Crush it", "social media");
  //
  // var_dump($objConstruct);

  // # Getter & Setter
  // $obj = new ItemClass;
  //
  // // $obj->name = "Example"; // cannot be called directly as the vaiavle is private
  //
  // // Use setter to assign the properties
  // $obj->setName("Example of:");
  // $obj->setDescription(" getter setter example");
  //
  // // use getter to read the propery
  // echo $obj->getName();
  // echo $obj->getDescription();


  # static properties & methods
  // var_dump(ItemClass::$count);
  // $obj = new ItemClass("huge", "a big item");
  // // var_dump(ItemClass::$count);
  // $obj2 = new ItemClass("small", "a small item");
  // // var_dump(ItemClass::$count);
  // ItemClass::showCount();
  // $obj->name = "A new name";
  //
  // echo $obj->getName();

  // # Constant using define and const to create constant values
  // $obj = new ItemClass();
  // $count = 0;
  // $count++;
  //
  // define('MAXIMUM', 100); // canont be defined again and is globally defined (eg: db and config settings)
  // define('COLOR', "red");
  //
  // echo "Constant from index via define('MAXIMUM', 100): " . MAXIMUM;
  // echo "<br/> Constant from index via define('COLOR', 'red'): " . COLOR;
  // echo "<br/> Constant from class: " . ItemClass::MAX_LENGTH;

  // # inheritance using extend keywords
  // require 'BookClass.php';
  //
  // $obj = new ItemClass();
  // $obj->name = "TV";
  //
  // echo $obj->getListingDescription();
  //
  // echo "<br/>";
  //
  // $book = new BookClass();
  // $book->name = "Hamlet";
  // $book->author = "Shakespear";
  //
  // echo $book->getListingDescription();

  # Control Access protected visibility of Properties and methods

  $obj = new ItemClass();

  // echo $obj->code; // we get error because protected property is not accessible outside the class but is accessible inside methods inside subclasses

  $book = new BookClass();
  echo $book->getCode();


?>
