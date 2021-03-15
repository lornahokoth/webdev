<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./nerdieluv.css">
    <title>NerdLuv</title>
</head>
<body>
    <?php 
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $personality = $_POST['personality'];
        $os = $_POST['OS'];
        $min = $_POST['minAge'];
        $max = $_POST['maxAge'];
        $line = $name . ',' . $gender . ',' . $age . ',' . $personality . ',' . $os . ',' . $min . ',' . $max;
        file_put_contents("singles.txt", $line, FILE_APPEND);
    ?>
    <header id="bannerarea">
        <a href="./index.php"><img src="./images/nerd-love.png" alt="nerd love logo" /></a>
        <br>
        <label>Where meek geeks meet!</label>
    </header>
    <h1>Thank you!</h1>
    <p>
        Welcome to NerdLuv, <?php echo $_POST['name']; ?>
    </p>
    <p>
        <a href="./matches.php">Now go see your matches!</a>
    </p>
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