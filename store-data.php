<!DOCTYPE html> 
<html lang="en"> 
<head> 
 <meta charset="UTF-8"> 
 <meta name="viewport" content="width=device-width, initial-scale=1.0">  <title>Data entry</title> 
 <link rel="stylesheet" type="text/css" href="style.css"> 
</head> 
<body> 
 <?php 
 if(isset($_POST["submit"])) 
{ 
 require('db.php'); 
 if(isset($_POST['user_id'], $_POST['username'],$_POST['password'],$_POST['balance']))
 $user_id = $_POST["user_id"]; 
 $username = $_POST["username"];
 $password =$_POST["password"];
 $balance =$_POST["balance"]; 
 // Insert data into the database 
 $sql_logininfo = "INSERT INTO logininfo (user_id, username, password) VALUES ('$user_id', '$username', '$password')";
if ($conn->query($sql_logininfo) === TRUE) {
    echo "New record created successfully in logininfo table.<br>";
} else {
    echo "Error: " . $sql_logininfo . "<br>" . $conn->error;
}

// Insert into account table
$sql_account = "INSERT INTO account (user_id, username, balance) VALUES ('$user_id', '$username', '$balance')";
if ($conn->query($sql_account) === TRUE) {
    echo "New record created successfully in account table.";
}
else {
    echo "Error: " . $sql_account . "<br>" . $conn->error;
}


   echo '<div style="text-align: center; margin-top: 20px;">'; 
   echo '<a href="view.php" class="view-button">View Data</a>'; 
   echo '</div>'; 
   } 
// Close the database connection 
mysqli_close($conn); 

?> 
</body> 
</html> 
