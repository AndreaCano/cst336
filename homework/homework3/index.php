<?php

    $backgroundImage = "img/moon.jpg";

    if(isset($_GET['keyword'])) {
     
     //  echo "Keyword typed: " . $_GET['keyword'];
        
        include 'api/pixabayAPI.php';
        
        $keyword = $_GET['keyword'];
        if (!empty($_GET['category'])) {  //User selected a category
             
            $keyword = $_GET['category'];
        }
        
        if(isset($_GET['layout'])){
            $imageURLs = getImageURLs($keyword, $_GET['layout']);

        }else{
            $imageURLs = getImageURLs($keyword);
        }
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
    }
    
    
    function checkIfSelected($option){
        if($option == $_GET['category']){
            return "selected";
        }
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Homework5: Personal Story</title>
        <meta charset="utf-8">
        <style>
            @import url("css/style.css");

        </style>
        <style scoped>
        html{
        background-image: repeating-linear-gradient(145deg, #ccc, #ccc 30px, #dbdbdb 30px, #dbdbdb 60px);
        }
        </style>
        
        <link href="https://fonts.googleapis.com/css?family=Sniglet" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Nosifer" rel="stylesheet">

    </head>
    <body>

         <header>
            <h1>"Madlibs"</h1>
        </header>
                        <hr>

        <div id= "optionHead">

        <button type="button" class= "button" id= "romantic" onclick="location.href='romance.php'">Romance</button>
        <button type="button" class= "button" id= "og" onclick="location.href='index.php'">Main Page</button>
        <button type="button" class= "button" id = "horrific" onclick="location.href='horror.php'">Horror</button>
        </div>
                        <hr>
        <p>Hello and Welcome to a knockoff Madlib! To begin your journey to an epic story select one of the categories above(Romance or Horror)! Don't forget to rate once you are done!</p>

       <footer>
            <hr>
                <img src="img/buddy_verified.png" alt="buddy">
                CST336. 2017&copy; Cano<br />
                <strong>Disclaimer:</strong> The information on this webpage is ficticious.<br />
                It is used for academic purposes.
        </footer>
    </body>
</html>