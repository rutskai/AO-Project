<?php

/**
 * validateID
 *
 * Valida el ID ingresado por el usuario.
 *
 * Comprueba si el valor no está vacío y si es numérico.
 * Devuelve un mensaje de error si no cumple estas condiciones.
 * Devuelve una cadena vacía si el ID es válido.
 *
 * @param mixed $value  Valor a validar como ID.
 * @return string       Mensaje de error o cadena vacía si el ID es correcto.
 */

function validateID($value){

    if ($value == "") {
        return "\nError, el ID no debe estar vacío.\n";
    }
    if (!is_numeric($value)) {
        return "\nError, el ID debe ser numérico.\n";
    }

    return "";
}
