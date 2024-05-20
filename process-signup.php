
<?php

if (empty($_POST["name"])){
    die("Name is required.");
}

if (strlen($_POST["password"]) < 10) {
    die("Password must be at least 10 characters");
}

if (! preg_match('/[a-zA-Z]/', $_POST["password"])){
    die ("Password must contain at least 1 letter");
}

if (! preg_match('/\d/', $_POST["password"])){
    die ("Password must contain at least 1 number");
}


if($_POST["password"] !== $_POST["password_conf"]){
    die("Passwords must match.");
}


$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

// insert data to database
$sql = "INSERT INTO user (name, password_hash) VALUES (?, ?)";

$stmt = $mysqli->stmt_init();

if(! $stmt->prepare($sql)){
  die("SQL error: " . $mysqli->error);  
}

$stmt->bind_param("ss", $_POST["name"], $password_hash);



try{
    $stmt->execute();
    header("Location: signup-success.php");
    exit;
}
catch(Exception $e){

    if($mysqli->errno === 1062){
        die("Name already taken.");
    }
    else{
        die($mysqli->error . " " . $mysqli->errno);
    }
    
}






print_r($_POST);
var_dump($password_hash);


