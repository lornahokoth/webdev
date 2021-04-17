<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/lifestylesheet.css" />
    <script src="../js/login.js"></script>
    <script src="../js/common.js"></script>
    <title>Login</title>
  </head>
  <body onload="populateLogin()">
    <h1>Login/Sign Up</h1>
    <label id="message" name="message"></label>
    <form action="../controllers/login.php?func=login" method="post">
      <fieldset>
        <legend>Login</legend>
        <input type="text" id="username" name="username" maxlength="16" placeholder="Username"/><br /><br />
        <input type="password" id="pswd" name="pswd" placeholder="Password"/><br /><br />
        <input type="submit" value="Login" />
      </fieldset>
    </form> 
    <form action="../controllers/login.php?func=register" method="post">
        <fieldset>
        <legend>Sign Up</legend>
        <input type="text" id="newuser" name="newuser" maxlength="16" placeholder="New Username"/><br /><br />
        <input type="password" id="newpswd" name="newpswd" placeholder="New Password" /><br /><br />
        <input type="password" id="retype" name="retype" placeholder="Confirm Password"/><br /><br />
        <input type="submit" value="Register" />
        </fieldset>
  </body>
</html>
