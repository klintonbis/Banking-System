<div class="output-box">
<?php
// Database connection
require('db.php'); 

// Get form data
if(isset($_POST['sender_id'], $_POST['receiver_id'],$_POST['amount'])){
$sender_id = $_POST['sender_id'];
$receiver_id = $_POST['receiver_id'];
$amount = $_POST['amount'];

// Check if sender and receiver exist
$sql_check_sender_receiver = "SELECT COUNT(*) AS count FROM account WHERE user_id IN ('$sender_id', '$receiver_id')";
$result = $conn->query($sql_check_sender_receiver);
$row = $result->fetch_assoc();
$count = $row['count'];

if ($count != 2) {
    echo "Invalid sender or receiver user ID.";
    exit();
}

// Start transaction
$conn->begin_transaction();

// Deduct amount from sender's balance
$sql_deduct_amount = "UPDATE account SET balance = balance - $amount WHERE user_id = '$sender_id'";
if ($conn->query($sql_deduct_amount) !== TRUE) {
    echo "Error updating sender's balance: " . $conn->error;
    $conn->rollback();
    exit();
}

// Add amount to receiver's balance
$sql_add_amount = "UPDATE account SET balance = balance + $amount WHERE user_id = '$receiver_id'";
if ($conn->query($sql_add_amount) !== TRUE) {
    echo "Error updating receiver's balance: " . $conn->error;
    $conn->rollback();
    exit();
}

// Commit transaction
$conn->commit();

echo "<h3>Transaction has been done successful.</h3>";

// Close connection
$conn->close();
}
?>
</div>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"> 
    <title>Money Transaction</title>
</head>
<body>
    <div id="frm">
    <h2>Money Transaction</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="sender_id">Sender User ID:</label>
        <input type="text" id="sender_id" name="sender_id"><br><br>
        
        <label for="receiver_id">Receiver User ID:</label>
        <input type="text" id="receiver_id" name="receiver_id"><br><br>
        
        <label for="amount">Amount:</label>
        <input type="text" id="amount" name="amount"><br><br>
        
        <input type="submit" id="btn1" value="Submit">
    </form>
    </div>
</body>
</html>