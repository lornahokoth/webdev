<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hangman Game</title>
    <link rel="stylesheet" href="../css/format.css" />
</head>
<body class="background">
	<?php include("top.php"); ?>
	<div class="gamespace">
        <div class="gamelayout">
            <form action="cookie-submit.php" method="post">
                <fieldset>
                    <legend> Enter Username: </legend>
                    <label class="loginColumn"> Name: </label>
                    <input type="text" name="name" maxlength="16"><br><br>
                    <input type="submit" value="Start The Game">
                </fieldset>
            </form>
        </div>
    </div>
	<?php include("bottom.html"); ?>
</body>
</html>
