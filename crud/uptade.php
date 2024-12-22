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
        input[name="back"]{
            background-color:green;
        }
       
    </style>
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

 $dsn="mysql:host=$host;dbname=$dbname";
    $conn=new PDO($dsn,$username,$password);
$sql="SELECT * FROM $table WHERE ID=:id";
$stmt=$conn->prepare($sql);
$stmt->execute([':id'=>$id]);
$rez=$stmt->fetch();
}
?>
<form action="" method="post">
    <input type="text" name="emri" value="<?php echo htmlspecialchars($rez['Emri']);  ?>" >
    <input type="text" name="mbiemri"  value="<?php echo htmlspecialchars($rez['Mbiemri']);  ?>">
    <input type="number" name="mosha"  value="<?php echo htmlspecialchars($rez['Mosha']); ?>">
    <input type="text" name="gjinia"  value="<?php echo htmlspecialchars($rez['Gjinia']); ?>" >
    <input type="text" name="vendbanimi"  value="<?php echo htmlspecialchars($rez['Vendbanimi']);  ?>">
    <input type="number" name="nrpersonal"  value="<?php echo htmlspecialchars($rez['Npersonal']);  ?>">
    <input type="submit" value="uptade" name="update">
    <input type="submit" value="Go back to dashboard" name="back">
</form>


<?php
if(isset($_POST['back'])){
    header("Location:read.php");

}
$host="localhost";
$username="root";
$password="";
$dbname="crud";
$table="tblproject";
if(isset($_POST['update'])){
$id=$_GET['ID'];
$emri=$_POST['emri'];
$mbiemri=$_POST['mbiemri'];
$mosha=$_POST['mosha'];
$gjinia=$_POST['gjinia'];
$vendbanimi=$_POST['vendbanimi'];
$nrpersonal=$_POST['nrpersonal'];


try{
    $dsn="mysql:host=$host;dbname=$dbname";
    $conn=new PDO($dsn,$username,$password);
    $sql="UPDATE $table SET
    Emri=:emri,
    Mbiemri=:mbiemri,
    Mosha=:mosha,
    Gjinia=:gjinia,
    Vendbanimi=:vendbanimi,
Npersonal=:nrpersonal
WHERE ID=:id";
$stmt=$conn->prepare($sql);
$stmt->execute(
    [
':emri'=>$emri,
':mbiemri'=>$mbiemri,
':mosha'=>$mosha,
':gjinia'=>$gjinia,
':vendbanimi'=>$vendbanimi,
':nrpersonal'=>$nrpersonal,
':id'=>$id




    ]
    );
    header("Location:read.php?message=Record updated successfully");
    exit;



}
catch(PDOException $a){
    echo "error:".$a.getmessage();

}
}








?>


</body>
</html>