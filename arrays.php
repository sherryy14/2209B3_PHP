<?php 

// Numerical Array 


// $numbers = [2,4,5,6,8,5,4,3,3];
// $no = array(,3,54,56,7,78,89,9,0);


$stds = ['Ali','Ahmed',"roohan",'furqan','mudassir','waqar'];

echo $stds[0];
echo "<pre>";
print_r($stds);
echo "</pre>"; 

// count();
// sizeof()
for ($i=0; $i < count($stds); $i++) { 
    echo "Student name: $stds[$i] <br>";
}

echo "<table border='1'>";
echo "<tr><th>ID</th><th>Name</th></tr>";
for ($i=0; $i < count($stds); $i++) { 
    echo "<tr><td>$i</td><td>$stds[$i]</td></tr> ";
}
echo "</table>";

$emp = ['Hamza','Shahryar',"Wahid",'Abdullah',"ebad"];
        // ArrayName as index => Item 
foreach ($emp as $key => $value) {
   echo "Employee ID: emp$key. <br> Employee Name: $value<br><br>";
}

$empDetails = [
    ["Ali","BSCS",23,"Karachi"],
    ["Waleed","CS",25,"Lahore"],
    ["Wahid","IT",20,"Karachi"],
    ["Ibrar","SE",25,"Karachi"],
];

echo $empDetails[0][0];

echo "<pre>";
print_r($empDetails);
echo "</pre>";

foreach ($empDetails as $outterIndex => $outterValue) {
    foreach ($outterValue as $innerIndex => $innerValue) {
        echo "$innerValue<br>";
    }
}
?>