<?php
session_start();

if (!isset($_SESSION['username'])) { //validates that admin has indeed logged in
    
    header("Location: index.php");
    
}

 include("../dbConnection.php");
 $conn = getDatabaseConnection("candy");

function getype(){
    global $conn;        
    $sql = "SELECT typeName, typeId 
            FROM type 
            ORDER BY typeName";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll();
    
    return $records;}
    
function getFlavor(){
    global $conn;        
    $sql = "SELECT flavorName, flavorId 
            FROM flavor 
            ORDER BY flavorName";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll();
    
    return $records;
    
}


if (isset($_GET['addUserForm'])){
    //the administrator clicked on the "Add User" button
    $name = $_GET['name'];
    $description = $_GET['description'];
    $type    = $_GET['type'];
    $price = $_GET['price'];
    $rating    = $_GET['rating'];
    $flavor   = $_GET['flavor'];
   
    
    //"INSERT INTO `tc_user` (`userId`, `firstName`, `lastName`, `ty`, `pric`, `rate`, `flav`, `role`, `deptId`) VALUES (NULL, 'a', 'a', 'a', '1', 'm', '1', '1', '1');
    
    $sql = "INSERT INTO selection
            (name, description, type, price, rating, flavor)
            VALUES
            (:fName, :desc, :ty, :pric, :rate, :flav)";
    $namedParameters = array();
    $namedParameters[':fName'] =  $name;
    $namedParameters[':desc'] =  $description;
    $namedParameters[':ty'] =  $type;
    $namedParameters[':pric'] =  $price;
    $namedParameters[':rate'] = $rating;
    $namedParameters[':flav']  = $flavor;

    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    
    echo "Candy has been added successfully!";
    header('Location: admin.php');
            
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin: Adding New Candy </title>
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

    <h1> Adding New Candy </h1>

    <h2> Admin Section </h2>
    </div>
    <fieldset>
        
        <legend> Add New Candy </legend>
        
        <form>
            
            Name: <input type="text" name="name" required/> <br>
            Description: <input type="text" name="description" required/> <br>
            Price: <input type="text" name="price" required/> <br>
            rate: <select name="rating">
                        <option value=""> Select One </option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <br />
            Flavor:   <select name="flavor">
                            <option value=""> Select One </option>
                            <?php
                            
                                $departments = getFlavor();
                                foreach ($departments as $record) {
                                    echo "<option value='$record[flavorId]'>$record[flavorName]</option>";
                                }
                            
                            ?>
                            
                        </select>
            <br />
            Type: <select name="type">
                            <option value=""> Select One </option>
                            <?php
                            
                                $departments = getype();
                                foreach ($departments as $record) {
                                    echo "<option value='$record[typeId]'>$record[typeName]</option>";
                                }
                            
                            ?>
                            
                        </select>
                        <br />
                <input type="submit" name="addUserForm" value="Add Candy!"/>
        </form>
        
    </fieldset>


    </body>
</html>