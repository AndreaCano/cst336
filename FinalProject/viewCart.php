<?php
    session_start();
    
    include '../dbConnection.php';
    $conn = getDatabaseConnection("candy");
    
    //Display the items
    function getItem($itemId) {
        global $conn;
        $sql = "SELECT * FROM selection
                WHERE candyId = $itemId";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $candies = $statement->fetch(PDO::FETCH_ASSOC);
    
        return $candies;
    }
    
    
    function showItem($candy){
     echo"   
    ";
        
        
        echo "<td>".$candy['name'] . " </td><td>$" . $candy['price']."</td><td> ".$candy['description']."</td><td> ".$candy['rating']."/5 </td><td>";
            
            echo "<form action='remove.php' style='display:inline'>";
            echo "<input type='hidden' name='itemId' value='".$candy['candyId']."'>";
            echo "<button  class='btn btn-danger' role='button'type='submit' value='Remove from Cart'>
            Remove from Cart &nbsp<span class='glyphicon glyphicon-remove'></span></button>";
            echo "</form></td>";
            echo "</tr>";
            
    }
    
    function getCart(){
        if(isset($_SESSION['ids'])){
            foreach($_SESSION['ids'] as $record){
                $item = getItem($record);
                $total += $item['price'];
                showItem($item);
            }
        }
        echo "Cart Total: $". $total;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Cart </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel="icon" href="pinkCandy.png" sizes="32x32">

    <style>
            .jumbotron {
                   	background:url("candy.gif")left repeat-y,url("candy.gif") right repeat-y;
                    width:100%;height:100%;

            }
            h1{
                font-family: 'Butterfly Kids', cursive;
                font-size: 4em;
                font-weight: bold;
                padding-top:1em;
                text-align:center;

            }
            #back{
                 font-family: 'Butterfly Kids', cursive;
                font-size: 2em;
                font-weight: bold;
                display:block;
                text-align: center !important;
                color:black;
                text-decoration:none;
            }
           .btn{
                font-family: 'Butterfly Kids', cursive;
                font-size: 1em;
                font-weight: bold;
                display:block;
                text-align: center !important;
                color:black;
                text-decoration:none;

            }
            td{
                font-size: 1em;
            }
            h1{
                animation: rainbow 1s infinite; 

            }
            /* Standar Syntax */
@keyframes rainbow{
	20%{color: #fff18e;}
	40%{color: #ff91de;}
	60%{color: #3c6651;}
	80%{color: #89ebf4;}
	70%{color: #bdfc8f;}	
}

  
        </style>
    </head>
    <body>
        <div class= "jumbotron">
        <h1>Your Cart</h1>
        </div>
        <table class="table table-hover">
            <thead>
        <tr>
         <th>Name</th>
         <th>Price</th>
         <th>Description</th>
         <th>Rating</th>
        </tr>
        </thead>
        <tbody>
       <?php getCart(); ?>
       </tbody>
       </table>
       
        <form action="index.php">
            <div id="admin">
            <button id = "back" class= "btn" type="submit" value="back"><span class="glyphicon glyphicon-arrow-left"></span> back</button>
             <div>
           </form>
    </body>
</html>