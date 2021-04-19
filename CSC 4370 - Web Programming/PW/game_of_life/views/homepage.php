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
    <div class="lableSpace" id="loginDisplay">
      <div class="form-box login-box">
        <form action="../controllers/login.php?func=login" method="POST">
          <h1 class="heading homepageH colorFontHomepage"> Log In </h1>
          <div class="loginRow">
            <div class="buffCol">
              <img src="../images/outline_person_black_24dp.png" alt="user icon" />
            </div>
            <div class="loginCol">
              <input type="text" id="username" name="username" maxlength="16" placeholder="Username" />
            </div>
            <div class="buffCol"></div>
          </div>
          <div class="loginRow">
            <div class="buffCol">
              <img src="../images/outline_lock_black_24dp.png" alt="user icon" />
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
          <div class="loginRow">
            <div class="buffCol">
              <img src="../images/outline_person_black_24dp.png" alt="user icon" />
            </div>
            <div class="loginCol">
              <input type="text" id="newuser" name="newuser" maxlength="16" placeholder="New Username" />
            </div>
            <div class="buffCol"></div>
          </div>
          <div class="loginRow">
            <div class="buffCol">
              <img src="../images/outline_lock_black_24dp.png" alt="user icon" />
            </div>
            <div class="loginCol">
              <input type="password" id="newpswd" name="newpswd" placeholder="New Password" />
            </div>
            <div class="buffCol"></div>
          </div>
          <div class="loginRow">
            <div class="buffCol">
              <img src="../images/outline_lock_black_24dp.png" alt="user icon" />
            </div>
            <div class="loginCol">
              <input type="password" id="retype" name="retype" placeholder="Confirm Password" />
            </div>
            <div class="buffCol"></div>
          </div>
          <label id="registerMessage" name="registerMessage"></label>
          <button> SIGN UP </button>
        </form>
      </div>
      <div class="overlay-box">
        <div class="overlay">
          <div class="panel overlayLeft">
            <h1 class="heading homepageH"> Hello and Welcome!</h1>
            <p class="homepageP">Please enter your information. </p>
            <span class="homepageSpan"> OR</span>
            <button class="ghost" id="signIn"> SIGN IN </button>
          </div>
          <div class="panel overlayRight">
            <h1 class="heading homepageH">Welcome Back!</h1>
            <p class="homepageP"> Please Login with your information.</p>
            <span class="homepageSpan"> OR</span>
            <button class="ghost" id="signUp"> SIGN UP </button>
          </div>
        </div>
      </div>
    </div>
    <div id="playDisplay" class="hidden">
      <div id="welcome">
        <div>
          <img id="imageIcon" src="../images/gol.png" alt="gol icon">
        </div>
        <h1 id="user"></h1>
      </div>
      <div class="buttons">
        <div class="row">
          <div class="buffcol"></div>
          <div class="col">
            <a href="./gameplay.php">
              <button id="play" class="homepageButton buttonanimated"> PLAY </button>
            </a>
          </div>
          <div class="col">
            <a href="#popup">
              <button id="rules" class="homepageButton buttonanimated"> RULES </button>
            </a>
          </div>
          <div class="buffcol"></div>
        </div>
        <div class="row">
          <div class="buffcol"></div>
          <div class="col">
            <a href="#popup2">
              <button id="credits" class="homepageButton buttonanimated"> CREDITS </button>
            </a>
          </div>
          <div class="col">
            <a href="../controllers/login.php?func=logout">
              <button id="logout" class="homepageButton buttonanimated"> LOG OUT </button>
            </a>
          </div>
          <div class="buffcol"></div>
          <div id="popup" class="overlayRules">
            <div class="popup">
              <h2> How To Play</h2>
              <a class="close" href="#">&times;</a>
              <div class="content">
                <ul>
                  <li>
                    Any live cell with fewer than two live neighbors dies, which is caused by under population.
                  </li>
                  <li>
                    Any live cell with more than three live neighbors dies, as if by overcrowding.
                  </li>
                  <li>
                    Any live cell with two or three live neighbors’ lives on to the next generation.
                  </li>
                  <li>
                    Any dead cell with exactly three live neighbors becomes a live cell.
                  </li>
                  <li>
                    If a dead cell has exactly three live neighbors, it comes to
                  </li>
                  <li>
                    If a live cell has less than two live neighbors, it dies
                  </li>
                  <li>
                    If a live cell has more than three live neighbors, it dies
                  </li>
                  <li>
                    If a live cell has two or three live neighbors, it continues living. life - Therefore by repeating the
                    cycle over and over, these simple rules create interesting, often unpredictable patterns.
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div id="popup2" class="overlayRules">
            <div class="popup">
              <h2>Project Leader</h2>
              <a class="close" href="#">&times;</a>
              <div class="content">
                <h3> Lornah Okoth </h3>
                <ul>
                  <li> Front-end development </li>
                  <li> Back-end development </li>
                  <li> UI/UX </li>
                  <li> Animations </li>
                </ul>
                <p>
                  Credits to <a href="https://www.youtube.com/c/FlorinPop/featured">Florin Pop</a> on Login/Sign Up page. Used his work as reference for sliding animations.

                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../js/homepage.js"> </script>
  <script src="../js/common.js"> </script>
</body>

</html>