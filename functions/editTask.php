<?php

require_once "common/validateDescription.php";
require_once "common/validateTitle.php";
require_once "common/validateDate.php";

/**
 * editTask
 *
 * Permite modificar una tarea existente en la lista de tareas.
 *
 * Busca una tarea por su ID y ofrece opciones para editar su título, descripción o fecha.
 * Cada campo se valida antes de aplicar los cambios. Los datos actualizados se guardan
 * en el archivo JSON. Permite editar múltiples tareas de forma consecutiva.
 *
 * @param array  &$tasks      Lista de tareas existentes.
 * @param string $dataBase   Ruta del archivo JSON donde se almacenan las tareas.
 * @return void
 */

function editTask(&$tasks, $dataBase)
{

    if (Task::ifEmpty($tasks)) {
        return;
    }

    do {

        $id = trim(readline("Ingresa el ID de la tarea a editar: "));
        $errorID=validateID($id);
        if($errorID){ echo $errorID . "\n"; continue; }

      

        $found = false;
        $taskEdit = "";

        foreach ($tasks as $t) {
            if ($t->getId() == $id) {
                $titleTask = $t->getTitle();
                $sureEdit = validation(readline("\nSeguro que deseas editar la tarea '" . $titleTask . "' ?? (s/n)"));
                if($sureEdit=="s"){
                     $found = true;
                    $taskEdit = $t;
                }else{
                    echo "\nTarea a editar cancelada\n";
                    return;
                }
               
            }
        }

        if (!$found) {
            echo "\nId no encontrado.\n";
            return;
        }

        echo "\n1)Título\n2)Descripción\n3)Fecha\n";
        $option = (int) trim(readline("\n¿Qué deseas editar? "));


        switch ($option) {
            case 1:
                $title = trim(readline("Ingrese el nuevo título: "));
                $errorTitle=validateTitle($title);
                if($errorTitle){ echo $errorTitle . "\n"; continue 2; }

                $taskEdit->setTitle($title);
                break;
            case 2:
                $description = trim(readline("Ingrese la nueva descripción: "));
                $errorDescription=validateDescription($description);
                if($errorDescription){ echo $errorDescription . "\n"; continue 2; }

                $taskEdit->setDescription($description);
                break;
            case 3:
                $date = trim(readline("Ingrese la nueva fecha: "));
                $errorDate=validateDate($date);
                if($errorDate){ echo $errorDate . "\n"; continue 2; }

                $taskEdit->setDate($date);
                break;
            default:
                echo ("Ingrese un número del 1 al 3 por favor.");
                break;
        }

        file_put_contents($dataBase, json_encode(Task::tasksToArray($tasks), JSON_PRETTY_PRINT));
        echo "\nModificación exitosa!\n";

        $repeatTask = trim(strtolower(readline("\n¿Desea modificar otra tarea? (s/n): ")));

        $repeatTask = validation($repeatTask);

        if ($repeatTask == "n") {
            echo "\nVolviendo al menú...\n";
            return;
        }

    } while ($repeatTask == "s");
}
