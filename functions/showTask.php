<?php

function showTask($tasks){

    if (Task::ifEmpty($tasks)) {
        return;
    }

    do {

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

        do {
            $option = strtolower(readline("\nDesea listar otra tarea? (s/n): "));
        } while ($option !== "s" && $option !== "n");

        if ($option == "n") {
            echo "\nVolviendo al menú...\n";
        }
    } while ($option == "s");
}
