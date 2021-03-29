<?php
if (isset($_POST['guess'])) {
    $data = strtoupper($_POST['guess']);
    $word = strtoupper($_COOKIE['word']);
    $wrong = $_COOKIE['wrong'];
    $repeat = false;
    if($data != '') {
        if (isset($_COOKIE['history'])) {
            $history = json_decode($_COOKIE['history'], true); //gets contents of history cookies and converts it to an array.
        } else {
            $history = array(); //if no history, creates empty array.
        }
        if (strlen($data) == 1) {
            if (!in_array($data, $history)) { // if data not found in history
                $history[] = $data; //adds the latest guess to the end of the history array.
                setcookie("history", json_encode($history)); //sets the cookie   

                $display = $_COOKIE['display'];
                $found = false;
                for ($i = 0; $i < strlen($word); $i++) {
                    if ($data == $word[$i]) {
                        $display[$i] = $data;
                        setcookie("display", $display);
                        $found = true;
                    }
                }
                if($display == $word) {
                    setcookie("time_elapsed", microtime(true) - $_COOKIE['start']);
                    //redirect to congrats page
                    header("Location: ./leaderboard-submit.php");
                    die();
                }
                if(!$found) {
                    $wrong++;
                    if($wrong > 6) {
                        header("Location:./gameover.php");
                        die();
                    }
                    setcookie("wrong", $wrong);
                }
            } else {
                $repeat = true; //repeat is to notify user "You've guessed this letter" ; not in use yet.
            }
        } else {
            if($data == $word) {
                //end timer
                setcookie("time_elapsed", microtime(true) - $_COOKIE['start']);
                //redirect to congrats page
                header("Location: ./leaderboard-submit.php");
                die();
            } else {
                $wrong++;
                if($wrong > 6) {
                    header("Location: ./gameover.php");
                    die();
                }
                setcookie("wrong", $wrong);
            }
        }
    }
} else { //runs when its a new game
    //deleting cookies
    setcookie("word", false);
    setcookie("hint", false);
    setcookie("display", false);
    setcookie("theme", false);
    setcookie("history", false);
    setcookie("wrong", false);
    setcookie("start", false);
    setcookie("time_elapsed", false);
    
    /* random word and hint generated from text file */
    $theme = $_GET['theme'];
    if($theme == "marvel") {
        $rand = '../textfile/marvel.txt';
        setcookie('difficulty', 'Beginner');
    } else if ($theme == "starwar") {
        $rand = '../textfile/star-wars.txt';
        setcookie('difficulty', 'Intermediate');
    } else if ($theme == "anime") {
        $rand = '../textfile/anime-cartoon.txt';
        setcookie('difficulty', 'Expert');
    } else if ($theme == "mashup") {
        $rand = '../textfile/mashup.txt';
        setcookie('difficulty', 'Master');
    } else {
        $rand = "../textfile/star-wars.txt";
        setcookie('difficulty', 'Beginner');
        $theme = "wrong";
        // header("Location:./play.php");
        // die();
    }
    $fop = fopen($rand, 'a+');
    $f_contents = file($rand);
    $info = $f_contents[rand(0, count($f_contents) - 1)];
    $line = explode("|", $info);
    $word = $line[0];
    $hint = $line[1];

    $pattern = '/[A-Za-z]/';
    $display = preg_replace($pattern, '_', $word);

    setcookie("word", $word);
    setcookie("hint", $hint);
    setcookie("display", $display);
    setcookie("theme", $theme);
    setcookie("wrong", 0);

    //start timer code
    setcookie("start", microtime(true));
}
if($repeat) {
    setcookie("repeat", "true");
    setcookie("lastGuess", $data);
} else {
    setcookie("repeat", false);
    setcookie("lastGuess", false);
}
header("Location:./maingame.php");
die();
