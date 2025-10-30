<?php

/**
 * validation
 *
 * Valida que el usuario ingrese 's' o 'n'.
 *
 * Si el valor no es 's' o 'n', solicita al usuario que ingrese nuevamente hasta que sea válido.
 *
 * @param string $value  Valor a validar.
 * @return string        Valor validado ('s' o 'n').
 */

function validation($value){
    if($value!="n" && $value != "s"){
        $value = strtolower(readline("\nError, introduce 'n' o 's', por favor: "));
        return validation($value);
    }

    return $value;
}

?>