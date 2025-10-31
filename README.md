Gestor de tareas PHP
--------------------------

Este es un gestor de tareas en línea de comandos (terminal)  desarrollado en PHP.
Permite crear, listar, editar, eliminar y marcar tareas como completadas.
Las tareas se almacenan en un archivo JSON (tasks.json), lo que permite mantener la información persistente entre ejecuciones.

Requisitos previos
--------------------------

- Tener instalado PHP 8.0 o superior.
- Tener permisos de lectura y escritura en el directorio del proyecto (para manipular tasks.json).

Cómo ejecutar el proyecto
--------------------------

1. Clona o descarga este repositorio.

2. Abre una terminal dentro del directorio del proyecto.

3. Ejecuta el programa con el comando: php main.php

4. En pantalla aparecerá el menú interactivo.

Ejemplo de uso:

Aplicación de Tareas
--------------------------
1) Agregar tareas
2) Eliminar tarea
3) Editar tarea
4) Marcar como completada
5) Listar tareas
6) Salir

Selecciona una opción numérica: 1

Ingrese el título: Comprar comida
Ingrese la descripción: Ir al supermercado
Ingrese la fecha: 2025-11-01

¿Deseas guardar la tarea? (s/n): s

Tarea añadida correctamente.

Estructura del proyecto
--------------------------

<img width="576" height="349" alt="Captura de pantalla 2025-10-31 031129" src="https://github.com/user-attachments/assets/b657cdc1-183e-429a-aaa5-c2f22718587f" />


Funcionalidades
--------------------------

1) Agregar tareas

- Solicita ID, título, descripción y fecha de la tarea mediante la función askTask().

- Valida que los datos ingresados sean correctos (no vacíos, sin duplicados y con fecha en formato válido) usando las funciones del módulo common/validation.php.

- Pide confirmación al usuario antes de guardar la tarea.

- Si el usuario confirma (s), crea un nuevo objeto Task con los datos proporcionados y lo agrega al arreglo de tareas existente.

- Guarda todas las tareas actualizadas en el archivo tasks.json con formato legible (JSON_PRETTY_PRINT), garantizando la persistencia de los datos.

- Si el usuario decide no guardar (n), muestra un mensaje de cancelación.

- Permite agregar varias tareas consecutivamente, preguntando al final si se desea añadir otra (¿Desea añadir otra tarea?).

- Finaliza cuando el usuario responde n, mostrando el mensaje "Volviendo al menú...".

2) Eliminar tarea

- Comprueba si la lista de tareas está vacía mediante Task::ifEmpty(). Si no hay tareas registradas, sale de la función.

- Solicita al usuario el ID de la tarea que desea eliminar.

- Valida el formato del ID utilizando validateID(). Si no es válido, muestra el error y vuelve a solicitar el dato.

- Recorre la lista de tareas para buscar la tarea con el ID indicado.

- Si encuentra una coincidencia:

  Muestra el título de la tarea y pide confirmación al usuario:
  "¿Seguro que deseas eliminar la tarea 'X'? (s/n):"

- Si el usuario confirma (s):

  Elimina la tarea del arreglo utilizando unset() y reindexa el array con array_values().

  Actualiza el archivo tasks.json con la nueva lista de tareas mediante file_put_contents() y json_encode() con formato legible (JSON_PRETTY_PRINT).

  Muestra el mensaje:
  "Se ha eliminado la tarea 'X' correctamente."

- Si el usuario cancela (n), muestra "Eliminación cancelada." y regresa al menú principal.

- Si el ID no existe, muestra un mensaje informando que la tarea no se ha encontrado y pregunta si desea volver a intentar.

- Si el usuario responde n, finaliza la función mostrando "Volviendo al menú...".

- El proceso se repite mientras el usuario elija la opción s para intentar nuevamente.

 3) Editar tarea

- Permite modificar título, descripción o fecha de una tarea existente.

- Valida los nuevos valores antes de guardar.

- Actualiza tasks.json con los cambios.

4) Marcar como completada

- Comprueba si la lista de tareas está vacía mediante Task::ifEmpty(). Si no hay tareas registradas, la función termina.

- Solicita al usuario el ID de la tarea que desea editar y valida el formato utilizando validateID().

- Busca en la lista la tarea correspondiente.

- Si no se encuentra el ID, muestra "Id no encontrado." y regresa al menú.

- Si se encuentra, muestra el título y pide confirmación al usuario:
 "¿Seguro que deseas editar la tarea 'X'? (s/n)"

- Si el usuario confirma (s), continúa con la edición.

- Si cancela (n), muestra "Tarea a editar cancelada" y termina.

- Muestra un menú con las opciones de edición.

- Según la opción seleccionada:

  Título: solicita un nuevo título y lo valida con validateTitle().

  Descripción: solicita una nueva descripción y la valida con validateDescription().

  Fecha: solicita una nueva fecha y la valida con validateDate().

- Si el valor no es válido, muestra el mensaje de error y vuelve a solicitar los datos.

- Aplica los cambios usando los métodos del objeto Task:

  setTitle(), setDescription(), o setDate().

- Guarda los datos actualizados en tasks.json utilizando file_put_contents() y json_encode() con JSON_PRETTY_PRINT.

- Muestra el mensaje "Modificación exitosa!" al completar la edición.

- Pregunta al usuario si desea editar otra tarea (¿Desea modificar otra tarea? (s/n)):

- Si responde s, repite el proceso.

- Si responde n, muestra "Volviendo al menú..." y regresa al programa principal.

5) Listar tareas

- Verifica si la lista de tareas está vacía mediante Task::ifEmpty().
  Si no existen tareas registradas, la función finaliza.

- Pregunta al usuario si desea listar todas las tareas o una tarea específica por ID:

  "¿Desea listar todas las tareas? (s/n):"

- Valida la respuesta con la función validation() para asegurar que solo acepte las opciones s o n.

- Si el usuario elige “s” (sí):

- Recorre todas las tareas y las muestra una por una utilizando el método toString() de la clase Task.

- Pausa un segundo entre cada tarea (sleep(1)) para mejorar la legibilidad.

- Si el usuario elige “n” (no):

- Solicita un ID para mostrar una tarea específica.

- Busca la tarea en la lista comparando con getId().

- Si la encuentra, muestra su información completa con toString().

- Si no la encuentra, muestra el mensaje:
  "No se han encontrado las tareas solicitadas."

- Al finalizar, pregunta al usuario si desea listar otras tareas:
  "¿Desea listar otras tareas? (s/n):"

- Si responde s, repite el proceso.

- Si responde n, muestra "Volviendo al menú..." y regresa al programa principal.

6) Salir

Termina la ejecución del programa de manera segura.

Autora
--------------------------

Desarrollado por Ruth Collado García

