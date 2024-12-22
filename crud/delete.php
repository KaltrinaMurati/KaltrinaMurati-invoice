<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
$host="localhost";
$username="root";
$password="";
$dbname="crud";
$table="tblproject";
if(isset($_GET['ID'])){

$id=$_GET['ID'];
try{
    $dsn="mysql:host=$host;dbname=$dbname";
    $conn=new PDO($dsn,$username,$password);
$sql="DELETE FROM $table where ID=:id";
$stmt=$conn->prepare($sql);
$stmt->execute([':id'=>$id]);
header("Location:read.php?accept");
}
catch(PDOException $a){
    echo"Error:".getMessage();
}}
?>


</body>
</html>