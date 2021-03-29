<?php
if (!empty($_COOKIE['name'])) {
    $fileName = "";
    if ($_COOKIE['difficulty'] == 'Beginner') {
        $fileName = "../textfile/b-leaderboard.txt";
    } else if ($_COOKIE['difficulty'] == 'Intermediate') {
        $fileName = "../textfile/i-leaderboard.txt";
    } else if ($_COOKIE['difficulty'] == 'Expert') {
        $fileName = "../textfile/e-leaderboard.txt";
    } else if ($_COOKIE['difficulty'] == 'Master') {
        $fileName = "../textfile/m-leaderboard.txt";
    }
    if (file_exists($fileName)) {
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
