<?php


function checkoutHistory() {
    
    include '../../../dbConnection.php';
    $conn = getDatabaseConnection();
    
    $sql = "SELECT * 
            FROM `tc_checkout` 
            NATURAL JOIN tc_device
            NATURAL JOIN tc_user 
            WHERE deviceId = :deviceId";
    
    $namedParam = array(":deviceId"=>$_GET['deviceId']);
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParam);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
        
        echo  $record['firstName'] . " " . $record['lastName'] . "<br />";
        
    }
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Checkout History </title>
         <link href="https://fonts.googleapis.com/css?family=Press+Start+2P|Stalinist+One|Aladin" rel="stylesheet">
        <style>
            @import url("css/styles.css");
             body {
                background-image: url(<?=$backgroundImage?>);
            }
        </style>
    </head>
    <body>
        
        <h2> Checkout History </h2>


        <?=checkoutHistory()?>

    </body>
</html>