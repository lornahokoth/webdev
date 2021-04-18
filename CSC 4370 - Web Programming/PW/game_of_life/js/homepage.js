const signUpButton = document.getElementById("signUp");
const loginButton = document.getElementById("signIn");
const box = document.getElementById('box');

signUpButton.addEventListener('click', () => {
    box.classList.add("right-panel-active");
});

loginButton.addEventListener('click', () => {
    box.classList.remove("right-panel-active");
});

function populateLogin() {
    var username = getCookie("username");
    var message = getCookie("message");
    var status = getCookie("status");
    var func = getCookie("func");
   
    if(username == "") {
        return;
    }

    if(username != "" && func == "login" && status == "success") {
        document.getElementById("loginDisplay").classList.add("hidden");
        document.getElementById("playDisplay").classList.remove("hidden");
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
        if(status == "failure") {
            document.getElementById(labelId).classList.add("failure");
        } else {
            document.getElementBvyId(labelId).classList.remove("failure");
        }
    }
}
