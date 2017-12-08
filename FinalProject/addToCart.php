<?php
    session_start();

    include '../dbConnection.php';
    $conn = getDatabaseConnection("candy");
    
    function getItemInfo($candyId) {
        global $conn;
        $sql = "SELECT * 
                FROM selection
                INNER JOIN flavor ON selection.flavor = flavor.flavorId 
                INNER JOIN type ON selection.type = type.typeId
                WHERE candyId = ".$candyId;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $record;
    }
    
    if (isset($_GET['itemId'])) {
        array_push($_SESSION['ids'],$_GET['itemId']);
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
    </body>
</html>