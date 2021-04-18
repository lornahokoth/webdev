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
    if(username  == "") {
        return
    }
    if(func == "register" && status == "failure") {
        document.getElementById("newuser").value = username;
    } else {
        document.getElementById("username").value = username;
    }
    document.getElementById("message").innerHTML = message;
    if(status == "failure") {
        document.getElementById("message").classList.add("failure");
    } else {
        document.getElementBvyId("message").classList.remove("failure");
    }
}
