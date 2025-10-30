<?php

/**
 * validateTitle
 *
 * Valida el título ingresado por el usuario.
 *
 * Comprueba si el valor no está vacío y si no es numérico.
 * Devuelve un mensaje de error si no cumple estas condiciones.
 * Devuelve una cadena vacía si el título es válido.
 *
 * @param string $value  Valor a validar como título.
 * @return string        Mensaje de error o cadena vacía si el título es correcto.
 */

function validateTitle($value){
    if(trim($value) == ""){
        return "\nEl título no puede estar vacío.";
    }

    if(is_numeric($value)){
        return "\nEl título no puede ser numérico.";
    }
    return "";
}

?>