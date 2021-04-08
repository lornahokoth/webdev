function validate() {
    id = document.getElementById("id").value
    fname = document.getElementById("fname").value
    lname = document.getElementById("lname").value
    message = "You forgot to fill in the following field(s):\n"
    valid = true

    if(id == "") {
        valid = false
        message += "ID\n"
        document.getElementById("id_error").classList.remove("hidden");
    }
    if(fname == "") {
        valid = false
        message += "FirstName\n"
        document.getElementById("fname_error").classList.remove("hidden");
    }
    if(lname == "") {
        valid = false
        message += "LastName"
        document.getElementById("lname_error").classList.remove("hidden");
    }

    if(!valid) {
        document.getElementById("display").innerHTML = "";
        alert(message);
    } else {
        document.getElementById("id_error").classList.add("hidden");
        document.getElementById("fname_error").classList.add("hidden");
        document.getElementById("lname_error").classList.add("hidden");

        element = document.getElementById("display")
        html = "<div>"
        html += "User ID: " + id
        html += "</div>"
        html += "<div>"
        html += "First Name: " + fname
        html += "</div>"
        html += "<div>"
        html += "Last Name: " + lname
        html += "</div>"
        element.innerHTML = html;
    }
    
}