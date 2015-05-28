<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="css/bootstrap-theme.css">
        <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
        <link type="text/css" rel="stylesheet" href="css/custom-style.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<?php
    require_once(__DIR__ . "/../model/config.php");
    require_once (__DIR__ . "/../view/header.php");
    
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
    
    $query = $_SESSION["connection"]->query("SELECT salt, password FROM users WHERE username = '$username'");
    
    if($query->num_rows == 1){
       $row = $query->fetch_array();
       
       if($row["password"] === crypt($password, $row["salt"])){
           $_SESSION["authenticated"] = true;
           // If the correct password is inputted, then a message will be echoed ehich will say "Login successful"
           echo "<p> Login Successful! </p>";
       }
       else{
           // If not, then another message will be echoed which will say the following. And it says "usernamecand password" so that it wont hint at if the user is a hacker.
           echo "<p> Invalid username and password. </p>";
       }
    }
    else {
        echo "<p> Invalid username and password. </p>";
    }
    
       ?>
<html>
    <body class="loginbody">
        
    </body>
    

