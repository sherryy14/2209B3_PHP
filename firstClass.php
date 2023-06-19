<?php 

echo "PHP First Class <br>";

$name = "Ali";
$age = 24;
$alive = TRUE;
// echo $name;

// echo 'Student Name: '. $name;
echo "<h1>Student Name: $name </h1><h2> Age: $age </h2> ";

// used to check datatype 

// echo var_dump($name);

$str = "This is PHP class";

echo "The length of this ($str) string is:". strlen($str);
echo "<br>";
echo "The word count of this ($str) string is:".str_word_count($str);
echo "<br>";
echo "The reverse order of this ($str) string is:".strrev($str);
echo "<br>";


define('constNumber',45,false);

echo constNumber;
echo "<br>";
$a = 5;
$b = 5;


echo $b===$a;

$a = $a+$b;
$a+=$b;

$fname = "Ali";
$lname = "Khan";

$fname = $fname.$lname;
$fname .=$lname;

// if else 
echo "<br>";
echo "<br>";
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

?>