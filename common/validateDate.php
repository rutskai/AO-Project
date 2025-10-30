<?php

/**
 * validateDate
 *
 * Valida una fecha ingresada por el usuario.
 *
 * Comprueba si el valor está vacío y si cumple con el formato YYYY-MM-DD.
 * Devuelve un mensaje de error en caso de ser inválido o una cadena vacía si es válido.
 *
 * @param string $value  Fecha a validar.
 * @return string        Mensaje de error o cadena vacía si la fecha es correcta.
 */

function validateDate($value){

    if(trim($value) == ""){
        return "La fecha no puede estar vacía.";
    }
    
    $date = DateTime::createFromFormat('Y-m-d', $value);
    if(!$date || $date->format('Y-m-d') !== $value){
        return "La fecha no es válida. Usa formato YYYY-MM-DD.";
    }
    
    return "";
}

?>