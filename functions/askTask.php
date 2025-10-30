<?php

require_once "common/validateDescription.php";
require_once "common/validateTitle.php";
require_once "common/validateDate.php";
require_once "common/validateID.php";

/**
 * askTask
 *
 * Esta función solicita al usuario los datos de una nueva tarea: ID, título, descripción y fecha.
 * Valida cada campo utilizando las funciones de validación correspondientes y evita IDs duplicados.
 * 
 * El proceso se repite hasta que todos los datos ingresados sean correctos.
 * 
 * @param array $tasks  Array de tareas existente, usado para verificar IDs duplicados.
 * @return array        Retorna un array con los datos validados de la tarea:
 *                      ['id' => ..., 'title' => ..., 'description' => ..., 'date' => ...]
 */

function askTask($tasks){

    do{
        echo "\nIngrese los datos de la tarea:\n";
        $id=readline("\nId: ");

        $errorID=validateID($id);
        if($errorID){ echo $errorID . "\n"; continue; }

        $isDuplicated=false;

        foreach($tasks as $t){
            if($t->getId()==$id){
             $isDuplicated=true;
             break;
            }
        }

        if($isDuplicated){ echo "\nID duplicado, por favor, ingrese otro Id.\n"; continue;}
    
        $title=readline("\nTítulo: "); 
        $errorTitle=validateTitle($title);
        if($errorTitle){ echo $errorTitle . "\n"; continue; }

        $description= readline("\nDescripción: "); 
        $errorDescription=validateDescription($description);
        if($errorDescription){ echo $errorDescription . "\n"; continue; }
        
        $date= readline("\nFecha (YYYY-MM-DD): "); 
        $errorDate=validateDate($date);
        if($errorDate){ echo $errorDate . "\n"; continue; }
        

        break;

    }while(true);

    return ['id' => $id, 'title' => $title, 'description' => $description, 'date' => $date];
}

?>