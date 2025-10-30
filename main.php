<?php

require_once "Task.php";
require_once "functions/addTask.php";
require_once "functions/askTask.php";
require_once "functions/deleteTask.php";
require_once "functions/editTask.php";
require_once "functions/showTask.php";
require_once "functions/taskCompleted.php";

/**
 * head
 *
 * Función principal que muestra el menú de la aplicación de tareas
 * y ejecuta la acción correspondiente según la opción seleccionada por el usuario.
 *
 * Permite agregar, eliminar, editar, completar y listar tareas,
 * así como salir de la aplicación. Las tareas se cargan y guardan
 * desde/hacia un archivo JSON.
 *
 * @param array  &$tasks    Referencia hacia todas las funciones.
 * @param string $dataBase  Ruta del archivo JSON donde se almacenan las tareas.
 * @return void
 */

$dataBase = 'tasks.json';
$tasks = Task::loadFromJSON($dataBase);

function head(&$tasks, $dataBase)
{

    echo "\nAplicación de Tareas\n";
    echo "--------------------------\n";
    echo "1) Agregar tareas\n2) Eliminar tarea\n3) Editar tarea\n4) Marcar como completada\n5) Listar tareas\n6) Salir\n\n";
    $opciones = trim(readline("Selecciona una opción numérica: "));

    switch ($opciones) {
        case "1":
            addTask($tasks, $dataBase);
            break;
        case "2":
            deleteTask($tasks, $dataBase);
            break;
        case "3":
            editTask($tasks,$dataBase);
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
