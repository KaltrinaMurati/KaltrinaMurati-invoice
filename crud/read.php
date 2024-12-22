<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
          .go-back-link {
            width:70px;
        padding: 12px 24px;
        font-size: 16px;
        font-weight: bold;
        color: #fff;
        background-color: #4CAF50;
        border-radius: 6px;
        text-align: center;
        text-decoration: none;
        transition: background-color 0.3s ease, transform 0.3s ease;
       margin-left:135px;
    }

    .go-back-link:hover {
        background-color: #45a049;
        transform: scale(1.05); 
    }

    .go-back-link:active {
        background-color: #3e8e41;
        transform: scale(1);
    }
      
       
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: center;
            border-left: 1px solid #ddd;
        }
button{
    width:30px;
    background-color:lightgrey;
    border:1px solid white;
    border-radius:5px;
    height: 40px;
    font-size:17px;
}
        th {

            background-color: #4CAF50;
            color: white;
        }

        td {
            background-color: #f9f9f9;
        }

        tr:hover td {
            background-color: #f1f1f1;
        }

        a {
            text-decoration: none;
            color: #fff;
            background-color: #f44336;
            padding: 6px 12px;
            margin: 4px 10px;
            border-radius: 4px;
            font-size: 14px;
        }

        a:hover {
            background-color: #e53935;
        }

        .update-link {
            background-color: #008CBA;
        }

        .update-link:hover {
            background-color: #007B8C;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }
#h1{
    color:red;
    text-align:center;
}
        .message {
            text-align: center;
            font-size: 18px;
            color: #ff6347;
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
try{
    $dsn="mysql:host=$host;dbname=$dbname";
    $conn=new PDO($dsn,$username,$password);

    $sql="SELECT * FROM $table";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $data=$stmt->fetchAll();
    if($data){
        /*
        foreach($data as $x){
echo "emri juaj eshte ".$x['Emri'].
"mbimeri juaj eshte ".$x['Mbiemri'].
"mosha juaj ".$x['Emri'].
"gjinia juaj eshte ".$x['Gjinia'].
" vendbanimi juaj eshte ".$x['Vendbanimi'].
"npersonal juaj eshte ".$x['Npersonal'];
        }*/
        
            echo "<table class='tbl1'>
            
            <tr>
            <th>Name</th> <th>Surname</th> <th>Age</th> <th>Gender</th> <th>Adress</th>  <th>Personal Number</th> <th>Quantinty</th>    <th>Update/Delete</th>
            ";
            foreach($data as $x){
echo "<tr>
<td>{$x['Emri']}   </td>
<td>{$x['Mbiemri']}</td><td>{$x['Mosha']}</td><td>{$x['Gjinia']}</td><td>{$x['Vendbanimi']}</td><td>{$x['Npersonal']}</td>
</td>
<td style='display:flex;gap:10px;' ><button onclick='increaseQuantityAndPrice(this)'>+</button><p class='value'>0</p><button onclick='decreaseQuantityAndPrice(this)'>-</button></td>
<td>
<a href='delete.php ? ID={$x['ID']}'>DELETE</a>

<a href='uptade.php ? ID={$x['ID']}'>UPTADE</a>

</td>
</tr>
";

    
            }
        
            echo"</table>";
            }
        
    else{
        echo "rekordi nuk u gjet";

    }
            }
catch(PDOException $a){
    echo "error:".$a->getMessage();
}
    ?>
<?php
if(isset($_GET['accept'])){
echo "<h2 id='h1'>rekordi u fshi me sukses</h2>";

echo "<script>
setTimeout(function(){
document.getElementById('h1').style.display='none';

},5000);

</script>";

}




?>
<script>
function increaseQuantityAndPrice(button) {
    const valueElement = button.nextElementSibling; 
    let currentQuantity = parseInt(valueElement.textContent);
    currentQuantity++;
    valueElement.textContent = currentQuantity;
   
    
      
}

function decreaseQuantityAndPrice(button) {
    const valueElement = button.previousElementSibling; 
    let currentQuantity = parseInt(valueElement.textContent);
    if (currentQuantity > 0) {
        currentQuantity--;
    }
    valueElement.textContent = currentQuantity;
}
</script>
<?php
if(isset($_GET['message'])){
$message=$_GET['message'];

echo $message;



}
?>
<a href="create.php" class="go-back-link">go back</a>
</body>
</html>