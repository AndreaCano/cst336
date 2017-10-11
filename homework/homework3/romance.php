

<!DOCTYPE html>
<html>
    <head>
        <title>Romance Story</title>
        <meta charset="utf-8">
        <style>
            @import url("css/style.css");
            body {
                background-image: url("img/romance.jpg");
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
                <div id= "container">
                <h2>Please Enter requested Information</h2>
    <div id="fill">
        <form action="romance.php"method="post">
        <input type="text" name="name1" placeholder = "name of person" value="<?=$_POST['name1']?>">
        <input type="text" name="adj1" placeholder = "adjective" value="<?=$_POST['adj1']?>">
        <input name = "num1" type="number" placeholder = "number" value="<?=$_POST['num1']?>">
        <input type="text" name="pNoun" placeholder = "Plural Noun" value="<?=$_POST['pNoun']?>">
        <input type="text" name="name2" placeholder = "name of different person" value="<?=$_POST['name2']?>">
        <input type="text" name="sNoun" placeholder = "Singular Noun" value="<?=$_POST['sNoun']?>">
        <input type="text" name="adj2" placeholder = "adjective" value="<?=$_POST['adj2']?>">
        <input name="num2" type="number" placeholder = "number" value="<?=$_POST['num1']?>">

        <input type="submit" name = "submit" value="Submit"/>
       
        </form>
        </div>
         <br /><br />
         <div id="story">
        <?php
         function display(){
           echo  $_POST['name1']." was a ". $_POST['adj1'] . " " . $_POST['num1']." year old afraid of " . $_POST['pNoun'].".But ".
           $_POST['name2']." wasn't afraid of anything. \n Somehow this unexpected team became the greatest ".$_POST['sNoun'].
           " hunters. Creating a ". $_POST['adj2'] ." relationship for ".$_POST['num2']." years to come. The End. \n";
         
         }
         if(isset($_POST['submit']))
        {
           if(empty($_POST['name1'])){
            
            echo "<h2 style = 'color:red'> ERROR! You must fill in all blanks</h2>";
            return;
            exit;
           }
           else if(empty($_POST['adj1'])){
            
            echo "<h2 style = 'color:red'> ERROR! You must fill in all blanks</h2>";
            return;
            exit;
           }
           else if(empty($_POST['num1'])){
            
            echo "<h2 style = 'color:red'> ERROR! You must fill in all blanks</h2>";
            return;
            exit;
           }
           else if(empty($_POST['pNoun'])){
            
            echo "<h2 style = 'color:red'> ERROR! You must fill in all blanks</h2>";
            return;
            exit;
           }
           else if(empty($_POST['name2'])){
            
            echo "<h2 style = 'color:red'> ERROR! You must fill in all blanks</h2>";
            return;
            exit;
           }
           else if(empty($_POST['sNoun'])){
            
            echo "<h2 style = 'color:red'> ERROR! You must fill in all blanks</h2>";
            return;
            exit;
           }
           else if(empty($_POST['adj2'])){
            
            echo "<h2 style = 'color:red'> ERROR! You must fill in all blanks</h2>";
            return;
            exit;
           }
           else if(empty($_POST['num2'])){
            
            echo "<h2 style = 'color:red'> ERROR! You must fill in all blanks</h2>";
            return;
            exit;
           }
           else{
               display();
           }
            
        } 
        
        function poll(){
           echo "Thanks for voting";
         }
         
         if(isset($_POST['submitPoll']))
        {
            poll();
            
        } 
        ?>
        </div>
        
        <hr>
                
        <h1>Please Rate</h1>
       <form action="romance.php" method="post">
            <td>
                <div class="radio">
           <input type = "radio" id = "rateG" name = "rating" value = "good" <?= ($_GET['rating']=='good')?"checked":"" ?> >
            <label for = "rateG"></label><label for="rateG"> If only it were trueee </label>
            </div>
            </td>
            <td>
                <div class="radio">
            <input type = "radio" id = "rateB" name = "rating" value = "bad" <?= ($_GET['rating']=='bad')?"checked":"" ?> >
            <label for = "rateB"></label><label for="rateB"> 1/10, no plot </label>
            </div>
            </td>
            <td>
                <div class="radio">
            <input type = "radio" id = "rateE" name = "rating" value = "eh" <?= ($_GET['rating']=='eh')?"checked":"" ?> >
            <label for = "rateE"></label><label for="rateE"> Eh, still a better love story than Twilight </label>
                                <br></br>

            <input type="submit" name = "submitPoll" value="Submit"/>
            </div>
            </td>
            </form>
       </div>
       <footer>
            <hr>
                <img src="img/buddy_verified.png" alt="buddy">
                <br />
                CST336. 2017&copy; Cano
                <strong>Disclaimer:</strong> The information on this webpage is ficticious.<br />
                It is used for academic purposes.
        </footer>
    </body>
</html>