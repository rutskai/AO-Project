
<?php

/**
 * validateDescription
 *
 * Valida la descripción ingresada por el usuario.
 *
 * Comprueba si el valor no está vacío y si no es numérico.
 * Devuelve un mensaje de error si no cumple estas condiciones.
 * Devuelve una cadena vacía si la descripción es válida.
 *
 * @param string $value  Descripción a validar.
 * @return string        Mensaje de error o cadena vacía si la descripción es correcta.
 */

function validateDescription($value){
    if(trim($value) == ""){
        return "La descripción no puede estar vacía."; 
    }

    if(is_numeric($value)){
        return "\nLa descripción no puede ser numérica.";
    }

    return "";
}

?>