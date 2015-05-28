<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="css/bootstrap-theme.css">
        <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
        <link type="text/css" rel="stylesheet" href="css/custom-style.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        
        <nav class="list-group">
                <a class href="http://localhost/NickStephanie/index.php">Home</a>
                </nav>

<?php
require_once(__DIR__ . "/../model/config.php");

$connection = new mysqli($host, $username,$password, $database );

$title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
$post = filter_input(INPUT_POST, "post", FILTER_SANITIZE_STRING);
$date = new DateTime('today');
$time = new DateTime('America/Los_Angeles');


$query = $_SESSION["connection"]->query("INSERT INTO posts SET title = '$title', post = '$post' ");



if($query){
    //After the user submits everything a message will be echoed out which will say "Successfully inserted psot: whatever they titled it."
    echo "<p>Successfully inserted post: $title </p>";
    echo "Posted on: " . $date->format("M/D/Y") . " at " . $time->format("G:i");
}
 else {
    echo "<p>" . $_SESSION["connection"]->error . "</p>";
}



