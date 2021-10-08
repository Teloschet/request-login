<?php

// connection
$host = "localhost";
$db = "database";
$username = "username";
$password = "password";

try {
    $dbh = new PDO('mysql:host=' . $host . ';dbname=' . $db . '', $username, $password);
} catch(PDOException $e) {
    print "Error: " . $e->getMessage() . "<br/>";
    die();
}

include("class.user.php");

?>
