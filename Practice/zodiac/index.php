<?php

function yearList($start,$endYear){
    $yearSum=0;
    $zodiac = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");
    $count =0;

    while($count < count($zodiac)){
    for ($i = $start; $i <= $endYear; $i++) {
        $yearSum= $yearSum+1;
          if($i % 4){
              echo "<br/>";
            echo "<img src='img/$zodiac[$count].png' width='100'>";
            echo "<br/>";
            }
        
        if($i == 1776){
               echo "<li> $i USA INDEPENDENCE </li>";
                if($count == count($zodiac)-1){
                $count = 0;
            }
                else{
                    $count++;
                }
            }
            if($i%100 == 0){
                echo "<strong><li> $i Happy New Century </li></strong>";
                if($count == count($zodiac)-1){
                $count = 0;
                }
                else{
                    $count++;
                }
         
            }
            else{
                echo "<li>  $i  </li>";
                if($count == count($zodiac)-1){
                    $count = 0;
                }
                else{
                    $count++;
                }
            }
            
          
        }
        $count= 15;
           //$ZODIAC[$COUNTER%COUNT($ZODIAC))] 
    }
    return $yearSum;
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Practice: Chinese Zodiac Years </title>
    </head>
    <body>
        
        <h1>Chinese Zodiac List</h1>
<br>
        
         <form>
            <input type="text" name="startYear" placeholder="start"/>
            <input type="text" name="endYear" placeholder="end"/>
            <input type="submit" value="Search"/>
        </form>
        
        <br /><br />
         <?php
          if(isset($_GET['startYear'])&& $_GET['endYear']) {
              $sum = yearList($_GET['startYear'],$_GET['endYear']);
     
    
    }
            echo "Year sum = $sum <br/>";
            
         ?>

    </body>
</html>