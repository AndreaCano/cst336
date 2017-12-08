<?php

 include("../dbConnection.php");
 $conn = getDatabaseConnection("candy");

 $sql = "DELETE FROM selection
        WHERE candyId = " . $_GET['candyId'];
        
 $stmt = $conn->prepare($sql);
 $stmt -> execute();
 
 header("Location: admin.php");
?>