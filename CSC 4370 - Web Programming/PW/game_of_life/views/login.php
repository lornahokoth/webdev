<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/lifestylesheet.css" />
    <title>Login</title>
  </head>
  <body>
    <h1>Login</h1>
    <form action="../controllers/login.php?func=login" method="post">
      <fieldset>
        <legend>Login</legend>
        <label for="username">Username: </label>
        <input type="text" id="username" name="username" maxlength="16"/><br /><br />
        <label for="pswd">Password: </label>
        <input type="password" id="pswd" name="pswd" /><br /><br />
        <input type="submit" value="Submit" />
      </fieldset>
    </form> 
    <form action="../controllers/login.php?func=register" method="post">
        <fieldset>
        <legend>Sign Up</legend>
        <label for="newuser"> New Username: </label>
        <input type="text" id="newuser" name="newuser" maxlength="16"/><br /><br />
        <label for="newpswd">New Password: </label>
        <input type="password" id="newpswd" name="newpswd" /><br /><br />
        <label for="retype">Confirm Password: </label>
        <input type="password" id="retype" name="retype" /><br /><br />
        <input type="submit" value="Submit" />
        </fieldset>
  </body>
</html>
