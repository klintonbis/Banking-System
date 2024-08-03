<div class="output-box">  
   <?php
require('db.php');
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];{
    
    
    $sql = "SELECT balance FROM account WHERE user_id = '$user_id'";
    $result = $conn->query($sql);
   

    if ($result->num_rows > 0) {
        // Fetch balance from the result
        $row = $result->fetch_assoc();
        $balance = $row["balance"];
        
        echo "Your Current balance is   $user_id is: $" . $balance;
        
    } else {
        $balance = "User ID not found";
    }
}
}

// Close the database connection
$conn->close();
?>
</div>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Balance Inquiry</title>
</head>
<body>
<div id="frm">  
<h2>Balance Inquiry</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      
        <input type="submit" value="Check Balance">
    </form>
</div>
<form action="logout.php" method="post"> 

    <button type="submit" id="logout" name="Logout">Logout</button>
    </form>
</body>
</html>







    




