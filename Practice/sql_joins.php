<?php

$host = 'localhost'; //cloud9
$dbname = 'tcp';
$username = 'root';
$password = '';
//creates database connection
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

//displays related errors
$dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//RIGHT JOIN second table
//LEFT JOIN first table
function getUsersAndDepartments(){
    global $dbConn;
    $sql="SELECT firstName, lastName,deptName FROM `tc_user`
        INNER JOIN tc_department  
        ON tc_user.deptId = tc_department.departmentId
        ORDER BY `tc_user`.`lastName` ASC";
        
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($records);
    foreach($records as $record){
        echo $record['firstName']. ' '. $record['lastName']. ' '.$record['deptName']. "<br />";
    }
}
function getUsersAndTablet(){
    global $dbConn;
    $sql="SELECT firstName,lastName, deviceType FROM `tc_checkout`c
        NATURAL JOIN tc_device d
        NATURAL JOIN tc_user
        WHERE deviceType = 'Tablet'";
        
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($records);
    foreach($records as $record){
        echo $record['firstName']. ' '. $record['lastName']. ' '.$record['deviceType']. "<br />";
    }
}
?>



<!DOCTYPE html>
<html>
    <head>
        <title> SQL Joins </title>
    </head>
    <body>

        <h2> Users and their coresponding departments (order by last name) </h2>
        <?=getUsersAndDepartments()?>
        <h2> Users who checked out tablet (order by last name) </h2>
        <?=getUsersAndTablet()?>
        
    </body>
</html>