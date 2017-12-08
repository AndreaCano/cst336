<?php
    session_start();

    include '../dbConnection.php';
    $conn = getDatabaseConnection("candy");
    
    function getItemInfo($gameId) {
        global $conn;
        $sql = "SELECT * 
                FROM selection
                INNER JOIN flavor ON selection.flavor = flavor.flavorId 
                INNER JOIN type ON selection.type = type.typeId
                WHERE candyId = ".$gameId;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $record;
    }
    
    if (isset($_GET['itemId'])) {
         $key=array_search($_GET['itemId'],$_SESSION['ids']);
            if($key!==false){
                 unset($_SESSION['ids'][$key]);
            }
            $_SESSION["ids"] = array_values($_SESSION["ids"]);
        
        header("Location: viewCart.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
    </body>
</html>