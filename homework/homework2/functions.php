<?php 

function home(){
    $mash = array("mansion", "apartment", "shack", "hut");
    shuffle($mash);
    $home = $mash[(rand(0, count($mash)-1))];
    echo"<div id= home>";
    echo "<p class=title> You will live in a(n) $home! </p>";
    echo "<img src='img/home/$home.png' alt='$home'/>";
    echo"</div>";

}
function car(){
    //array(s)
    $cars = array();

    //one loop (total two)
    for ($i = 0; $i < 5; $i++){
    $cars[] = $i;
    }
     $var = array_rand($cars);
     switch($var){
                case 0:$vroom= "chevy";
                        break;
                case 1:$vroom= "limo";
                        break;
                case 2:$vroom= "hummer";
                        break;
                case 3:$vroom= "jalope";
                        break;
                case 4:$vroom= "toy";
                        break;

            }
     echo"<div id= car>";
     echo "<p class = title>Vehicle of choice</p>";
    echo "<img src='img/vehicle/$vroom.png' alt='$vroom'/>";
    echo "</div>";
    
}

function partnerWkid($value1,$value2){
    home();
    //two switch conditions
     switch($value1){
                case 0:$partner= "chuck";
                        break;
                case 1:$partner= "ryan";
                        break;
                case 2:$partner= "scarlett";
                        break;
                case 3:$partner= "emma";
                        break;

            }
             switch($value2){
                case 0:$symbol= "one";
                        break;
                case 1:$symbol= "two";
                        break;
                case 2: $symbol= "three";
                        break;
                case 3:$symbol= "eight";
                        break;
            }
    //at least two images
    echo"<div id= partner>";
         echo "<p class =title>Partner in Crime</p>";
    echo "<img src='img/$partner.png' alt='$partner'/>";
    echo "</div>";
    echo "<div id= kids>";
    echo "<p class = title> $symbol kid(s) in your future</p>";
    echo "<img src='img/$symbol.png' alt='$symbol'/>";
    echo "</div>";
    }
    
    function play(){
        //one loop
        for($i =1;$i<=2;$i++){
            $randomValue = rand(0,3);
            $randomValue2 = rand(0,3);
    }
    partnerWkid($randomValue,$randomValue2);
    car();

}




?>