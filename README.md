=== Descripción ===

Este es un gestor de tareas en línea de comandos (CLI) desarrollado en PHP.
Permite crear, listar, editar, eliminar y marcar tareas como completadas.
Las tareas se almacenan en un archivo JSON (tasks.json), lo que permite mantener la información persistente entre ejecuciones.

=== Requisitos previos ===

- Tener instalado PHP 8.0 o superior.
- Tener permisos de lectura y escritura en el directorio del proyecto (para manipular tasks.json).

=== Cómo ejecutar el programa ===

1. Clona o descarga este repositorio.

2. Abre una terminal dentro del directorio del proyecto.

3. Ejecuta el programa con: php main.php

4. En pantalla aparecerá el siguiente menú interactivo:

Aplicación de Tareas
--------------------------
1) Agregar tareas
2) Eliminar tarea
3) Editar tarea
4) Marcar como completada
5) Listar tareas
6) Salir

Introduce el número correspondiente a la acción que desees realizar.

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

=== Estructura del proyecto ===

AO-project/
│
├── common/
│   ├── validateID.php
│   ├── validateTitle.php
│   ├── validateDescription.php
│   ├── validateDate.php
│   └── validation.php
│
├── functions/
│   ├── addTask.php
│   ├── deleteTask.php
│   ├── editTask.php
│   ├── showTask.php
│   ├── taskCompleted.php
│   └── askTask.php
│
├── tasks.json
├── Task.php
├── README.md
└── main.php

=== Funcionalidades ===

1) Agregar tareas

- Solicita título, descripción y fecha de la tarea.

- Valida que los campos no estén vacíos y que la fecha tenga formato válido.

- Confirma antes de guardar.

- Almacenamiento persistente en tasks.json.

2) Eliminar tarea

- Pide el ID de la tarea a eliminar.

- Confirma la eliminación antes de proceder.

- Actualiza automáticamente el archivo JSON.

- Permite repetir el proceso varias veces.

 3) Editar tarea

- Permite modificar título, descripción o fecha de una tarea existente.

- Valida los nuevos valores antes de guardar.

- Actualiza tasks.json con los cambios.

4) Marcar como completada

- Pide el ID de la tarea y cambia su estado a “completada”.

- Permite marcar varias tareas seguidas.

5) Listar tareas

- Muestra todas las tareas con su ID, título, descripción, fecha y estado (pendiente/completada).

- Si no hay tareas registradas, muestra un mensaje correspondiente.

6) Salir

Termina la ejecución del programa de manera segura.

=== Autora ===

Desarrollado por Ruth Collado García

