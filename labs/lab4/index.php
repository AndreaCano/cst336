<?php


if(isset($_GET['keyword'])){
    echo "Keyword typed: ".$_GET['keyword'];
    include 'api/pixabayAPI.php';
    $imageUrls = getImageUrls($_GET['keyword']);
    $backgroundImage = $imageUrls[array_rand($imageUrls)];
   // print_r($imageUrls);
   for($i=0;$i<5;$i++){
       do{
           $randomIndex = rand(0, count($imageUrls));
       }
       while(!isset($imageUrls[$randomIndex]));
       
       echo "<img src='".$imageUrls[$randomIndex]."' width ='200'>";
       unset($imageUrls[$randomIndex]);
   }
}else{
  echo"<h2> Type keyword to find images from Pixabay </h2>";
}

?>
<div id ="carousel-ex" class="carousel-slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
        
        <?php
        
            for($i=0;$i<5;$i++){
                 do{
           $randomIndex = rand(0, count($imageUrls));
       }
       while(!isset($imageUrls[$randomIndex]));
       echo '<div class="item';
       echo($i==0)?"active":"";
       echo'">';
       echo '<img src="'.$imageUrls[$randomIndex].'">';
       echo'</div>';
       unset($imageUrls[$randomIndex]);
            }
        
        ?>
        
    </div>
</div>
<!DOCTYPE html>
<html>
    <head>
        <title>Lab 4: Pixabay Carousel</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        <style>
            @import url("css/styles.css");
            
            body{
                background-image:url(<?=$backgroundImage?>);
            }
            
        </style>
    </head>
    <body>
        <br/><br/>
      
        <form>
            <input type = "text" name ="keyword" placeholder="Type Keyword"/>
            <input type = "submit" value="Go!"/>
        </form>
        
       
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>