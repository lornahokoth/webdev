<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./nerdieluv.css">
    <title>NerdLuv</title>
</head>
<body>
    <header id="bannerarea">
        <a href="./index.php"><img src="./images/nerd-love.png" alt="nerd love logo" /></a>
        <br>
        <label>Where meek geeks meet!</label>
    </header>
    <fieldset>
        <legend>
            New User Signup:
        </legend>
        <form action="./signup-submit.php" method="POST">

            <label><strong>Name:</strong></label>
            <div>
                <input type="text" name="name" size="16" />
            </div>
            <br>
            <label><strong>Gender:</strong></label>
            <div>
                <input type="radio" name="gender" id="male" value="M" />
                <label for="male"> Male </label>
                <input type="radio" name="gender" id="female" value="F" checked />
                <label for="female"> Female </label>
            </div>
            <br>
            <label><strong>Age:</strong></label>
            <div>
                <input type="text" name="age" maxlength="2" size="6" />
            </div>
            <br>
            <label><strong>Personality Type:</strong></label>
            <div>
                <input type="text" name="personality" maxlength="4" size="6" />
                <label for="personality"> (<a href="http://www.humanmetrics.com/cgi-win/JTypes2.asp">Don't know your type?</a>)</label>
            </div>
            <br>
            <label><strong>Favorite OS:</strong></label>
            <div>
                <select name="OS" id="class">
                    <option value="WS">Windows</option>
                    <option value="MS">Mac OS X</option>
                    <option value="LX">Linux</option>
                </select>
            </div>
            <br>
            <div>
                <label><strong>Seeking age:</strong></label>
                <input type="text" placeholder="min" name="minAge" maxlength="2" size="6" />
                <label for="to"> to </label>
                <input type="text" placeholder="max" name="maxAge" maxlength="2" size="6" />
            </div>
            <br>
            <div>
                <input name="form" type="submit" value="Sign Up" />
            </div>
        </form>
    </fieldset>
    <footer>
        <pre>
This page is for single nerds to meet and date each other!
Type in your personal information and wait for the nerdy luv to begin!
Thank you for using our site.
Results and page (C) Copyright NerdLuv Inc.
        </pre>
        <p>
            <a href="./index.php"><img src="./images/back.png" alt="back"/>Back to front page</a>
        </p>
    </footer>
</body>

</html>