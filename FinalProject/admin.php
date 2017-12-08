<?php
session_start();

if (!isset($_SESSION['username'])) { //checks whether admin has logged in
    
    header("Location: index.php");
    exit();
    
}

include '../dbConnection.php';
$conn = getDatabaseConnection("candy");


function displaySelection() {
    global $conn;
    $sql = "SELECT * FROM `selection`  
                    INNER JOIN type  
                    ON selection.type = type.typeId
                    WHERE 1
                    ORDER BY candyId";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $candies = $statement->fetchAll(PDO::FETCH_ASSOC);
    //print_r(candys);
    return $candies;
}

function typeCount(){
    global $conn;
    $sql = "SELECT typeName, COUNT(type) 
            AS Occurences 
            FROM selection 
            INNER JOIN type 
            ON selection.type = type.typeId
            GROUP BY type";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $candies = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach($candies as $candy) {

    echo "<td>".$candy['typeName'] . '</td><td>  ' . $candy['Occurences']."</td><tr>";
    echo "<br />";
                
    }
}
function priceAvg(){
    global $conn;
    $sql = "SELECT ROUND(AVG(price),2) 
            AS average 
            FROM selection WHERE 1";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $candies = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach($candies as $candy) {

    echo "Average price of Candies: $".$candy['average'];
    echo "<br />";
                
    }
}
function totalCount(){
    global $conn;
    $sql = "SELECT COUNT(candyId)
            AS total 
            FROM selection";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $candies = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach($candies as $candy) {

    echo "Total Number of Candies Available: ".$candy['total'];
    echo "<br />";
                
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin Page </title>
        <style>
         .jumbotron {
                   	background:url("candy.gif")left repeat-y,url("candy.gif") right repeat-y;
                    width:100%;height:100%;

            }
            #candies{
                text-align: center;
            }
            #addCandy{
                font-family: 'Butterfly Kids', cursive;
                font-size: 1em;
                font-weight: bold;
                display:block;
                text-align: center !important;
                color:black;
                text-decoration:none;
            }
            .col-md-6{
               border-right: 1px dashed #333; 
            }
            </style>
        <script>
             function confirmDelete(firstName) {
                
                
                return confirm("Are you sure you want to delete " + firstName +"?");
                
            }
        </script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
    <link rel="icon" href="pinkCandy.png" sizes="32x32">

    </head>
    <body>
        <div class="jumbotron text-center">
        <h1> Welcome <?=$_SESSION['adminFullName']?>! </h1>

        <h2> Captain of the Candy Ship </h2>
        <form action="logout.php">
            
            <input type="submit" style="float:right;" value="Logout" />
            
        </form>
        </div>
        <hr>
         
        <form id = "addCandy" action="addCandy.php">
            
            <input type="submit" value="Add a Candy" />
            
        </form>
        <br /><br />

<div class="modal-body row">
  <div class="col-md-6">
         <div id="candies">
        <?php
        
        $candies = displaySelection();
        
        foreach($candies as $candy) {
            
            echo $candy['candyId'] . '.  ' . $candy['name'] . ":  $" . $candy['price'];
            echo "[<a href='updateCandy.php?candyId=". $candy['candyId']. "'> Update </a> ]";
            //echo "[<a href='deleteUser.php?userId=".candy['userId']."'> Delete </a> ]";
            echo "<form action='deleteCandy.php' style='display:inline' onsubmit='return confirmDelete(\"".$candy['name']."\")'>
                     <input type='hidden' name='candyId' value='".$candy['candyId']."' />
                     <input type='submit' value='Delete'>
                  </form>
                ";
            echo "<br />";
            
        }
        
        
        ?>
       
  </div>
  </div>
  <div class="col-md-6">
    <!-- Your second column here -->
  <div id="reports">
            <h2>Reports</h2>
            
            <?php totalCount(); ?>
             <hr>
            <?php priceAvg(); ?>
             <hr>
         <table class="table table-hover">
            <thead>
        <tr>
         <th>Type</th>
         <th>Occurence</th>
        </tr>
        </thead>
        <tbody>
       <?php typeCount(); ?>
       </tbody>
       </table>
        </div>
       <hr>
        <br /><br />

        </div>
         </div>

    </body>     
</html>