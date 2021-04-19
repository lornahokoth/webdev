const signUpButton = document.getElementById("signUp");
const loginButton = document.getElementById("signIn");
const box = document.getElementById('box');

//adding onclick events to signUp and login buttons to perform animations
signUpButton.addEventListener('click', () => {
    box.classList.add("right-panel-active");
});

loginButton.addEventListener('click', () => {
    box.classList.remove("right-panel-active");
});

//Function run to load username and messages if needed
function populateLogin() {
    var username = getCookie("username");
    var message = getCookie("message");
    var status = getCookie("status");
    var func = getCookie("func");
   
    if(func == "") {
        return;
    }

    if(username != "" && func == "login" && status == "success") {
        document.getElementById("loginDisplay").classList.add("hidden");
        document.getElementById("playDisplay").classList.remove("hidden");
        document.getElementById("user").innerHTML = "Welcome, &nbsp;" + username.toUpperCase();
    } else {
        document.getElementById("loginDisplay").classList.remove("hidden");
        document.getElementById("playDisplay").classList.add("hidden");
        if((func == "login" && status == "failure") || (func == "register" && status == "success")) {
            labelId = "loginMessage";
            userId = "username";
        } else {
            labelId = "registerMessage";
            userId = "newuser";
            box.classList.add("right-panel-active");
        }

        document.getElementById(labelId).innerHTML = message;
        document.getElementById(userId).value = username;
    }
}

