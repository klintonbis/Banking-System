<?php 
require('db.php'); 
$query = "SELECT * FROM logininfo"; 
$result = mysqli_query($conn, $query); 
?> 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">  <title>View  Data</title> 
 <link rel="stylesheet" type="text/css" href="style.css"> 
 <script>
        function redirectToLoginPage() {
            var search = document.querySelector('input[name="search"]:checked').value;
            if (search === 'search') {
                window.location.href = 'search.php'; // Redirect to user login page
            } else if (search === 'remove') {
                window.location.href = 'removedata.php'; // Redirect to administrator login page
            }
        }
    </script>
</head> 
<body> 
 <div class="data-list"> 
 <h2>Consumer Data List</h2> 
 <table> 
 <tr> 
 <th>user_id</th> 
 <th>username</th> 
 <th>password</th> 
 
 
 </tr> 
<?php 
 if($result) { 
 while ($row = mysqli_fetch_assoc($result)) { 
 echo "<tr>"; 
 echo "<td>" . $row['user_id'] . "</td>"; 
 echo "<td>" . $row['username'] . "</td>"; 
 echo "<td>" . $row['password'] . "</td>"; 
  
 }
 
} 
else { 
 echo "Query failed: " . mysqli_error($conn); 
} 
mysqli_close($conn); 
?> 
</div> 
<div class="container">
<h2 style="color: red ; font-size: 18px;">Do you want to remove or record from the list?</h3>
<input type="radio" id="search" name="search" value="search">
        <label for="search">Search</label><br>
        <input type="radio" id="remove" name="search" value="remove">
        <label for="remove">Remove</label><br>

        <button type="button" id="btn1" onclick="redirectToLoginPage()">Enter</button>
</div>
    </body> 
</html> 
