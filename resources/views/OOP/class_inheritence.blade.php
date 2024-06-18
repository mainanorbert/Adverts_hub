<?php

class Employee extends Person
{
    public $jobTitle;

    public function __construct($jobTitle, $firstname, $lastname, $gender='Male')
    {
        $this->jobTitle = $jobTitle;
        parent::__construct($firstname, $lastname, $gender);
    }

    public function setJobTitle($jobTitle)
    {
        $this->jobTitle=ucfirst($jobTitle);
    }
    public function getJobTitle(){
        return $this->jobTitle;
    }

}

class Person{
    public $firstname;
    public $lastname;
    private $gender;

    public function __construct($firstname,$lastname,$gender='female'){
        $this->firstname=$firstname;
        $this->lastname=$lastname;
        $this->gender=$gender;
    }
    public function getGender(){
        return $this->gender;
    }
    private function sayHello(){
        return $this->firstname.' is '.  $this->gender. ' and he is a '.$this->jobTitle;
    }
}
$person=new Person('Judy','Julius','m');
$employee=new Employee('Android Developer','Judy','Alphonse');
echo $employee->sayHello()
