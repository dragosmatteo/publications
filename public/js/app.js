let link = document.querySelectorAll(".filter ul li");

link.forEach((item) => {
    item.addEventListener("click", () => {
        let activeClass = document.querySelector(".active");
        activeClass.className = activeClass.className.replace("active", "");
        item.className += "active";
        // localStorage.setElement("item", "active");
    });
});
