

<!DOCTYPE html>
<html>
    <head>
        <title>Horror Story</title>
        <meta charset="utf-8">
        <style>
            @import url("css/style.css");
            body {
                background-image: url("img/horror.jpg");
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
        <div id = "container">
                <h2>Please Enter requested Information</h2>

        <div id="fill">
        <form action="horror.php"method="post">
        <input type="text" name="place" placeholder = "place" value="<?=$_POST['place']?>">
        <input type="text" name="pNoun" placeholder = "plural noun" value="<?=$_POST['pNoun']?>">
        <input type="text" name="verb1" placeholder = "Verb ending -ing" value="<?=$_POST['verb1']?>">
        <input type="text" name="verb2" placeholder = "Verb ending -ed" value="<?=$_POST['verb2']?>">
        <input type="text" name="name1" placeholder = "Name of Person" value="<?=$_POST['name1']?>">
        <input type="text" name="adj" placeholder = "adjective" value="<?=$_POST['adj']?>">
        <input name = "num1" type="number" placeholder = "number" value="<?=$_POST['num1']?>">
       

        <input type="submit" name = "submit" value="Submit"/>
       </div>
        </form>
        
         <br /><br />
         <div id="story">
        <?php
         function display(){
           echo  "The ".$_POST['place']." was crawling with ". $_POST['pNoun'] . ". Everyone
           was either dead or ".$_POST['verb1'].". Locked in, the survivors ".$_POST['verb2'].
           " together to get away. BUT, ". $_POST['name1']." doomed everyone with their ".$_POST['adj'].
           " idea to escape. Letting the ".$_POST['num1']." ". $_POST['pNoun']. " inside. Killing them all. The End.";
         
         }
         if(isset($_POST['submit']))
        {
            if(empty($_POST['place'])){
            
            echo "<h2 style = 'color:red'> ERROR! You must fill in all blanks</h2>";
            return;
            exit;
           }
           else if(empty($_POST['pNoun'])){
            
            echo "<h2 style = 'color:red'> ERROR! You must fill in all blanks</h2>";
            return;
            exit;
           }
           else if(empty($_POST['verb1'])){
            
            echo "<h2 style = 'color:red'> ERROR! You must fill in all blanks</h2>";
            return;
            exit;
           }
           else if(empty($_POST['verb2'])){
            
            echo "<h2 style = 'color:red'> ERROR! You must fill in all blanks</h2>";
            return;
            exit;
           }
           else if(empty($_POST['name1'])){
            
            echo "<h2 style = 'color:red'> ERROR! You must fill in all blanks</h2>";
            return;
            exit;
           }
           else if(empty($_POST['adj'])){
            
            echo "<h2 style = 'color:red'> ERROR! You must fill in all blanks</h2>";
            return;
            exit;
           }
           else if(empty($_POST['num1'])){
            
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
        
                            <br></br>
                                            <div class="radio">
        <h1>Please Rate</h1>
        <form action="horror.php" method="post">
            <td>
           <input type = "radio" id = "rateG" name = "rating" value = "good" <?= ($_GET['rating']=='good')?"checked":"" ?> >
            <label for = "rateG"></label><label for="rateG"> I'm Spooked </label>
            </div>
            </td>
            <td>
                <div class="radio">
            <input type = "radio" id = "rateB" name = "rating" value = "bad" <?= ($_GET['rating']=='bad')?"checked":"" ?> >
            <label for = "rateB"></label><label for="rateB"> LAMMMMEEEE </label>
            </div>
            </td>
            <td>
                <div class="radio">
            <input type = "radio" id = "rateE" name = "rating" value = "eh" <?= ($_GET['rating']=='eh')?"checked":"" ?> >
            <label for = "rateE"></label><label for="rateE"> Eh, relatable </label>
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