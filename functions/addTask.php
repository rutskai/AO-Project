<?php

require_once "functions/askTask.php";
require_once "common/validation.php";

function addTask(&$tasks, $dataBase){
    
    do{
        $data = askTask($tasks);
        $id = $data['id'];
        $title = $data['title'];
        $description = $data['description'];
        $date = $data['date'];

        $option= strtolower(readline("Seguro que quieres añadir esta tarea? (s/n): "));

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

        
            $newTask=strtolower(readline("\nDesea añadir otra tarea? (s/n): "));
            $newTask= validation($newTask);

        

        if ($newTask == "n") {
            echo "\nVolviendo al menú...\n";
            return;
        }


    } while($newTask=== "s");

 
}

?>