<?php

  # inheritence (This class is child class and ItemClass is parent class)
  class BookClass extends ItemClass
  {
    public $author;

    // // method overiding type1
    // public function getListingDescription()
    // {
    //   return $this->name . " by " .$this->author;
    // }

    // method overiding type2 - this will call method in the parent and appent the other property
    public function getListingDescription()
    {
      return parent::getListingDescription() . " by " .$this->author;     // advanage is that any change in parent code is automatically inherited
    }

    # control access protected visibility of properties and methods
    public function getCode() {
      return $this->code;
    }



  }

 ?>
