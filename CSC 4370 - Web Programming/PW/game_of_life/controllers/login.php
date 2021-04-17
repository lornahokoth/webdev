<?php 
//includes
include '../models/passwd.php';

//passwd layout:
//id|username|password
$passwd = "../data/passwd";
$salt = "m1n1Cl0ud$";

if(function_exists($_GET['func'])) {
    $_GET['func']();
} else {
    //return 404 not found;
    header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
    return;
}

function register() {
    global $salt;
    global $passwd;

    if(!isset($_POST['username']) || !isset($_POST['password'])) {
        setcookie("error", "Username/Password not provided.");
        header("Location: ../view/login.php");
        return;
    }

    if(!file_exists($passwd)) {
        echo "File Created";
        $file = fopen($passwd, "a+");
        fclose($file);
        chmod($passwd, 0777);
    }

    $username = $_POST['username'];

    if(checkUser($username)) {
        setcookie("error", "Username already exists.");
        header("Location: ../view/login.php");
        return;
    } else {
        $password = md5(md5($_POST['password']) . $salt);
        $userID = getNewUserId();
        $newUser = $userID . "|" . $username . "|" . $password . "\n";
        addUser($newUser);

        setcookie("error", false);
        setcookie("username", $username);
        header("Location: ../view/login.php");
        return;
    }
}

function checkUser($username) {
    $users = getUserList();
    foreach($users as $user) {
        $u = explode('|', $user);
        if($u[1] == $username) {
            return true;
        }
    }

    return false;
}

function getNewUserId() {
    $lastUser = getLastUser();
    return intval($lastUser[0]) + 1;
}

function login() {
    global $salt;
    $username = $_POST['username'];
    $password = md5(md5($_POST['password']) . $salt);

    $users = getUserList();
    foreach($users as $user) {
        $u = explode('|', $user);
        if($u[1] == $username) {
            if($u[2] == $password) {
                setcookie("error", false);
                setcookie("username", $username);
                header("Location: ../view/title.php");
            } else {
                setcookie("error", "Incorrect Login/Password.");
                setcookie("username", $username);
                header("Location: ../view/login.php");
            }

            return;
        }
    }

    //redirect to login page with no user found set
    setcookie("error", "Username not found.");
    setcookie("username", $username);
    header("Location: ../view/login.php");
    return;
}

function logout() {
    foreach ($_COOKIE as $key => $value) {
        setcookie($key, false);
    }
    
    header("Location: ../view/login.php");
}