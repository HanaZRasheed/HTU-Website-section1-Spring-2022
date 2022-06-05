<?php
 $name='';
 $job='';
 $dept='';
require "connect.php";
$sql="SELECT * FROM employee where id=:id";
$statement=$pdo->prepare($sql);
$id=$_GET['id'];
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Info</title>
</head>
<body>
<form method="post" action="editEmp.php">
        <label for="name"> Employee Name </label>
        <input type="text" name="name" value="<?php echo $name?>" required>

        <label for="job"> Job title </label>
        <input type="text" name="job" value="<?php echo $job ?>" required>

        <label for="dept"> Department </label>
        <input type="text" name="dept" value="<?php echo $dept?>" required>
        <input type="hidden" name="id" value="<?php echo $id?>">

        <input type="submit" name="update" value="edit employee">
</form>

<a href="viewAllEmployees.php"> view employees </a>
    
</body>
</html>