function populateLogin() {
    var username = getCookie("username")
    var message = getCookie("message")
    var status = getCookie("status")
    var func = getCookie("func")
    if(username  == "") {
        return
    }
    if(func == "register" && status == "failure") {
        document.getElementById("newuser").value = username
    } else {
        document.getElementById("username").value = username
    }
    document.getElementById("message").innerHTML = message
    if(status == "failure") {
        document.getElementById("message").classList.add("failure")
    } else {
        document.getElementBvyId("message").classList.remove("failure")
    }
}