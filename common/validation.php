<?php

function validation($value){
    if($value!="n" && $value != "s"){
        $value = strtolower(readline("\nError, introduce 'n' o 's', por favor: "));
        return validation($value);
    }

    return $value;
}





?>