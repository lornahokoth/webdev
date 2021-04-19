//getCookie is a common function that can be used in any JS to get the value of
//a specific cookie
function getCookie(cookie) {
    var name = cookie + "=";
    var decodedCookie = decodeURIComponent(document.cookie.replace(/\+/g, ' '));
    var ca = decodedCookie.split(";");

    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while(c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if(c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }

    return "";
}