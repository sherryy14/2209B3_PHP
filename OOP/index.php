<?php 

// OOP - > Object Oriented Programming

// Parent Class 
class Person{
    // Member variables 
    public $name;
    public $age;
    public $email;
    public $education;
    public $phone;
    public $cnic;

    // Call / invoke automatically 
    function __construct($name, $age, $email,$education,$phone,$cnic){
        $this->name = $name; 
        $this->age = $age; 
        $this->email= $email; 
        $this->education = $education; 
        $this->phone = $phone; 
        $this->cnic = $cnic; 

    }

    // method 
    function canSpeak(){
        echo "This person $this->name can speak and age $this->age <br><br>";
    }
    
    function cantSpeak(){
        
        echo "This person $this->name can not speak and age $this->age <br><br>";
    }

}

// Object   
$p1 = new Person('Umama',20,'sheikhumama@gmail.com','Software Engineer', '090078601','42101342342343');
echo $p1->canSpeak();

$p2 = new Person('Ali',30,'ali@gmail.com','Inter',034354545,4204343433);
echo $p2->cantSpeak();
// echo $p2->canSpeak();


// Child extends Parent 
class Student extends Person{
    public $student_id ;
    public $course ;

    function __construct($name, $email, $student_id, $course){

        $this->name = $name ;
        $this->email = $email ;
        $this->student_id = $student_id ;
        $this->course = $course ;
    }

    function courseEnrolled(){
        return "$this->name is enrolled in the $this->course <br>";
    }

}
$s1 = new Student("Huzaifa",'huzaifa@gmail.com','student1423223',"ADSE");
echo $s1->courseEnrolled();

class GraduatedStudent extends Student{
    public $degree ;

    function __construct($name, $student_id, $course, $degree){
        $this->name = $name;
        $this->student_id = $student_id;
        $this->course = $course;
        $this->degree = $degree;
    }

    function completed(){
        echo "$this->name having $this->student_id was enrolled in $this->course has completed the $this->degree degree";
    }
}

$g1 = new GraduatedStudent('Wahid','student12132323','DISM','ABC');
echo $g1->completed();

class Emp extends Person{

}


?>