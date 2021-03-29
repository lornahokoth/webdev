<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hangman Game</title>
    <link rel="stylesheet" href="../css/format.css" />
    <link rel="icon" href="../assets/Logo.png" type="image/x-icon" />
</head>
<body class = "background">
    <?php include("top.php"); ?>
    <div class="gamespace">
        <div class="pdisplay">
            <div class="playlevels">
                <p>Choose your level...</p>
            </div>
            <div class="gameplay-sel">
                <a href="./maingame-submit.php?theme=marvel" class="button level btn"> Beginner </a><!-- marvel theme -->
                <a href="./maingame-submit.php?theme=starwar" class="button level btn"> Intermediate </a><!-- star wars theme -->
                <a href="./maingame-submit.php?theme=anime" class="button level btn"> Expert </a><!-- anime/cartoon theme-->
                <a href="./maingame-submit.php?theme=mashup" class="button level btn"> Master </a><!-- mashup -->
            </div>
        </div>
    </div>
    <?php include("bottom.html"); ?>
</body>
</html>