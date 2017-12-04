<?php
 /*
 1) There is image size validation (images should be smaller than 1MB)   (15 pts)
2) Images are properly uploaded into the "gallery" folder                          (20 pts)
3) All images are displayed as thumbnails                                                 (20 pts)
4) When clicking on a thumbnail, a bigger size image is displayed           (20 pts)
5) There are at least 10 CSS rules to improve the look and feel               (15 pts)
6) There is a clickable link to the lab                                                          (10 pts)
 
 */
 // print_r($_FILES);
 //echo "File size: " . $_FILES['myFile']['size']."<br>";
 function filterUploadedFile() {
 
  $allowedSize = 1000000;
  $filterError = "";
   
   if ($_FILES["myFile"]["size"]  > $allowedSize  ) {
        $filterError .= "File size too big. <br>";
        return $filterError;

    }else{
        move_uploaded_file($_FILES["myFile"]["tmp_name"], "gallery/" . $_FILES["myFile"]["name"] );
        return $filterError;

    }

}

    $error = filterUploadedFile();
   
 
  $files = scandir("gallery/",1);
 // print_r($files);
  for($i =0;$i <count($files)-2;$i++){
     echo "<img src='gallery/" .   $files[$i] . "' width='100' class = 'img' >";
  }
   echo "<br>".$error;
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Lab 10: Photo Gallery </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
       <style>
       html,#grey{
        background:grey;
       }
       body {
           margin:0;
           padding:0;
            background-image: url("paw.png");
           	background-repeat: repeat-y;  
           	background-repeat: repeat-x;  
            text-align: center;
       }
       h1 {
           margin:0;
       }
            
            img{
                padding-top:100px;

            }
            .img{
             margin:0 auto;
            }
         .img:active{
          padding-top:50px;
          margin:0 auto;
          opacity:1;
          text-align:center;
          transform: scale(10);
          -ms-transform:scale(10);
         }

        </style>
    </head>
    <body>

    <h2> Photo Gallery </h2>
    <form method="POST" enctype="multipart/form-data"> 
 
        <input type="file"  name="myFile" /> 
        <input type="submit" value="Upload File!" />

        

    </form>

    </body>
</html>