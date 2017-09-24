<?php

session_start(); //starts/ continues an exsiting session
if(isset($_SESSION['matchCount'])){ //everytime match is won. 
    $_SESSION['matchCount']=0; //also add $_SESSION['matchCount']++; after adding points
    
    //DO timeElapsed after 10 runs
}
//associative arrays
/*$players = array("Juan" => 20); //don't HAVE to initialize but its good practice
$players["John"] = 40; //no array[0] instead 0 is John*/
$_SESSION['Juan'] = 40;

//echo $players["John"];
echo "<br />";
echo $_SESSION["Juan"]; //prints tracked value


?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>

    </body>
</html>