<?php

require_once "functions/askTask.php";
require_once "common/validation.php";

/**
 * addTask
 *
 * Esta función permite agregar nuevas tareas a la lista de tareas existente.
 * 
 *
 * Solicita y valida los datos de una tarea, confirma con el usuario si desea añadirla, 
 * la agrega al array y guarda en JSON. Permite repetir el proceso hasta que el usuario decida salir.
 *
 * @param array $tasks      Referencia al array de tareas existente.
 * @param string $dataBase  Ruta del archivo JSON donde se guardan las tareas.
 * @return void
 */

function addTask(&$tasks, $dataBase){
    
    do{
        $data = askTask($tasks);
        $id = $data['id'];
        $title = $data['title'];
        $description = $data['description'];
        $date = $data['date'];

        $option= trim(strtolower(readline("¿Seguro que quieres añadir esta tarea? (s/n): ")));

        if($option=="s"){

            $task = new Task($id, $title, $description, $date);
            $tasks[] = $task;

            # Guardar todas las tareas en JSON
            file_put_contents($dataBase, json_encode(Task::tasksToArray($tasks), JSON_PRETTY_PRINT));

        }else if($option=="n"){
            echo "Tarea no agregada.\n ";

        }else{
            echo "Opción no válida.\n";
        }
        
            $newTask= trim(strtolower(readline("\n¿Desea añadir otra tarea? (s/n): ")));
            $newTask= validation($newTask);

        if ($newTask == "n") {
            echo "\nVolviendo al menú...\n";
            return;
        }


    } while($newTask=== "s");

 
}

?>