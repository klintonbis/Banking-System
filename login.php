<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from form
    if(isset($_POST['user_id']))
    $user_id = $_POST["user_id"];
    $password = $_POST["password"];
    
    // Validate username and password (you may want to add more robust validation)
    if ($user_id && $password) {
        // Connect to your database (replace 'your_host', 'your_username', 'your_password', and 'your_database' with your actual database credentials)
        $conn = new mysqli('localhost', 'root', '', 'project333');
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Prepare SQL query to check if user exists and password matches
        $sql = "SELECT * FROM logininfo WHERE user_id='$user_id' AND password='$password'";
        $result = $conn->query($sql);
        
        // If user exists and password matches, redirect to details page
        if ($result->num_rows > 0) {
            // Start session and store user ID for later use
            session_start();
            $_SESSION['user_id'] = $user_id;
            header("Location: details.php");
        } else {
            echo "Invalid username or password";
        }
        
        // Close connection
        $conn->close();
    } else {
        echo "Please enter username and password";
    }
}
?>