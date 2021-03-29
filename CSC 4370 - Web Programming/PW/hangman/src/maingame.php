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
    <?php
    $history = json_decode($_COOKIE['history'], true);
    ?>
    <?php include("top.php"); ?>


    <!-- <div id="timer"> Timer: </div> -->

    <!-- hint pop up -->
    <div class="gamespace">
        <div class="gamelayout">
            <form action="./maingame-submit.php" method="POST">
                <div class="row">
                    <div id="letterbox">
                        <div id="availLetter"> Available Letters </div>
                        <table id="letters">
                            <tr>
                                <td class="<?php if (in_array('A', $history)) {
                                                echo 'crossout';
                                            } ?>">A</td>
                                <td class="<?php if (in_array('B', $history)) {
                                                echo 'crossout';
                                            } ?>">B</td>
                                <td class="<?php if (in_array('C', $history)) {
                                                echo 'crossout';
                                            } ?>">C</td>
                                <td class="<?php if (in_array('D', $history)) {
                                                echo 'crossout';
                                            } ?>">D</td>
                                <td class="<?php if (in_array('E', $history)) {
                                                echo 'crossout';
                                            } ?>">E</td>
                                <td class="<?php if (in_array('F', $history)) {
                                                echo 'crossout';
                                            } ?>">F</td>
                            </tr>
                            <tr>
                                <td class="<?php if (in_array('G', $history)) {
                                                echo 'crossout';
                                            } ?>">G</td>
                                <td class="<?php if (in_array('H', $history)) {
                                                echo 'crossout';
                                            } ?>">H</td>
                                <td class="<?php if (in_array('I', $history)) {
                                                echo 'crossout';
                                            } ?>">I</td>
                                <td class="<?php if (in_array('J', $history)) {
                                                echo 'crossout';
                                            } ?>">J</td>
                                <td class="<?php if (in_array('K', $history)) {
                                                echo 'crossout';
                                            } ?>">K</td>
                                <td class="<?php if (in_array('L', $history)) {
                                                echo 'crossout';
                                            } ?>">L</td>
                            </tr>
                            <tr>
                                <td class="<?php if (in_array('M', $history)) {
                                                echo 'crossout';
                                            } ?>">M</td>
                                <td class="<?php if (in_array('N', $history)) {
                                                echo 'crossout';
                                            } ?>">N</td>
                                <td class="<?php if (in_array('O', $history)) {
                                                echo 'crossout';
                                            } ?>">O</td>
                                <td class="<?php if (in_array('P', $history)) {
                                                echo 'crossout';
                                            } ?>">P</td>
                                <td class="<?php if (in_array('Q', $history)) {
                                                echo 'crossout';
                                            } ?>">Q</td>
                                <td class="<?php if (in_array('R', $history)) {
                                                echo 'crossout';
                                            } ?>">R</td>
                            </tr>
                            <tr>
                                <td class="<?php if (in_array('S', $history)) {
                                                echo 'crossout';
                                            } ?>">S</td>
                                <td class="<?php if (in_array('T', $history)) {
                                                echo 'crossout';
                                            } ?>">T</td>
                                <td class="<?php if (in_array('U', $history)) {
                                                echo 'crossout';
                                            } ?>">U</td>
                                <td class="<?php if (in_array('V', $history)) {
                                                echo 'crossout';
                                            } ?>">V</td>
                                <td class="<?php if (in_array('W', $history)) {
                                                echo 'crossout';
                                            } ?>">W</td>
                                <td class="<?php if (in_array('X', $history)) {
                                                echo 'crossout';
                                            } ?>">X</td>
                            </tr>
                            <tr>
                                <td class="crossout" colspan="2"></td>
                                <td class="<?php if (in_array('Y', $history)) {
                                                echo 'crossout';
                                            } ?>">Y</td>
                                <td class="<?php if (in_array('Z', $history)) {
                                                echo 'crossout';
                                            } ?>">Z</td>
                            </tr>

                        </table>
                    </div>

                    <div id="man">
                        <img src="<?php if ($_COOKIE['wrong'] == 0) {
                                        echo "../assets/gallow.png";
                                    } else {
                                        echo "../assets/" . $_COOKIE['theme'] . $_COOKIE['wrong'] . ".png";
                                    } ?>" alt="hangman" />
                    </div>
                </div>
                <div id="word">

                    <?php
                    $display = $_COOKIE['display'];
                    for ($i = 0; $i < strlen($display); $i++) {
                        echo "<div class='letter'>" . $display[$i] . "</div>";
                    }
                    ?>

                </div>
                <div class="error">
                    <?php
                    if ($_COOKIE['repeat'] == "true") {
                        echo "<label>" . $_COOKIE['lastGuess'] . " was already guessed!</label>";
                    }
                    ?>
                </div>
                <div class="row shiftdown">
                    <div class="empty">
                    </div>
                    <div class="empty">
                    </div>
                    <div class="textbox">
                        <input type="text" placeholder="Enter 1 Character or a Word" name="guess" size="22" autofocus />
                    </div>
                    <div class="textbox submit">
                        <input name="form" type="submit" value="Guess" />
                    </div>
                    <a class="hbutton" href="#popup">Hint</a>
                </div>
                <div id="popup" class="overlay">
                    <div class="popup">
                        <div class="alignRight">
                            <a class="close" href="#">&times;</a>
                        </div>
                        <div>
                            <p><?php echo $_COOKIE['hint']; ?> </p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php include("bottom.html"); ?>
</body>

</html>