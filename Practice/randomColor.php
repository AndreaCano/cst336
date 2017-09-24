<?php

function getRandomColor(){
            return "rgba( ".rand(0,255)." ,".rand(0,255)." ,".rand(0,255).",".(rand(0,255)/255).");";

}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Random Background Color</title>
        <meta charset = "utf-8"/>
        <style>
            body{
                /*background-color:rgba(15,20,200,.5);*/
                
                <?php
                /*$red=rand(0,255);
                $green=rand(0,255);
                $blue=rand(0,255);
                $a = rand(0,255)/255;*/
                echo "background-color:" .getRandomColor();
                ?>
                
            }
            h1{
                <?php
                echo "color:" .getRandomColor();

                echo "background-color:" .getRandomColor();
                ?>

            }
            
            h2{
                background-color: <?=getRandomColor()?>;
            }
        </style>
    </head>
    <body>
        <h1>WELCOME!</h1>
        <h2>Hola</h2>
    </body>
</html>