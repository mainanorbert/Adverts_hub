<?php
// namespace resources\views\OOP;

class Employee extends Person
{
    public $jobTitle;

    public function __construct($jobTitle, $firstname, $lastname, $gender = 'f')
    {
        $this->jobTitle = $jobTitle;
        parent::__construct($firstname, $lastname, $gender);
    }

    public function jobTitle()
    {
        echo $this->firstname. ' is a '. $this->jobTitle;
    }
}


class Person
{
    public $firstname;
    public $lastname;
    public $gender;

    public function __construct($firstname, $lastname, $gender = 'f')
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->gender = $gender;
    }

    public function sayHello()
    {
        echo 'My Name is ' . $this->firstname . ' ' . $this->lastname . ' I am ' . $this->gender;
    }

    public function getGender()
    {
        return $this->gender;
    }
}

$person = new Employee('Web Developer','Amose', 'james', 'm');

echo $person->jobTitle();
echo "\n"; 
echo $person->sayHello();


