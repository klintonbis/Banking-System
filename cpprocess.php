<div class="output-box">
<?php 
require('db.php'); 
 if(isset($_POST['user_id'], $_POST['new_password'])){ 
 $user_id = $_POST['user_id']; 
 
 $new_password = $_POST['new_password'];

 // Perform the deletion query 
 

 // Hash the new password
 $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);

 // Update the password in the database
 $check_user_sql = "SELECT * FROM logininfo WHERE user_id='$user_id'";
 $result = $conn->query($check_user_sql);

 if ($result->num_rows > 0) {
     // Update the password in the database
     $update_sql = "UPDATE logininfo SET password='$hashed_new_password' WHERE user_id='$user_id'";

     if ($conn->query($update_sql) === TRUE) {
         echo "Password updated successfully";
     } else {
         echo "Error updating password: " . $conn->error;
     }
 } else {
     echo "No matching user found";
 }

 $conn->close();

}

?>
</div>

<!DOCTYPE html> 
<html lang="en"> 
<head> 
 <meta charset="UTF-8"> 
 <title>Changing Process</title> 
 <link rel="stylesheet" type="text/css" href="style.css"> </head> 
<body> 
  <div id="frm">
 
 <div class="remove-form"> 
 <h2>Changing Password</h2> 
 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <p>
  <label for="user_id">Enter ID :</label>  
  <input type="number" id="user_id" name="user_id" required><br>
    
   </p>
   <p>
   <label for="new_password">New Password:</label>
    <input type="password" id="new_password" name="new_password" required><br>
    </p>
    <p>
      <button type="submit" id="btn1" name="change-password">Submit</button>  </p>
    </p>
 </form> 
</div> 
<form action="logout.php" method="post"> 

  <button type="submit" id="logout" name="Logout">Logout</button>
  </form>
</body> 
</html> 

