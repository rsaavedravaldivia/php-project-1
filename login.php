<?php

$is_invalid = false;

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $mysqli = require __DIR__ . "/database.php";

    $sql = sprintf("SELECT * FROM user WHERE name = '%s'", $mysqli->real_escape_string($_POST["name"])); // avoid injection attack

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if($user){
       if(password_verify($_POST["password"], $user["password_hash"])){

        session_start();

        session_regenerate_id();

        $_SESSION["user_id"] = $user["id"];

        header("Location: index.php");

        exit;
        
        
       }
    }

    
    $is_invalid = true;
    
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/boltcss/bolt.min.css" />

    <link rel="stylesheet" href="styles.css" />

    
    <title>Login</title>
</head>
<body class="body">
    <h1>Login with PHP & mySQL</h1>

    


<form method="post" class="form">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?= htmlspecialchars($_POST["name"] ?? "") ?>">

        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <div><button>Log In</button></div>

    </form>

        <a class="signupbutton"href="signup.php">
        <button>Sign Up</button>
        </a>

    
    

     <?php if ($is_invalid): ?>
        <em>Invalid login</em> 
    <?php endif; ?>


    
    

   
    
</body>
</html>