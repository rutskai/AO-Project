<?php

require_once "common/validation.php";
require_once "common/validateID.php";

/**
 * taskCompleted
 *
 * Permite marcar tareas como completadas en la lista de tareas existentes.
 *
 * Solicita al usuario el ID de la tarea a completar, valida si existe y actualiza su estado.
 * Permite marcar varias tareas de forma consecutiva antes de volver al menú principal.
 *
 * @param array $tasks  Lista de tareas existentes.
 * @return void
 */

function taskCompleted($tasks)
{

    if (Task::ifEmpty($tasks)) {
        return;
    }

    $repeatTask="";

    do {

        $found = false;

        $id = trim(readline("\nIngrese el ID de la tarea que desea completar: "));
        $errorID=validateID($id);
        if($errorID){ echo $errorID . "\n"; continue; }

        foreach ($tasks as $t) {
            if ($t->getId() == $id) {
                $t->setState(true);
                $found = true;
            }
        }

        if (!$found) {
            echo "\nNo se ha encontrado la tarea solicitada.\n";
            break;
        }

        echo "\nTarea marcada como completada!\n";

        $repeatTask = trim(strtolower(readline("\nDesea completar otra tarea? (s/n): ")));

        $repeatTask=validation($repeatTask);

        if($repeatTask=="n"){
            echo "\nVolviendo al menú...\n";
            return;
        }
        
    } while ($repeatTask == "s");
}
