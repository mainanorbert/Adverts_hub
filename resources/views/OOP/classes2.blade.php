<?php

class Mangoes extends Fruit
{
    private $kamba_Mangoes;
    private $maize;

    const FRUIT_COMPANY="DelMont";
    public static $no_of_fruits=200;

    public function __construct($kamba_Mangoes,$apple,$maize)
    {
        $this->kamba_Mangoes = $kamba_Mangoes;
        $this->maize=$maize;

            parent::__construct($apple);
     
    }

    public static function getFruitsNo(){
        return "The ".  self::$no_of_fruits. " is the number of fruits ". "The type is ". self::$apple_type ;
    }
    

    public function __set($name,$value){
        $this->$name=ucfirst($value);
    }

    public function __get($name){
        return $this->name;
    }

    public function myApp(){
        return "These  are good " . $this->apple. " and ". $this->maize;
    }

}

class Fruit
{
    const FRUIT_COLOR="Pink";
    private $apple;

    static $apple_type="A";
  

    public function __construct($apple)
    {
        $this->appl= $apple;
      
    }

    public function getFruit()
    {
        return $this->apple;
    }
    protected function sayHello(){
        $message= "I have ".$this->apple;
        return $message;
    }
}
$mangoes = new Mangoes('red apples', 'green mangoes','');

echo Mangoes::getFruitsNo();


echo "\n";




echo "\n";
