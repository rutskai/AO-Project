<?php

function taskCompleted($tasks) {

    if (Task::ifEmpty($tasks)) {
        return;
    }

    do {


        $found = false;
        $id = readline("\nIngrese el Id de la tarea que desea completar: ");
        foreach ($tasks as $t) {
            if ($t->getId() == $id) {
                $t->setState(true);
                $found = true;
            }
        }

        if (!$found) {
            echo "\nNo se han encontrado la tarea solicitada.";
        }


        do {
            $option = strtolower(readline("\nDesea completar otra tarea? (s/n): "));
        } while ($option !== "s" && $option !== "n");

        if ($option == "n") {
            echo "\nVolviendo al menú...\n";
        }

    } while ($option == "s");
}
