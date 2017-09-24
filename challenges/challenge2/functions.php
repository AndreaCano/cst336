
        <?php
        function displayCard($randomValue,$randomValue2){
            
            switch($randomValue){
                case 0:$deck= "clubs";
                        break;
                case 1:$deck= "diamonds";
                        break;
                case 2: $deck= "hearts";
                        break;
                case 3:$deck= "spades";
                        break;

            }
             switch($randomValue2){
                case 0:$symbol= "ten";
                        break;
                case 1:$symbol= "jack";
                        break;
                case 2: $symbol= "queen";
                        break;
                case 3:$symbol= "king";
                        break;
                case 4:$symbol= "ace";
                        break;
            }
            echo "<img src='img/cards/$deck/$symbol.png' alt='$symbol'/>";
        }
        
    function play(){
        echo "<div id='move'>";
        $card1;
        $card2;
        for($i =1;$i<=2;$i++){
            $randomValue = rand(0,3);
            $randomValue2 = rand(0,4);
            ${"card" . $i } = $randomValue2;
            displayCard($randomValue,$randomValue2);
            
        }
        echo "<div id='win'>";
         if($card1 > $card2)
            {
                echo "Human Wins";
            }
            else if($card1==$card2){
                echo "Tied";
            }
            else{
                echo "Computer Wins";
            }
           echo "</div>";
         echo "</div>";

    }

        ?>
        