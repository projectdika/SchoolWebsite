const menuBtn = document.getElementById('menuBtn');
const menu = document.getElementById('menu');
const scrollUp = document.querySelector(".scroll-up");
const closeBtn = document.getElementById('closeBtn');

showMenu = () => {
    menu.style.display = 'block';
    closeBtn.style.display = 'block';
    menuBtn.style.display = 'none';
}

function closeMenu(){
    menu.style.display = 'none';
    closeBtn.style.display = 'none';
    menuBtn.style.display = 'block';
}

window.addEventListener("scroll", () => {
    if (window.scrollY > 190) {
        scrollUp.classList.add("scroll-active");
    } else {
        scrollUp.classList.remove("scroll-active");
    }

    console.log(window.scrollY);
});