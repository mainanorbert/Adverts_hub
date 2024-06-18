<?php

class Fruit
{
    public $name;
    public $color;

    public function __construct($name, $color)
    {

        $this->color = $color;
        $this->name = $name;

    }

    function display(){
        return $this->name . " is " . $this->color;
    }




}

$fruit = new Fruit("Apple",'pink');

echo $fruit->display();