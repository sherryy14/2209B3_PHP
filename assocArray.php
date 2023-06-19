<?php 
// Associative Array 

$age = [
    "john" => 20,
    "david" => 25,
    "smith" => 23,
    "shane" => 30,
    "michel" => 23
];
// according to value 
// asort($age);
// arsort($age);


// according to key/index 
// ksort($age);
// krsort($age);


// echo $age['john'];
// echo $age['shane'];

foreach ($age as $i => $v) {
    echo "Name: $i and Age: $v <br>";
}


// Array Sorting Method 

$emp = ['Hamza','Shahryar',"Wahid",'Abdullah',"Ebad"];
// sort($emp);
// rsort($emp);
        // ArrayName as index => Item 
foreach ($emp as $key => $value) {
   echo "Employee ID: emp$key. <br> Employee Name: $value<br><br>";
}




?>