function addActive() {
    var element = document.getElementsByClassName("nav-link");
    for (var i = 0; i < element.length; i++) {
        element[i].addEventListener("click", function () {
            var current = document.getElementsByClassName("active");
            if (current.length > 0) {
                current[0].className = current[0].className.replace(" active", "");
            }
            this.className += " active";
        });
    }
}