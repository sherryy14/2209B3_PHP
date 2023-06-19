<?php 

// if else 

$num1 =5;
$num2 =8;
$num3 =8;
$num4 ='5';
// <>  != both are same
//  0 or 1 = 1
//  1 and 0 = 0
if(($num1 > $num2 OR $num2 == $num3 AND $num3 < $num1) XOR $num3 == $num4){
    echo "First condition";
}elseif( !($num2 >= $num1 AND $num3 <> $num1) || $num4 !== $num3 ){
    echo "Second condition";
}else{
    echo "Third condition";
}

echo "<br>";
echo "<br>";
$age = 51;

if($age > 10 && $age <18){
    echo "You are not allowed to drive. Because your age is: $age<br>";
}elseif($age>=18 && $age <=50){
    echo "You are allowed to drive. Because your age is: $age <br>";
   
}else{
    echo "You need a driver. Because your age is: $age <br>";
}

// switch case 


$day = 1;

switch($day){
    case 1:
        echo "Today is Monday.";
        break;
    case 2:
        echo "Today is Tuesday.";
        break;
    case 3:
        echo "Today is Wednesday.";
        break;
    case 4:
        echo "Today is Thursday.";
        break;
    case 5:
        echo "Today is Friday.";
        break;
    case 6:
        echo "Today is Saturday.";
        break;
    case 7:
        echo "Today is Sunday.";
        break;
    default:
    echo "Invalid Number.";
    break;
}

echo "<br>";
$perc = 67;

switch (true) {
    case ($perc>=90 && $perc <=100):
        echo "Your Grade: A+";
        break;
    case ($perc>=80 && $perc <90):
        echo "Your Grade: A";
        break;
    case ($perc>=70 && $perc <80):
        echo "Your Grade: B";
        break;
    case ($perc>=60 && $perc <70):
        echo "Your Grade: C";
        break;
    case ($perc>=50 && $perc <60):
        echo "Your Grade: D";
        break;
    case ($perc <50):
        echo "Your Grade: Fail";
        break;
    default:
       echo "Invalid perc";
        break;
}

echo "<br>";
$StdID = 2;
$marks = 70;
switch ($StdID) {
    case 1:
        echo "Student Name: Muhammad Ali<br> Student ID: $StdID<br>";
        if($marks >=80 && $marks <=100){
            echo "You have got $marks marks. <br> Your Grade: A+";
        }elseif($marks >=70 && $marks <80){
            echo "You have got $marks marks. <br> Your Grade: A";
        }elseif($marks >=60 && $marks <70){
            echo "You have got $marks marks. <br> Your Grade: B";
        }elseif($marks >=50 && $marks <60){
            echo "You have got $marks marks. <br> Your Grade: C";
        }else{
            echo "You have got $marks marks. <br> Your Grade: Failed";
        }
        break;
    case 2:
        echo "Student Name: Muhammad Ebad<br> Student ID: $StdID<br>";
        if($marks >=80 && $marks <=100){
            echo "You have got $marks marks. <br> Your Grade: A+";
        }elseif($marks >=70 && $marks <80){
            echo "You have got $marks marks. <br> Your Grade: A";
        }elseif($marks >=60 && $marks <70){
            echo "You have got $marks marks. <br> Your Grade: B";
        }elseif($marks >=50 && $marks <60){
            echo "You have got $marks marks. <br> Your Grade: C";
        }else{
            echo "You have got $marks marks. <br> Your Grade: Failed";
        }
        break;
    
    default:
       echo "Invalid Student ID";
        break;
}

?>