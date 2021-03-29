<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hangman Game</title>
    <link rel="stylesheet" href="../css/format.css" />
    <link rel="icon" href="../assets/Logo.png" type="image/x-icon" />
</head>

<body class="background">
    <?php include("top.php"); ?>

    <div class="gamespace">
        <div class="pdisplay">
            <div class="playlevels">
                <p>You lost! Sorry, bud. Maybe next time.</p>
            </div>

            <div class="gameplay-sel">
                <a href="./play.php"><button class="button level btn"> Play Again </button></a>
                <a href="./leaderboard.php"><button class="button level btn"> Leaderboard </button></a>
            </div>
        </div>
    </div>
    <?php include("bottom.html"); ?>
</body>

</html>