<?php
require"connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Employees</title>
</head>
<body>
    <table>
        <tr>
        <th> id </th> <th> name </th> <th> title </th> <th> department </th>
<?php
$sql="SELECT * from employee";
$statement=$pdo->prepare($sql);
$statement->execute();

// Associative array  keys and values
$data=$statement->fetchAll();
foreach($data as $row){
    echo "<tr> <td> ". $row['id']. '</td> <td> '. $row['name'] .'</td> <td>  ' .$row['job_title']. '</td> <td> '. $row['department'] .'</td>';
    echo "<td> <a href=viewEmp.php?id=".$row['id']."> edit </a> </td>";
    echo "<td> <a href=deleteEmp.php?id=".$row['id']."> delete </a> </td>";
    echo '</tr>';
}
?>
</table>

    
</body>
</html>