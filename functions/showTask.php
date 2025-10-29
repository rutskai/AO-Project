<?php

require_once "common/validation.php";

function showTask($tasks)
{

    if (Task::ifEmpty($tasks)) {
        return;
    }


    do {
      

        $listAllTasks = strtolower(readline("\n¿Desea listar todas las tareas? (s/n): "));
        $listAllTasks=validation($listAllTasks);


        if ($listAllTasks == "s") {
            foreach ($tasks as $t) {
                echo $t->toString();
                sleep(1);
            }
            break;
        }

        $id = readline("Ingrese el id de la tarea que desea listar: ");

        $found = false;
        foreach ($tasks as $t) {
            if ($t->getId() == $id) {
                echo $t->toString();
                $found = true;
                break;
            }
        }

        if (!$found) {
            echo "\nNo se han encontrado las tareas solicitadas.";
        }


        $repeatList = strtolower(readline("\n¿Desea listar otras tareas? (s/n): "));

        $repeatList=validation($repeatList);


        if ($repeatList == "n") {
            echo "\nVolviendo al menú...\n";
        }

    } while ($repeatList == "s" || $listAllTasks == "s");
    
}
