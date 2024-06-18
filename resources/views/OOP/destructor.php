<?php

Class Fruit{

    public $fruit;

    function __construct($fruit){
        $this->fruit = $fruit;
    }

    public function __destruct(){
        // echo "{$this->fruit}";
    }

    function myfunc(){
        return "The fruit is {$this->fruit} and the fruit is {$this->color}";
    }
}

// new Fruit('Apple');

class Type extends Fruit{

    public $color;

    public function __construct($fruit, $color){
        $this->fruit=$fruit;
        $this->color = $color;

    }

    function myfruit(){
        return "The fruit is {$this->fruit}, the color is {$this->color}.";
    }


}

$type = new Type('Apple',"blue");

echo "<br>";
// echo $type->myfunc();

echo $type->myfunc();
echo "<br>";

echo $type->myfruit();

echo "<br>";

echo getcwd();