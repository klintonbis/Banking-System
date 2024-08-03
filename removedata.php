<div class="output-box">
<?php 
require('db.php'); 
if (isset($_POST["remove"])) { 
    if(isset($_POST['user_id'])){   
 $user_id = $_POST['user_id']; 
 // Perform the deletion query 
 $delete_query = "DELETE FROM logininfo WHERE user_id = '$user_id'"; 
 $delete_result = mysqli_query($conn, $delete_query);
 if ($delete_result) { 
 // Check if any rows were affected 
 
 if (mysqli_affected_rows($conn) > 0) { 
    
 echo " Data removed successfully."; 
 
 } else { 
 echo "No matching ID found to remove.";  } 
 } else { 
 echo "Failed to remove data: " . mysqli_error($conn);  } 
}

}
?> 
</div>
<!DOCTYPE html> 
<html lang="en"> 
<head> 
 <meta charset="UTF-8"> 
 <title>Remove Record</title> 
 <link rel="stylesheet" type="text/css" href="style.css"> </head> 
<body> 
<div id="frm">
 <div style="text-align: center; margin-top: 20px;">  <a href="view.php" class="view-button">View Data</a>  </div>
 <div class="remove-form"> 
 <h2>Remove Record</h2> 
 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
 <label for="id">Enter ID to Remove:</label>  <input type="number" user_id="user_id" name="user_id" required>
 <button type="submit" name="remove">Remove Data</button> 
 </form> 
</div>
<form action="logout.php" method="post"> 

<button type="submit" id="logout" name="logout">Logout</button>
</form>
</body> 
</html> 
