<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"> 
 <meta name="viewport" content="width=device-width, initial-scale=1.0">  <title>Details Page</title> 
 <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div id="frm">
<h2>Welcome to Your Account</h2>
<p>Welcome, <?php session_start(); echo $_SESSION['user_id']; ?></p>

    <div id="frm1">
        <form action="withdrawal.html" method="POST">
    <button type="submit" name="withdrawal">Withdraw Money</button>
   </form>
   </div>
    <div id="frm1">
        <form action="deposit.html" method="POST">
    <button type="submit" name="deposit">Deposit Money</button><br>
    </form>
</div>
    <div id="frm1">
        <form action="cpprocess.php" method="POST">
    <button type="submit" name="change_password">Change Password</button><br>
    </form>
    </div>
    <div id="frm1">
        <form action="balanceinquary.php" method="POST">
    <button type="submit" name="balance_inquiry">Balance Inquiry</button>
    </form>
    </div>

    <div id="frm1">
        <form action="tranaction.php" method="POST">
    <button type="submit" name="tranaction">Maney Transaction</button>
    </form>
    </div>

</div>
<form action="logout.php" method="post"> 

    <button type="submit" id="logout" name="Logout">Logout</button>
    </form>
</body>
</html>
