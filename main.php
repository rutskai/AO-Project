<?php

require_once "Task.php";
require_once "functions/addTask.php";
require_once "functions/askTask.php";
require_once "functions/deleteTask.php";
// require_once "functions/editTask.php";
require_once "functions/showTask.php";
require_once "functions/taskCompleted.php";



$dataBase = 'tasks.json';
$tasks = Task::loadFromJSON($dataBase);

# Se muestra el menú principal de la aplicación, se solicita al usuario un número que hará una función en específico o se 
# saldrá de la aplicación.

function head(&$tasks, $dataBase)
{

    echo "\nAplicación de Tareas\n";
    echo "--------------------------\n";
    echo "1) Agregar tareas\n2) Eliminar tarea\n3) Editar tarea\n4) Marcar como completada\n5) Listar tareas\n6) Salir\n";
    $opciones = readline("\nSelecciona una opción numérica: ");

    switch ($opciones) {
        case "1":
            addTask($tasks, $dataBase);
            break;
        case "2":
            deleteTask($tasks, $dataBase);
            break;
        case "3":
            //editTask();
            break;
        case "4":
            taskCompleted($tasks);
            break;
        case "5":
            showTask($tasks);
            break;
        case "6":
            echo "Cerrando programa...";
            exit();
        default:
            "Tiene que ser un número del 1 al 5";
    }
}
while (true) {
    head($tasks, $dataBase);
}
