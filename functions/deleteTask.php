<?php

require_once "common/validation.php";
require_once "common/validateID.php";

/**
 * deleteTask
 *
 * Esta función permite eliminar una tarea existente del listado según su ID.
 * 
 * - Verifica primero si la lista de tareas está vacía.
 * - Solicita al usuario un ID y valida su formato numérico.
 * - Busca la tarea correspondiente y, si la encuentra, la elimina del array.
 * - Actualiza el archivo JSON con la nueva lista de tareas.
 * - Si no encuentra la tarea, pregunta al usuario si desea volver a intentar.
 *
 * @param array  &$tasks     Referencia al array de tareas existente.
 * @param string $dataBase  Ruta del archivo JSON donde se guardan las tareas.
 * @return void
 */

function deleteTask(&$tasks, $dataBase)
{

     if (Task::ifEmpty($tasks)) {
          return;
     }

     $repeatTask = "";

     do {

          $id = trim(readline("\nIngrese el ID de la tarea que desea eliminar: "));
          $errorID = validateID($id);
          if ($errorID) {
               echo $errorID . "\n";
               continue;
          }

          $isDeleted = false;
          $titleTask = "";
          foreach ($tasks as $index => $t) {

               if ($id == $t->getId()) {

                    $titleTask = $t->getTitle();
                    $sureDelete = validation(readline("\n¿Seguro que deseas eliminar la tarea '" . $titleTask . "' ? (s/n): "));

                    if ($sureDelete == "s") {

                         unset($tasks[$index]);
                         $tasks = array_values($tasks);

                         $isDeleted = true;
                         break;
                    } else {
                         echo "\nEliminación cancelada.\n";
                         return;
                    }
               }
          }

          if ($isDeleted) {

               echo "\nSe ha eliminado la tarea '" . $titleTask . "' correctamente.\n";

               #Base de datos actualizada.
               file_put_contents($dataBase, json_encode(Task::tasksToArray($tasks), JSON_PRETTY_PRINT));
               return;
          } else {

               $repeatTask = trim(strtolower(readLine("\nNo se ha encontrado la tarea, volver a introducir id? (s/n): ")));
               $repeatTask = validation($repeatTask);

               if ($repeatTask == "n") {
                    echo "\nVolviendo al menú...\n";
                    return;
               }
          }

     } while ($repeatTask == "s");
}
