<?php
function askTask($tasks){

    do{
        echo "\nIngrese los datos de la tarea:\n";
        $id=readline("\nId: ");
        if(!is_numeric($id)){ echo "Error, el ID debe ser numérico.\n"; continue; }
        $isDuplicated=false;
        foreach($tasks as $t){
            if($t->getId()==$id){
             $isDuplicated=true;
             break;
            }
        }

        if($isDuplicated){ echo "\nId duplicado, por favor, ingrese otro Id."; continue;}
    
        $title=readline("\nTítulo: "); 
        $description= readline("\nDescripción: "); 
        if(trim($title)=="" || trim($description)==""){ echo "El texto o/y la descripción no pueden estar vacíos.\n"; continue; }
        if(is_numeric($title) || is_numeric($description) ){ echo "El título o/y descripción deben ser solo texto. \n"; continue; }

        break;

    }while(true);

    return ['id' => $id, 'title' => $title, 'description' => $description];
}

?>