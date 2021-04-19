<?php
$passwd = '../data/passwd';

//Function to get the list of user data from the passwd file
function getUserList() {
    global $passwd;

    $userList = file_get_contents($passwd);
    $users = explode(PHP_EOL, $userList);

    return $users;
}

//addUser writes user data to the passwd file
function addUser($newUser) {
    global $passwd;
    file_put_contents($passwd, $newUser, FILE_APPEND);
}

//Used to get the last user created.  This is to get the
//next user id number.
function getLastUser() {
    global $passwd;

    $file = escapeshellarg($passwd);
    $line = `tail -n 1 $file`;
    $id = explode('|', $line);

    return $id;
}