const openMenu = document.querySelector("#open-menu");
const closeMenu = document.querySelector("#close-menu");
const aside = document.querySelector("aside");

// Abre el menu desplegable cunado esta en modo mobile
openMenu.addEventListener("click", () => {
    aside.classList.add("aside-visible");
})

// Cierra el menu desplegable cunado esta en modo mobile
closeMenu.addEventListener("click", () => {
    aside.classList.remove("aside-visible");
})