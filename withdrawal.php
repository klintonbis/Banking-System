<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve withdrawal amount from form
    $amount = $_POST["amount"];
    
    // Validate withdrawal amount (you may want to add more robust validation)
    if ($amount) {
        // Connect to your database (replace 'your_host', 'your_username', 'your_password', and 'your_database' with your actual database credentials)
        $conn = new mysqli('localhost', 'root', '', 'project333');
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Retrieve user ID from session
        $user_id = $_SESSION['user_id'];
        
        // Retrieve user balance from the database
        $balance_query = "SELECT balance FROM account WHERE user_id='$user_id'";
        $balance_result = $conn->query($balance_query);
        if ($balance_result && $balance_result->num_rows > 0) {
            $row = $balance_result->fetch_assoc();
            $current_balance = $row['balance'];
            
            // Check if withdrawal amount is greater than current balance
            if ($amount > $current_balance) {
                echo "Insufficient balance";
            } else {
                // Prepare SQL query to update user balance
                $sql = "UPDATE account SET balance = balance - $amount WHERE user_id='$user_id'";
                
                if ($conn->query($sql) === TRUE) {
                    echo "Money has been withdrawn successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        } else {
            echo "Error retrieving balance";
        }
        
        // Close connection
        $conn->close();
    } else {
        echo "Please enter withdrawal amount";
    }
}
?>
