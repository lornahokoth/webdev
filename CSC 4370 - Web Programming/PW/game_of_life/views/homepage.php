<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/stylesheet.css">
  <title>Game Of Life</title>
</head>

<body>
  <h1>GAME OF LIFE</h1>
  <div class="box">
    <div class="form-box login-box">
      <form action="../controllers/login.php?func=login" method="POST">

        <h1>Log In</h1>
        <input type="text" id="username" name="username" maxlength="16" placeholder="Username" /><br /><br />
        <input type="password" id="pswd" name="pswd" placeholder="Password" /><br /><br />
        <input type="submit" value="Log In" />

      </form>
    </div>
    <div class="form-box signUp-box">
      <form action="../controllers/login.php?func=register" method="POST">

        <h1> Sign Up</h1>
        <input type="text" id="newuser" name="newuser" maxlength="16" placeholder="New Username" /><br /><br />
        <input type="password" id="newpswd" name="newpswd" placeholder="New Password" /><br /><br />
        <input type="password" id="retype" name="retype" placeholder="Confirm Password" /><br /><br />
        <input type="submit" value="Sign Up" />

      </form>
    </div>
    <div class="overlay-box">
      
    </div>
  </div>
  <script src=""> </script>
</body>

</html>