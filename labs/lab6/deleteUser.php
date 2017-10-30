<?php

 include("../../dbConnection.php");
 $conn = getDatabaseConnection();

 $sql = "DELETE FROM tc_user
        WHERE userID = " . $_GET['userId'];
        
 $stmt = $conn->prepare($sql);
 $stmt -> execute();
 
 header("Location: admin.php");
?>