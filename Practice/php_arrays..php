<?php
function displaySymbol($symbol){
    echo "<img src= '../labs/lab2/777/img/$symbol.png' width ='70' />";
}

$symbols = array("lemon", "orange","cherry");
//print_r($symbols); //displays the array content, only for debugging
//echo $symbols[0]; //displays an element

$symbols[] = "grapes"; //adds element

array_push($symbols,"seven"); //adds element to end of array

for($i=0;$i < count($symbols);$i++){ //count gets array size
    displaySymbol($symbols[$i]);
}

sort($symbols); //orders elements in ascending order (rsort is reverse order)

print_r($symbols);

//shuffle($symbols);

echo "<hr>";

print_r($symbols);
echo "<hr>";

$lastSymbol = array_pop($symbols); //retrieves and REMOVES last element
displaySymbol($lastSymbol);
print_r($symbols);

foreach($symbols as $s){
    displaySymbol($s);
}

unset($symbols[2]); //gets rid of position 2 all together
echo "<hr>";
print_r($symbols);

$symbols = array_values($symbols); //re-indexes the array
echo"<hr>";
print_r($symbols);

//display a random symbol

displaySymbol($symbols[rand(0,count($symbols)-1)]);

displaySymbol($symbols[array_rand($symbols)]);



?>

<!DOCTYPE html>
<html>
    <head>
        <title> PHP Arrays </title>
    </head>
    <body>
        
        
        
    </body>
</html>