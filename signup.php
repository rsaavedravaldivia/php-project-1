<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="https://unpkg.com/boltcss/bolt.min.css" />

  <link rel="stylesheet" href="styles.css" />
</head>

<body class="body">
  <h1>Sign up with PHP & mySQL</h1>

  <form action="process-signup.php" method="post">
    <div>
      <label for="name">Username</label>
      <input type="text" id="name" name="name" />
    </div>

    <div>
      <label for="password">Password</label>
      <input type="password" id="password" name="password" />
    </div>

    <div>
      <label for="password_conf">Repeat Password</label>
      <input type="password" id="password_conf" name="password_conf" />
    </div>
    <button>Sign up</button>
  </form>

  <div> <a href="login.php">
      <button>Log In</button>
    </a></div>


</body>

</html>