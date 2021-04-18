<?php 
//includes
include '../models/passwd.php';

//passwd layout:
//id|username|password
$passwd = "../data/passwd";
$salt = "m1n1Cl0ud$";

//Simple code created to handle routing to the proper functions.
if(function_exists($_GET['func'])) {
    $_GET['func']();
} else {
    //return 404 not found;
    setcookie("error_header", "Function could not be found", 0, "/");
    setcookie("error_body", "Function " . $_GET['func'] . " not found.<br>HTTP ERROR 404", 0, "/");
    header("Location: ../views/fnf.php");
    return;
}

//Function that handles registering a new user.
//Input:
//   username - must be unique set of characters.
//   password - 
function register() {
    global $salt;
    global $passwd;
    
    clearCookies();
    setcookie("func", "register", 0, "/");
    if(empty($_POST['newuser']) || empty($_POST['newpswd']) || empty($_POST['retype'])) {
        if(!empty($_POST['newuser'])) {
            setcookie("username", $_POST['newuser'], 0, "/");
        }
        setcookie("message", "Username/Password not provided.", 0, "/");
        setcookie("status", "failure", 0, "/");
        header("Location: ../views/homepage.php");
        return;
    }

    if($_POST['newpswd'] != $_POST['retype']) {
        setcookie("username", $_POST['newuser'], 0, "/");
        setcookie("message", "Passwords do not match", 0, "/");
        setcookie("status", "failure", 0, "/");
        header("Location: ../views/homepage.php");
        return;
    }

    if(!file_exists($passwd)) {
        $file = fopen($passwd, "a+");
        fclose($file);
        chmod($passwd, 0777);
    }

    $username = $_POST['newuser'];

    if(checkUser($username)) {
        setcookie("username", $_POST['newuser'], 0, "/");
        setcookie("message", "Username already exists.", 0, "/");
        setcookie("status", "failure", 0, "/");
        header("Location: ../views/homepage.php");
        return;
    } else {
        $password = md5(md5($_POST['newpswd']) . $salt);
        $userID = getNewUserId();
        $newUser = $userID . "|" . $username . "|" . $password . "\n";
        addUser($newUser);

        setcookie("username", $username, 0, "/");
        setcookie("message", "Username successfully created.  Please login.", 0, "/");
        setcookie("status", "success", 0, "/");
        header("Location: ../views/homepage.php");
        return;
    }
}

function checkUser($username) {
    $users = getUserList();
    foreach($users as $user) {
        $u = explode('|', $user);
        if(strtolower($u[1]) == strtolower($username)) {
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
    clearCookies();
    setcookie("func", "login", 0, "/");

    if(empty($_POST['username']) || empty($_POST['pswd'])) {
        header("Location: ../views/homepage.php");
        return;
    }

    $username = $_POST['username'];
    $password = md5(md5($_POST['pswd']) . $salt);

    $users = getUserList();
    foreach($users as $user) {
        $u = explode('|', $user);
        if(strtolower($u[1]) == strtolower($username)) {
            if($u[2] == $password) {
                setcookie("username", $username, 0, "/");
                setcookie("status", "success", 0, "/");
                header("Location: ../views/homepage.php");
            } else {
                setcookie("message", "Incorrect Login/Password.", 0, "/");
                setcookie("username", $username, 0, "/");
                setcookie("status", "failure", 0, "/");
                header("Location: ../views/homepage.php");
            }

            return;
        }
    }

    //redirect to login page with no user found set
    setcookie("message", "Username not found.", 0, "/");
    setcookie("username", $username, 0, "/");
    setcookie("status", "failure", 0, "/");
    header("Location: ../views/homepage.php");
    return;
}

function clearCookies() {
    foreach ($_COOKIE as $key => $value) {
        setcookie($key, false, 0, "/");
    }
}

function logout() {    
    clearCookies();
    header("Location: ../views/homepage.php");
}