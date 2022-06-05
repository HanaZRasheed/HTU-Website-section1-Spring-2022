<?php
require 'connect.php';
if(isset($_POST['update'])){
    
    $sql="Update employee set name=:name, job_title=:job,department=:department where id=:id";
    $statement=$pdo->prepare($sql);
    $name=$_POST['name'];
    $job=$_POST['job'];
    $dept=$_POST['dept'];
    $id=$_POST['id'];

    $statement->bindParam(":name",$name, PDO::PARAM_STR);
    $statement->bindParam(":department",$dept, PDO::PARAM_STR);
    $statement->bindParam(":job",$job, PDO::PARAM_STR);
    $statement->bindParam(":id",$id, PDO::PARAM_INT);
    $statement->execute();

}
echo "Employee is updated succesfully";
$sql="SELECT * FROM employee where id=:id";
$statement=$pdo->prepare($sql);
$id=$_POST['id'];
$statement->bindParam(":id",$id, PDO::PARAM_INT);
$statement->execute();


$data=$statement->fetchAll();
foreach($data as $row){
    $name=$row['name'];
    $job=$row['job_title'];
    $dept=$row['department'];
    echo $row['name'] .' '. $row['job_title']. ' '.$row['department'];
}

$pdo=null;


?>