<?php
session_start();

if (!isset($_SESSION['username'])) { //validates that admin has indeed logged in
    
    header("Location: index.php");
    
}

 include("../dbConnection.php");
 $conn = getDatabaseConnection("candy");

function getTypeInfo(){
    global $conn;         
    $sql = "SELECT typeName, typeId 
            FROM type 
            ORDER BY typeName";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll();
    
    return $records;
    
}
function getFlavorInfo(){
    global $conn;         
    $sql = "SELECT flavorName, flavorId 
            FROM flavor 
            ORDER BY flavorName";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll();
    
    return $records;
    
}

function getCandyInfo($candyId){
    global $conn;        
    $sql = "SELECT *
            FROM selection
            WHERE candyId = $candyId";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch();
    return $record;
}


if(isset($_GET['updateUserForm'])){ //admin has submit a change to user
    global $conn;        
    $sql = "UPDATE `selection`
            SET name = :name,
                description = :desc,
                type = :ty,
                price = :pric,
                rating = :rate,
                flavor = :flav
            WHERE `selection`.`candyId` = :candyId";
                
    $namedParameters = array();
    $namedParameters [":name"] = $_GET['name'];
    $namedParameters [":desc"] = $_GET['description'];
    $namedParameters [":pric"] = $_GET['price'];
    $namedParameters [":rate"] = $_GET['rating'];
    $namedParameters [":ty"] = $_GET['type'];
    $namedParameters[":flav"]  =  $_GET['flavor'];
    $namedParameters [":candyId"] = $_GET['candyId'];


    $stmt = $conn -> prepare($sql);
     $stmt->execute($namedParameters);
}


if(isset($_GET['candyId'])){
    $candyInfo = getCandyInfo($_GET['candyId']);
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Captain: Updating Candy </title>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
     <link rel="icon" href="pinkCandy.png" sizes="32x32">
 <style>
         .jumbotron {
                   	background:url("candy.gif")left repeat-y,url("candy.gif") right repeat-y;
                    width:100%;height:100%;

            }
            </style>
    </head>
    <body>
    <div class="jumbotron text-center">
    <h1> Updating Candies </h1>
    <h2> Captain's Orders </h2>
    </div>
    <fieldset>
        
        <legend> Updating Candy </legend>
        
        <form>
            <input type="hidden" name="candyId" value="<?=$candyInfo['candyId']?>" />
            Name: <input type="text" name="name" required value = "<?=$candyInfo['name']?>"/><br>
            Description: <input type="text" name="description" required value = "<?=$candyInfo['description']?>"/> <br>
            Price: <input type="text" name="price" required value = "<?=$candyInfo['price']?>"/> <br>
            Rate: <select name="rating">
                        <option value=""> Select One </option>
                        <option value="1" <?php if ('1'==$candyInfo['rating']) echo ' selected="selected"'?>>1</option>
                        <option value="2" <?php if ('2'==$candyInfo['rating']) echo ' selected="selected"'?>>2</option>
                        <option value="3" <?php if ('3'==$candyInfo['rating']) echo ' selected="selected"'?>>3</option>
                        <option value="4" <?php if ('4'==$candyInfo['rating']) echo ' selected="selected"'?>>4</option>
                        <option value="5" <?php if ('5'==$candyInfo['rating']) echo ' selected="selected"'?>>5</option>
                    </select>
                    <br />

            Type: <select name="type">
                            <option value=""> Select One </option>
                            <?php
                            
                                $departments = getTypeInfo();
                                foreach ($departments as $record) {
                                    echo "<option value='$record[typeId]' ".(($candyInfo['type'] == $record['typeId'])? "selected":"").">$record[typeName]</option>";
                                     
                                }
                            
                            ?>
                            
                        </select>
                        <br />
                Flavor: <select name="flavor">
                    <option value=""> Select One </option>
                    <?php
                    
                        $flavors = getFlavorInfo();
                        foreach ($flavors as $record) {
                            echo "<option value='$record[flavorId]' ".(($candyInfo['flavor'] == $record['flavorId'])? "selected":"").">$record[flavorName]</option>";
                             
                        }
                    
                    ?>
                    
                </select>
                <br />
                <input type="submit" name="updateUserForm" value="Update Candy!"/>
        </form>
        
    </fieldset>
 
        <form action="admin.php">
            <div id="admin">
            <button id = "back" class= "btn" type="submit" value="back"><span class="glyphicon glyphicon-arrow-left"></span> back</button>
             <div>
           </form>

    </body>
</html>