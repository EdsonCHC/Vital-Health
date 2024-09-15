const menuLinks = document.querySelectorAll(".nav-link");
const menuLinks2 = document.querySelectorAll(".nav-link-2");
const contents = document.querySelectorAll(".content");

menuLinks.forEach((link) => {
    link.addEventListener("click", () => {
        menuLinks.forEach((link) => link.classList.remove("active"));
        link.classList.add("active");

        contents.forEach((content) => content.classList.add("hidden"));
        const target = document.querySelector(`#${link.dataset.target}`);
        if (target) {
            target.classList.remove("hidden");
        }
    });
});

menuLinks2.forEach((link) => {
    link.addEventListener("click", () => {
        menuLinks.forEach((link) => link.classList.remove("active"));
        link.classList.add("active");

        contents.forEach((content) => content.classList.add("hidden"));
        const target = document.querySelector(`#${link.dataset.target}`);
        if (target) {
            target.classList.remove("hidden");
        }
    });
});

document
    .getElementById("mobile-menu-button")
    .addEventListener("click", function () {
        const mobileMenu = document.getElementById("mobile-menu");
        mobileMenu.classList.toggle("hidden");
    });
