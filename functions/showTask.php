<?php

require_once "common/validation.php";

/**
 * showTask
 *
 * Permite mostrar las tareas de la lista de tareas existentes.
 *
 * Pregunta al usuario si desea listar todas las tareas o solo una específica por ID.
 * Valida las entradas del usuario y muestra la información de las tareas correspondientes.
 * Permite listar varias tareas de manera consecutiva antes de volver al menú principal.
 *
 * @param array $tasks  Lista de tareas existentes.
 * @return void
 */

function showTask($tasks)
{

    if (Task::ifEmpty($tasks)) {
        return;
    }

    do {
      
        $listAllTasks = trim(strtolower(readline("\n¿Desea listar todas las tareas? (s/n): ")));
        $listAllTasks=validation($listAllTasks);


        if ($listAllTasks == "s") {
            foreach ($tasks as $t) {
                echo $t->toString();
                sleep(1);
            }
            break;
        }

        $id = trim(readline("Ingrese el id de la tarea que desea listar: "));

        $found = false;
        foreach ($tasks as $t) {
            if ($t->getId() == $id) {
                echo $t->toString();
                $found = true;
                break;
            }
        }

        if (!$found) {
            echo "\nNo se han encontrado las tareas solicitadas.\n";
        }

        $repeatList = trim(strtolower(readline("\n¿Desea listar otras tareas? (s/n): ")));

        $repeatList=validation($repeatList);


        if ($repeatList == "n") {
            echo "\nVolviendo al menú...\n";
        }

    } while ($repeatList == "s" || $listAllTasks == "s");
    
}
