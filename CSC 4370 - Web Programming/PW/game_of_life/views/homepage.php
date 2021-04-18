<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/stylesheet.css">
  <title> Game Of Life </title>
</head>

<body onload="populateLogin()">
  <h1 id="title"> GAME OF LIFE </h1>
  <div class="box" id="box">
    <div class="form-box login-box">
      <form action="../controllers/login.php?func=login" method="POST">
        <h1 class="heading homepageH colorFontHomepage"> Log In </h1>
        <input type="text" id="username" name="username" maxlength="16" placeholder="Username" />
        <input type="password" id="pswd" name="pswd" placeholder="Password" />
        <label id="message" name="message"></label>
        <button class="bgColorHomepage"> LOG IN </button>
      </form>
    </div>
    <div class="form-box signUp-box">
      <form action="../controllers/login.php?func=register" method="POST">
        <h1 class="heading homepageH"> Sign Up</h1>
        <input type="text" id="newuser" name="newuser" maxlength="16" placeholder="New Username" />
        <input type="password" id="newpswd" name="newpswd" placeholder="New Password" />
        <input type="password" id="retype" name="retype" placeholder="Confirm Password" />
        <label id="message2" name="message2"></label>
        <button> SIGN UP </button>
      </form>
    </div>
    <div class="overlay-box">
      <div class="overlay">
        <div class="panel overlayLeft">
          <h1 class="heading homepageH"> Hello and Welcome!</h1>
          <p class="homepageP">Please enter your details.. </p>
          <span class="homepageSpan"> OR</span>
          <button class="ghost" id="signIn"> SIGN IN </button>
        </div>
        <div class="panel overlayRight">
          <h1 class="heading homepageH">Welcome Back!</h1>
          <p class="homepageP"> Please Login with your Info, bitch...</p>
          <span class="homepageSpan"> OR</span>
          <button class="ghost" id="signUp"> SIGN UP </button>
        </div>
      </div>
    </div>
  </div>
  <script src="../js/homepage.js"> </script>
  <script src="../js/common.js"> </script>
</body>

</html>