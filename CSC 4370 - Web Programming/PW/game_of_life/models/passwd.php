<?php
$passwd = '../data/passwd';

function getUserList() {
    global $passwd;

    $userList = file_get_contents($passwd);
    $users = explode(PHP_EOL, $userList);

    return $users;
}

function addUser($newUser) {
    global $passwd;
    file_put_contents($passwd, $newUser, FILE_APPEND);
}

function getLastUser() {
    global $passwd;

    $file = escapeshellarg($passwd);
    $line = `tail -n 1 $file`;
    $id = explode('|', $line);

    return $id;
}