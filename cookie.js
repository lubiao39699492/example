function cookieSave(name, value, second, domain, path) {
    if (name) {
        if (!second) second = 7 * 24 * 60;
        if (!path) path = "/";
        var date = new Date();
        date.setTime(date.getTime() + (second * 1000));
        var expires = "; expires=" + date.toGMTString();
        if (domain) domain = "domain=" + domain + "; ";
        document.cookie = name + "=" + value + expires + "; " + domain + "path=" + path;
    }
}
function cookieGet(name) {
    var name = name + "=";
    var cookies = document.cookie.split(';');
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        while (cookie.charAt(0) == ' ') cookie = cookie.substring(1, cookie.length);
        if (cookie.indexOf(name) == 0) return cookie.substring(name.length, cookie.length);
    }
    return "";
}
