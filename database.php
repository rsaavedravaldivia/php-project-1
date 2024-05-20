
<?php


$host = "localhost";
// this is recommendable only when developing
$username = "root";
$password = "";
$dbname = "login_db";


try {
    $mysqli = new mysqli($host, $username, $password, $dbname);
    return $mysqli;
} catch(Exception $e){
    die("Connection error: " .$e->getMessage());
}

?>


