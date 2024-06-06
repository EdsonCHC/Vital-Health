function toggleText(event) {
    event.preventDefault();
    var text = document.getElementById("text");

    if (text.classList.contains("line-clamp-3")) {
        text.classList.remove("line-clamp-3");
    } else {
        text.classList.add("line-clamp-3");
    }
}
