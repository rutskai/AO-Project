<?php

require_once "functions/askTask.php";

function addTask(&$tasks){
       global $dataBase;

    do{
        $data = askTask();
        $id = $data['id'];
        $title = $data['title'];
        $description = $data['description'];

        $option= strtolower(readline("Seguro que quieres añadir esta tarea? (s/n)"));

        if($option=="s"){
            $task= new Task($id, $title, $description);
            $tasks[] = $task;

             #  Leer JSON actual
            if(file_exists($dataBase)){
                $tasks = json_decode(file_get_contents($dataBase), true);
                if(!is_array($tasks)) $tasks = [];
            } else {
                $tasks = [];
            }

            # Agregar nueva tarea
            $tasks[] = [
                'id' => $id,
                'title' => $title,
                'description' => $description,
                'state' => false
            ];

            # Guardar en JSON
            file_put_contents($dataBase, json_encode($tasks, JSON_PRETTY_PRINT));
            break;

        }else if($option=="n"){
            echo "Tarea no agregada.\n ";
            continue;

        }else{
            echo "Opción no válida.\n";
        }

        

    } while(true);

 
}

?>