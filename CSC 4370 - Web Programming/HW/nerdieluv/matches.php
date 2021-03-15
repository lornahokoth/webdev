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
            Returning User:
        </legend>
        <form action="./matches-submit.php" method="GET">
            <label><strong>Name:</strong></label>
            <div>
                <input type="text" name="name" size="16" />
            </div>
            <br>
            <div>
                <input name="form" type="submit" value="View My Matches" />
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