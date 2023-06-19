<?php 

// user define function 

// function without parameter 
function user(){
    echo "Hello";
}
// calling a function 
user();

// function with parameter 
function info($name,$age,$edu){
    echo "Name: $name Age: $age Education; $edu <br>";   
}

info("Ali",23,"IT");

info("Wahid",22,"BS");


// function with default parameter 
function fullName($fname ='Smith', $lname='Steve'){
    echo "First Name: $fname and Last Name: $lname<br>";

}

fullName("Muhammad","Furqan");


// function with return value 

function sum($x, $y){
    return $x+$y;
}

echo sum(5,5);

echo "<br>";

// function variable scope 

$a = 5;
$b =5;
function add(){
    global $a,$b;
    echo $a+$b;
}

add();

function gradeCalculator($name,$enrollment,$marks){
    if($marks >=90 && $marks <=100){
        $grade = "A+";
    }elseif($marks >=80 && $marks <90){
        $grade = "A";
    }elseif($marks >=70 && $marks <80){
        $grade = "B";
    }elseif($marks >=60 && $marks <70){
        $grade = "C";
    }elseif($marks >=50 && $marks <60){
        $grade = "D";
    }else{
        $grade = "try again";
    }

    echo "<table border='1'>
    <tr>
    <th>Name</th>
    <th>Enrolment</th>
    <th>Grade</th>
    </tr>

    <tr>
    <td>$name</td>
    <td>$enrollment</td>
    <td>$grade</td>
    </tr>
    </table>";
}

gradeCalculator("Ali",'Student14334545',85);
gradeCalculator("Shahryar",'Student143345345',55);


function evenNumber($no){
    echo "Even Numbers<br>";
    for ($i=0; $i <= $no; $i++) { 
        if($i % 2 ==0){
            echo "$i<br>";
        }
    }
}

// 0 % 2 = 0 even
// 1 % 2 = 1 odd
// 2 % 2 = 0 even
// 3 % 2 = 1 odd
// 4 % 2 = 0 even 

evenNumber(20);
function oddNumber($no){
    echo "Odd Numbers<br>";
    for ($i=0; $i <= $no; $i++) { 
        if($i % 2 ==1){
            echo "$i<br>";
        }
    }
}
oddNumber(20);

?>
