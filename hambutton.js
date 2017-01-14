function showMenu() {
    var x = document.getElementById("menu");
    if (x.className === "topmenu") {
        x.className += " short";
    } else {
        x.className = "topmenu";
    }
}