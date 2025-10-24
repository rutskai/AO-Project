<?php

function deleteTask(&$tasks, $dataBase){

     if (Task::ifEmpty($tasks)) {
        return;
     }

     do{

     $deleteOption= readline("\nIngrese el id de la tarea que desea eliminar: ");
     $isDeleted=false;

     foreach ($tasks as $index => $t) {

       if($deleteOption== $t->getId()){

          unset($tasks[$index]);
          $tasks=array_values( $tasks);

          $isDeleted=true;
          }
     }

     if($isDeleted){
          echo "\nSe ha eliminado la tarea correctamente.\n";

          #Base de datos actualizada.
          file_put_contents($dataBase, json_encode(Task::tasksToArray($tasks), JSON_PRETTY_PRINT));

     }else if(!$isDeleted){

          do{
               $option=strtolower(readLine("\nNo se ha encontrado la tarea, volver a introducir id? (s/n): "));

               if($option=="n"){
               echo "\nVolviendo al menú...\n";
               return;
               }

          }while($option != "s" && $option != "n");
          
     }

}while(!$isDeleted);

}


?>