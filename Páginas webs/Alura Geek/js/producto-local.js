/*toma el bojeto "producto" del localStorage para reemplazar
en el html, y mostrar el producto que fue seleccionado*/

const productoArray = JSON.parse(localStorage.getItem("producto"));

const img = document.querySelector(".producto__imagen img");
const titulo = document.querySelector(".producto__titulo");

img.setAttribute("src", productoArray[0].imagen);
titulo.textContent = productoArray[0].titulo;