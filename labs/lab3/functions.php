<?php
$start = microtime(true);

session_start(); //start or resume a session
//session_destroy();
if (!isset($_SESSION['matchCount'])) { //checks whether the session exists
    $_SESSION['matchCount'] = 1;
    $_SESSION['totalElapsedTime'] = 0;
}

    $deck = array();
    $suits = array("clubs","spades","hearts","diamonds");
    
    $player1 = array();
    $player2 = array();
    $player3 = array();
    $player4 = array();


for ($i = 0; $i < 4; $i++) {
    for ($j = 1; $j <= 13; $j++) {
    
        $deck[] = $suits[$i] . "_" . $j;
    }
    
}

function drawCard(){
    global $deck;
    $chosen;
    shuffle($deck);
    $chosen = array_pop($deck);
    return $chosen;
}

function play($chosen){
    $stringParts = explode("_", $chosen);

    $firstPart  = $stringParts[0]; 
    $secondPart = $stringParts[1];
    echo "<img src='../lab3/cards/$firstPart/$secondPart.png' alt='$firstPart'>";
    return $stringParts[1];
}

function player(){
    $total = 0;
    while($total <= 35 ) {
        $val = play(drawCard());
        //if($val + $total > 42){
          //  break;
        //}
        $total+= $val; //still draws past 42 :c
    }
    return $total;
}


function playerToll(){
    global $playerscore;
     $pics = array("pic1","pic2","pic3", "pic4");
     $names = array("Player1", "Player2", "Player3", "Player4");
     $winner = array();

     $ar = array(0,1,2,3);
     shuffle($ar);
    for($i = 1;$i<=4;$i++) {
                $k=$ar[$i-1];  
                echo "<img src='img/$pics[$k].png' width='100'>" . $names[$k];
                ${"player" . $i } = player();
                echo " ${'player' . $i } ";
                $playerScore[] = ${'player' . $i};
                //print_r($playerScore);
                if(${'player' . $i } == 42) {
                    echo " <br/><h3>Player ". $i . " Wins!</h3>";
                }
                echo "<br>";
                
        }
        echo "  ";
         //print_r($player1);
        
        displayWinner($playerScore);
}

function displayWinner($playerScore) {
   // if($playerScore ==)
   $winner=array();
    $max = 0;
    $index = 0;
    $tie = 0;
    for($i=0;$i<4;$i++) {
        if($playerScore[$i] > $max && $playerScore[$i] <= 42  ) {
            
             $max = $playerScore[$i];
             $index = $i+1;
            //echo $max;
           
        }
       
    }
  
    for($j=0;$j<4;$j++) {
          if($playerScore[$j] == $max){
              array_push($winner, $j+1);
              //print_r($winner);
          }
        if($j == $index-1)
        continue;
        else { //&& $playerScore[$index-1] != $playerScore[$j]
             if($playerScore[$j] == $max ) {
                 $tie+=1;
             }
        }
    }
     $points = array_sum($playerScore);
    for($i=0;$i<count($winner);$i++){
       
        //echo "Subtract loser points";
        $points= $points - $playerScore[($winner[$i])-1];
        //echo $points;
     }
    if($tie > 0 || $index == 0) {
        echo "Tie!<br>";
        for($i=0;$i<count($winner);$i++){
            echo "Player ". $winner[$i] . " wins " . $points . " points!<br>";
        }
    }
    else {
        echo "Player ". $index . " wins " . $points . " points!";
    }
}



function elapsedTime(){
global $start;
     echo "<hr>";
     $elapsedSecs = microtime(true) - $start;
     echo "This match elapsed time: " . $elapsedSecs . " secs <br /><br/>";

     echo "Matches played:"  . $_SESSION['matchCount'] . "<br /> <br/>";

     $_SESSION['totalElapsedTime'] += $elapsedSecs;
     
     echo "Total elapsed time in all matches: " .  $_SESSION['totalElapsedTime'] . "<br /><br />";
     
     echo "Average time: " . ( $_SESSION['totalElapsedTime']  / $_SESSION['matchCount']);
     
     $_SESSION['matchCount']++;
} //elapsedTime






        

?>
        
