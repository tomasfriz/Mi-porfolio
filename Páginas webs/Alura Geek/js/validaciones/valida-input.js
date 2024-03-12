import { validarInput } from "./validaciones.js";

/*capturo todos los input*/
const inputs = document.querySelectorAll(".input");


/*recorro los input, agrego escuchador para cuando se
deselecciona ese input, y mando a validar*/
inputs.forEach((input) => {
    input.addEventListener("blur", () => {
        validarInput(input);
    });
});

