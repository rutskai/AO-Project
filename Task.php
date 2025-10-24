<?php

class Task{
    private $id;
    private $state;
    private $title;
    private $description;

    public function __construct($id, $title, $description){
        $this-> id=$id;
         $this-> title=$title;
        $this-> description=$description;
        $this-> state=false;
    }

    public function toArray() {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'state' => $this->state
        ];
    }

    public function toString(){
        return "\nId: " . $this->id . "\nTítulo: " . $this->title . "\nDescripción: " . $this->description . "\n";
    }

    public static function ifEmpty($tasks) {
        if (empty($tasks)) {
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
                    $tasks[] = new Task($t['id'], $t['title'], $t['description']);
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

      public function setId($id) {
        $this->id = $id;
    }

    public function setState($state) {
        $this->state = $state;
    }

     public function setTitle($title) {
        $this->title = $title;
    }
     public function setdescription($description) {
        $this->description = $description;
    }

}