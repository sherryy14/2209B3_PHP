<?php 

// For Loop 

// Forward counting
echo "Forward counting<br>"; 
for($i= 0; $i<=10; $i++){
    echo "$i <br>";
}

// backward counting 
echo "Backward counting<br>"; 

for($i = 10; $i>=0 ; $i--){
    echo "$i <br>";
}

// Even Number 
echo "Even Number<br>"; 

for($i= 0; $i<=10; $i++){
    if($i%2 == 0){
        echo "Even: $i <br>";
    }
}

// Odd Number 
echo "Odd Number<br>"; 

for($i= 0; $i<=10; $i++){
    if($i%2 == 1){
        echo "Odd: $i <br>";
    }
}

// Table

// 2 x 1 = 2
// 2 x 2 = 4

$no =5;
echo "<h3>Table of $no: </h3>";
for($i=1; $i<=10; $i++){
    echo "$no x  $i = " . $no*$i . "<br>";
}

// break statemenet 

echo "break statemenet  <br>";
for ($i=0; $i <=10; $i++) { 

   if($i == 5){
    break;
   }
   echo "$i<br>";
}

// continue statemenet 

echo "continue statemenet  <br>";
for ($i=0; $i <=10; $i++) { 

   if($i == 5){
    continue;
   }
   echo "$i<br>";
}


?>