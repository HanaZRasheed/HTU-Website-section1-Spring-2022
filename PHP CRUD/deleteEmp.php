<?php
require "connect.php";
$sql="DELETE FROM employee where id=:id";
$id=$_GET['id'];
$statement=$pdo->prepare($sql);
$statement->bindParam(":id",$id, PDO::PARAM_INT);
$statement->execute();
$pdo=null;

echo "employee with id $id is deleted successfully </br>";
echo "<a href='viewAllEmployees.php'> View Employees </a>"
?>