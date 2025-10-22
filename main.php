<?php

require_once "Task.php";
require_once "functions/addTask.php";
require_once "functions/askTask.php";
// require_once "functions/deleteTask.php";
// require_once "functions/editTask.php";
// require_once "functions/showTask.php";


$dataBase = 'tasks.json';
$tasks = [];


# Se muestra el menú principal de la aplicación, se solicita al usuario un número que hará una función en específico o se 
# saldrá de la aplicación.

function head(){

 echo "\nAplicación de Tareas\n";
 echo "--------------------------\n";
 echo "1) Agregar tareas\n2) Eliminar tarea\n3) Editar tarea\n4) Enseñar tareas\n5) Salir\n";
 $opciones= readline("\nSelecciona una opción numérica: ");

 switch ($opciones){
    case "1":
        addTask($tasks);
        break;
    case "2":
        //deleteTask();
        break;
    case "3":
        //editTask();
        break;
    case "4":
        //showTask();
        break;
    case "5":
        echo "Cerrando programa...";
        exit();
    default:
        "Tiene que ser un número del 1 al 5";

 }

}
while(true){
    head();
}



?>