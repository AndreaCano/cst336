<?php
include '../../../dbConnection.php';
$dbConn = getDatabaseConnection();

function userStartA(){
    global $dbConn;
    $sql = "SELECT * FROM tc_user WHERE firstName LIKE 'A%'";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

//print_r($records);
foreach($records as $record){
    echo $record['firstName']." ".$record['lastName']. " | ". $record['email']."<br/>";
}
}

function deviceRange($start, $end){
    global $dbConn;
    $sql = "SELECT * FROM tc_device WHERE price < $end && price > $start ORDER BY price ASC";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

//print_r($records);
foreach($records as $record){
    echo $record['deviceName']." | $".$record['price']. "<br/>";
}
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
    <h3> Users whose first name starts with an A:</h3>
    <?=userStartA()?>
    
    <h3> Devices between $300 and $1000</h3>
    <?=deviceRange(300,1000)?>
    
    </body>
</html>