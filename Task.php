<?php

class Task{
    private $id;
    private $state;
    private $title;
    private $description;
     private $date;

    public function __construct($id, $title, $description, $date){
        $this-> id=$id;
         $this-> title=$title;
        $this-> description=$description;
        $this-> date=$date;
        $this-> state=false;
    }

    public function toArray() {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'date' => $this->date,
            'state' => $this->state
        ];
    }

    public function toString(){

        $state = "Pendiente";
    if ($this->state) {
        $state = "Completada";
    }
        return "\nId: " . $this->id . "\nTítulo: " . $this->title . "\nDescripción: " . $this->description . "\n" . "Fecha: " . $this->date . "\n" . "Estado: " . $state . "\n";
    }

    public static function ifEmpty($tasks) {
        if (!is_array($tasks) || count($tasks) === 0) {
            echo "\nNo hay tareas disponibles.\n";
            sleep(1);
            return true;  
        }
        return false; 
    }

    public static function loadFromJSON($file){
        $tasks = [];
        if (file_exists($file)) {
            $jsonData = json_decode(file_get_contents($file), true);
            if (is_array($jsonData)) {
                foreach ($jsonData as $t) {
                    $tasks[] = new Task($t['id'], $t['title'], $t['description'], $t['date']);
                }
            }
        }
        return $tasks;
    }

    public static function tasksToArray($tasks){
        $storedTasks = [];
        foreach ($tasks as $t) {
            $storedTasks[] = $t->toArray();
        }
        return $storedTasks;
        }
    

     public function getId() {
        return $this->id;
    }

    public function getState() {
        return $this->state;
    }

      public function getTitle() {
        return $this->title;
    }

      public function getDescription() {
        return $this->description;
    }
     public function getDate() {
        return $this->date;
    }

      public function setId($id) {
        $this->id = $id;
    }

    public function setState($state) {
        $this->state = $state;
    }

     public function setTitle($title) {
        $this->title = $title;
    }
     public function setDescription($description) {
        $this->description = $description;
    }
      public function setDate($date) {
        $this->date = $date;
   
}

}