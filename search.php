<div class="output-box">
<?php 
require('db.php'); 
if (isset($_POST["search"])) { 
    if(isset($_POST['user_id'])){   
 $user_id = $_POST['user_id'];
 $sql = "SELECT * FROM logininfo WHERE user_id = $user_id";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {
     // Output data of each row
     while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["user_id"] . "<br>"; 
        echo "Name: " . $row["username"] . "<br>";
     }
 } else {
     echo "Doesn't exist any with this User Id";
 }
}
}
$conn->close();
?>
</div>

<!DOCTYPE html> 
<html lang="en"> 
<head> 
 <meta charset="UTF-8"> 
 <title>Search Record</title> 
 <link rel="stylesheet" type="text/css" href="style.css"> </head> 
<body> 
<div id="frm"> 
 <div style="text-align: center; margin-top: 20px;">  <a href="view.php" class="view-button">View Data</a>  </div> 
 
 <h2>Search Record</h2> 
 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
 <label for="id">Enter ID to Search:</label>  <input type="number" user_id="user_id" name="user_id" required>
 <button type="submit" name="search">Search</button> 
 </form> 
</div> 
<form action="logout.php" method="post"> 

    <button type="submit" id="logout" name="logout">Logout</button>
    </form>
</body> 
</html> 