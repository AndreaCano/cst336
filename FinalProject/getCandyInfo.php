<?php

    include '../dbConnection.php';
    $dbConn = getDatabaseConnection("candy");    
    $sql = "SELECT * FROM selection 
            WHERE candyId = :candyId";
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute(array("candyId"=>$_GET['candyId']));
    $resultSet = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($resultSet);
        
?>