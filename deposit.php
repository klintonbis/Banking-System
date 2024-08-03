<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['amount'])) {
    // Retrieve withdrawal amount from form
    $amount = $_POST["amount"];

    // Validate withdrawal amount (you may want to add more robust validation)
    if (!empty($amount) && is_numeric($amount) && $amount > 0) {
        // Connect to your database (replace 'your_host', 'your_username', 'your_password', and 'your_database' with your actual database credentials)
        $conn = new mysqli('localhost', 'root', '', 'project333');

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve user ID from session
        $user_id = $_SESSION['user_id'];
    
        // Prepare SQL query to update user balance
        $user_update_query = "UPDATE account SET balance = balance + $amount WHERE user_id='$user_id'";

        if ($conn->query($user_update_query) === TRUE) {
            // Get current user balance
            $user_balance_query = "SELECT balance FROM account WHERE user_id='$user_id'";
            $balance_result = $conn->query($user_balance_query);
            if ($balance_result) {
                $row = $balance_result->fetch_assoc();
                $new_balance = $row['balance'];
                echo "Money deposited successfully. New balance: $new_balance";
                
            } else {
                echo "Error fetching balance: " . $conn->error;
            }
        } else {
            echo "Error updating record: " . $conn->error;
            
        }
        
        // Close connection
        $conn->close();
    } else {
        echo "Invalid amount provided";
    }
} 
    // If it's a GET request or amount is not set in POST request, redirect back to the form page
?>


