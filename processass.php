<?php 
if(isset($_POST['unique_id'], $_POST['password'])) { 
 $unique_id = $_POST['unique_id']; 
 $password = $_POST['password']; 
 $conn = mysqli_connect("localhost", "root", "", "project333");  if(!$conn) 
 { 
 die("Connection failed: " . mysqli_connect_error());  } 
 $sql = "SELECT * FROM adminstrator1 WHERE unique_id='$unique_id' AND  password='$password'"; 
 $result = mysqli_query($conn, $sql); 
 if ($result) { 
 $row = mysqli_fetch_assoc($result); 
 if ($row) { 
 // Successful login 
 header("Location: data-entry.html"); 
 exit(); 
 } else { 
 echo "Failed to login!";
 } 
 } else { 
 echo "Query failed: " . mysqli_error($conn); 
 } 
 mysqli_close($conn); 
} 
?> 