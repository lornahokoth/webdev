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
    <div id="loginDisplay">
      <div class="form-box login-box">
        <form action="../controllers/login.php?func=login" method="POST">
          <h1 class="heading homepageH colorFontHomepage"> Log In </h1>
          <div class="loginRow">
            <div class="buffCol">
              <img src="../asset/outline_person_black_24dp.png" alt="user icon"/>
            </div>
            <div class="loginCol">
              <input type="text" id="username" name="username" maxlength="16" placeholder="Username" />
            </div>
            <div class="buffCol"></div>
          </div>
          <div class="loginRow">
            <div class="buffCol">
              <img src="../asset/outline_lock_black_24dp.png" alt="user icon"/>
            </div>
            <div class="loginCol">
              <input type="password" id="pswd" name="pswd" placeholder="Password" />
            </div>
            <div class="buffCol"></div>
          </div>
          <label id="loginMessage" name="loginMessage"></label>
          <button class="bgColorHomepage"> LOG IN </button>
        </form>
      </div>
      <div class="form-box signUp-box">
        <form action="../controllers/login.php?func=register" method="POST">
          <h1 class="heading homepageH"> Sign Up</h1>
          <input type="text" id="newuser" name="newuser" maxlength="16" placeholder="New Username" />
          <input type="password" id="newpswd" name="newpswd" placeholder="New Password" />
          <input type="password" id="retype" name="retype" placeholder="Confirm Password" />
          <label id="registerMessage" name="registerMessage"></label>
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
    <div id="welcome">
      <h1 id="user"></h1>
    </div>
    <div id="playDisplay" class="hidden">
      <div class="row">
        <div class="buffcol"></div>
        <div class="col">
          <a href="./gameplay.php"><button id="play" class="homepageButton"> PLAY </button></a>
        </div>
        <div class="col">
          <button id="rules" class="homepageButton"> RULES </button>
        </div>
        <div class="buffcol"></div>
      </div>
      <div class="row">
        <div class="buffcol"></div>
        <div class="col">
          <button id="credits" class="homepageButton"> CREDITS </button>
        </div>
        <div class="col">
          <a href="../controllers/login.php?func=logout"><button id="logout" class="homepageButton"> LOG OUT </button></a>
        </div>
        <div class="buffcol"></div>
      </div>


    </div>
  </div>
  <script src="../js/homepage.js"> </script>
  <script src="../js/common.js"> </script>
</body>

</html>