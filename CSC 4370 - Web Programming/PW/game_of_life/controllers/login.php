<?php 
//includes
include '../models/passwd.php';

//passwd layout:
//id|username|password
$passwd = "../data/passwd";
$salt = "m1n1Cl0ud$"; //salt is used to add to the level of encryption

//This is used to route requests to login.php to the correct function.
//If no function found then a redirect to a function ot found page is performed
if(function_exists($_GET['func'])) {
    $_GET['func']();
} else {
    //return 404 not found;
    setcookie("error_header", "Function could not be found", 0, "/");
    setcookie("error_body", "Function " . $_GET['func'] . " not found.<br>HTTP ERROR 404", 0, "/");
    header("Location: ../views/fnf.php");
    return;
}

//Register is used to create a new user.
function register() {
    global $salt;
    global $passwd;
    
    clearCookies();
    setcookie("func", "register", 0, "/");
    
    //Check to ensure that all necessary data was passed to the function
    if(empty($_POST['newuser']) || empty($_POST['newpswd']) || empty($_POST['retype'])) {
        if(!empty($_POST['newuser'])) {
            setcookie("username", $_POST['newuser'], 0, "/");
        }
        setcookie("message", "Username/Password not provided.", 0, "/");
        setcookie("status", "failure", 0, "/");
        header("Location: ../views/homepage.php");
        return;
    }

    //check to ensure that both passwords match
    if($_POST['newpswd'] != $_POST['retype']) {
        setcookie("username", $_POST['newuser'], 0, "/");
        setcookie("message", "Passwords do not match", 0, "/");
        setcookie("status", "failure", 0, "/");
        header("Location: ../views/homepage.php");
        return;
    }

    //Check to make sure the passwd file exists.  If not it will create a new one.
    if(!file_exists($passwd)) {
        $file = fopen($passwd, "a+");
        fclose($file);
        chmod($passwd, 0777);
    }

    $username = $_POST['newuser'];

    //check to see if a user already exists.
    if(checkUser($username)) {
        setcookie("username", $_POST['newuser'], 0, "/");
        setcookie("message", "Username already exists.", 0, "/");
        setcookie("status", "failure", 0, "/");
        header("Location: ../views/homepage.php");
        return;
    } else {
        //encrypt the password
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

//function to determine if the username already exists
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

//function to get the next id number.
function getNewUserId() {
    $lastUser = getLastUser();
    return intval($lastUser[0]) + 1;
}

//function to validate that the user is able to log into the application
function login() {
    global $salt;
    clearCookies();
    setcookie("func", "login", 0, "/");

    //verifies that all necessary data was passed.
    if(empty($_POST['username']) || empty($_POST['pswd'])) {
        setcookie("status", "failure", 0, "/");
        setcookie("message", "No Login Provided.", 0, "/");
        header("Location: ../views/homepage.php");
        return;
    }

    $username = $_POST['username'];
    $password = md5(md5($_POST['pswd']) . $salt);

    //searches the user list and then checks to see if the password provided
    //matches the one on file
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

//clears all cookies
function clearCookies() {
    foreach ($_COOKIE as $key => $value) {
        setcookie($key, false, 0, "/");
    }
}

//function to log out the user and redirects back to the homepage.
function logout() {    
    clearCookies();
    header("Location: ../views/homepage.php");
}