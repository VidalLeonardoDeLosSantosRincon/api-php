<?php
require("conexion.php");

//metodo add user
function addAbility($nombre,$tipo){
    if(!empty(trim($nombre))){
        $nombre = trim($nombre);
        $nombre = htmlspecialchars($nombre);
        $nombre = stripslashes($nombre);
        $nombre = filter_var($nombre,FILTER_SANITIZE_STRING);
    }else{
        echo json_encode("Campo nombre vacio");
    }
    if(!empty(trim($tipo))){
        $tipo = trim($tipo);
        $tipo = htmlspecialchars($tipo);
        $tipo = stripslashes($tipo);
        $tipo = filter_var($tipo,FILTER_SANITIZE_STRING);
    }else{
        echo json_encode("Campo tipo vacio");
    }

    if(!empty(trim($nombre)) && !empty(trim($tipo))){
       $con = conectar();
       if($addAbility = mysqli_query($con,"insert into habilidades (nombre,tipo)values('$nombre','$tipo')")){
            echo json_encode("Habilidad agregada exitosamente");
        }else{
            echo json_encode("No se pudo agregar la habilidad");
        }
    }
}

//metodo update ability
function updateAbility($id,$nombre,$tipo){
    if(empty(trim($id))){
        echo json_encode("Campo Id vacio");
    }
    if(!empty(trim($nombre))){
        $nombre = trim($nombre);
        $nombre = htmlspecialchars($nombre);
        $nombre = stripslashes($nombre);
        $nombre = filter_var($nombre,FILTER_SANITIZE_STRING);
    }else{
        echo json_encode("Campo nombre vacio");
    }
    if(!empty(trim($tipo))){
        $tipo = trim($tipo);
        $tipo = htmlspecialchars($tipo);
        $tipo = stripslashes($tipo);
        $tipo = filter_var($tipo,FILTER_SANITIZE_STRING);
    }else{
        echo json_encode("Campo tipo vacio");
    }
    

    if(!empty(trim($id)) &&!empty(trim($nombre)) && !empty(trim($tipo))){
        $con = conectar();
        if($updateAbility = mysqli_query($con,"update habilidades set nombre='$nombre' ,tipo='$tipo' where id_habilidad ='$id'")){
            echo json_encode("Habilidad actualizada exitosamente");
       }else{
           echo json_encode("No se pudo actualizar la  habilidad");
       }
    }
}

//metodo get all abilities
function getAllAbilities(){
    
    $con = conectar();
    $traer_habilidades = mysqli_query($con,"select * from habilidades");
    $habilidadesData= array();
    while($fila = mysqli_fetch_row($traer_habilidades)){
        $habilidadesData["habilidades"][]=$fila;
    
    }
    echo json_encode($habilidadesData);
}

//metodo get ability
function getAbility($id){
    $con = conectar();
    $traer_habilidades = mysqli_query($con,"select * from habilidades where id_habilidad ='$id'");
    $habilidadesData;
    while($fila = mysqli_fetch_row($traer_habilidades)){
        $habilidadesData=["id"=>$fila[0],"nombre"=>$fila[1],"tipo"=>$fila[2]];
    }
    echo json_encode($habilidadesData);
}

//metodo delete ability
function deleteAbility($id){
    $con = conectar();
    if($borrar_habilidad = mysqli_query($con,"delete  from habilidades where id_habilidad ='$id'")){
        echo json_encode("Habilidad eliminada exitosamente");
    }else{
        echo json_encode("No se pudo eliminar la habilidad");
    } 
}

 if($_SERVER["REQUEST_METHOD"]=="POST"){
    //add user
     if($_POST["action"]=="addAbility"){
         $ability = json_decode($_POST["data"]);
         $nombre = $ability->nombre;
         $tipo = $ability->tipo;
         addAbility($nombre,$tipo);    
     }

     //update ability
     if($_POST["action"]=="updateAbility"){
        $ability = json_decode($_POST["data"]);
        $id = $ability->id;
        $nombre = $ability->nombre;
        $tipo = $ability->tipo;
        updateAbility($id,$nombre,$tipo);
     }

     //get all abilities
     if($_POST["action"]=="getAllAbilities"){
        getAllAbilities();
     }

     //get ability
     if($_POST["action"]=="getAbility"){
         $ability = json_decode($_POST["data"]);
         $id = $ability->id;
         getAbility($id);
     }

     //delete ability
     if($_POST["action"]=="deleteAbility"){
        $ability = json_decode($_POST["data"]);
        $id = $ability->id;
        deleteAbility($id);
    }
 }

?>