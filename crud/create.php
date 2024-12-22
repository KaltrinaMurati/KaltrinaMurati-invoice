<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    
    body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        form {
            background-color: #f5f5f5;
            padding: 35px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        input[type="text"],
        input[type="number"],
        input[type="submit"] {
            display: block;
            width: 95%;
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
            background-color: #eeeeee;
            color: #333;
            border: none;

        }
        input[type="submit"] {
            background-color: grey;
            border: none;
            color:white;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #b3b3b3;
        }
       
       
        
       
        </style>
</head>
<body>
<form action="create.php" method="post">
    <input type="text" name="emri" placeholder="Name..">
    <input type="text" name="mbiemri" placeholder="Surname..">
    <input type="number" name="mosha" placeholder="Number..">
    <input type="text" name="gjinia" placeholder="Gender..">
    <input type="text" name="vendbanimi" placeholder="Adress..">
    <input type="number" name="nrpersonal" placeholder="Personal Number..">
    <input type="submit" value="Submit" name="regjistrohu">


</form>
<?php
$host="localhost";
$username="root";
$password="";
$dbname="crud";
$table="tblproject";
if(isset($_POST['regjistrohu'])){
$emri=$_POST['emri'];
$mbiemri=$_POST['mbiemri'];
$mosha=$_POST['mosha'];
$gjinia=$_POST['gjinia'];
$vendbanimi=$_POST['vendbanimi'];
$nr=$_POST['nrpersonal'];
if(empty($emri)|| empty($mbiemri)||empty($mosha)||empty($gjinia)|| empty($vendbanimi)||empty($nr)){
    die("please fill all the inputs");
}
try{
$dsn="mysql:host=$host;dbname=$dbname";
$conn=new PDO($dsn,$username,$password);
$sql="INSERT INTO $table (Emri,Mbiemri,Mosha,Gjinia,Vendbanimi,Npersonal) VALUES(:emri,:mbiemri,:mosha,:gjinia,:vendbanimi,:npersonal)";
$stmt=$conn->prepare($sql);
$stmt->execute([":emri"=>$emri,":mbiemri"=>$mbiemri,":mosha"=>$mosha,":gjinia"=>$gjinia,":vendbanimi"=>$vendbanimi,":npersonal"=>$nr]);
echo "te dhenat u shtuan me sukses";
header("Location:read.php");
}
catch(PDOException $a){
    echo "error:".$a->getMessage();
}
}



?>


</body>
</html>