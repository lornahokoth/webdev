<?php
if (!empty($_COOKIE['name'])) {
    $fileName = "";
    if($_COOKIE['difficulty'] == 'Beginner') {
        $fileName = "../textfile/leaderboard-beginner.txt";
    } else if($_COOKIE['difficulty'] == 'Intermediate') {
        $fileName = "../textfile/leaderboard-intermediate.txt";
    } else if($_COOKIE['difficulty'] == 'Expert') {
        $fileName = "../textfile/leaderboard-expert.txt";
    } else if($_COOKIE['difficulty'] == 'Master') {
        $fileName = "../textfile/leaderboard-master.txt";
    }
    if(file_exists($fileName)) {
        chmod($fileName, 0777);
    } else {
        $file = fopen($fileName, "w");
        fclose($file);
        chmod($fileName, 0777);
    }
    $line = $_COOKIE['name'] . "|" . $_COOKIE['time_elapsed'] . PHP_EOL;
    file_put_contents($fileName, $line, FILE_APPEND);
    shell_exec("sort -t'|' -nk2 $fileName | head -10 > ../textfile/test.out");
    shell_exec("mv ../textfile/test.out $fileName");
    chmod($fileName, 0777);
}

header("Location:./congrats.php");
die();
