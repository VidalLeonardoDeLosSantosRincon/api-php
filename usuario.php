<?php 
require("conexion.php");

//metodo add user
function addUser($nombre,$apellido,$carrera,$telefono,$correo,$pass){
    if(!empty(trim($nombre))){
        $nombre = trim($nombre);
        $nombre = htmlspecialchars($nombre);
        $nombre = stripslashes($nombre);
        $nombre = filter_var($nombre,FILTER_SANITIZE_STRING);
    }else{
        echo json_encode("Campo nombre vacio");
    }
    if(!empty(trim($apellido))){
        $apellido = trim($apellido);
        $apellido = htmlspecialchars($apellido);
        $apellido = stripslashes($apellido);
        $apellido = filter_var($apellido,FILTER_SANITIZE_STRING);
    }else{
        echo json_encode("Campo apellido vacio");
    }
    if(!empty(trim($carrera))){
        $carrera = trim($carrera);
        $carrera = htmlspecialchars($carrera);
        $carrera = stripslashes($carrera);
        $carrera = filter_var($carrera,FILTER_SANITIZE_STRING);
    }else{
        echo json_encode("Campo carrera vacio");
    }
    if(!empty(trim($telefono))){
        $telefono = trim($telefono);
        $telefono = htmlspecialchars($telefono);
        $telefono = stripslashes($telefono);
        $telefono = filter_var($telefono,FILTER_SANITIZE_STRING);
    }else{
        echo json_encode("Campo telefono vacio");
    }
    if(!empty(trim($correo))){
        $correo = trim($correo);
        $correo = htmlspecialchars($correo);
        $correo = stripslashes($correo);
        $correo = filter_var($correo,FILTER_SANITIZE_STRING);
        if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
            echo json_encode("Correo no valido");
        }
    }else{
        echo json_encode("Campo correo vacio");
    }   
     if(!empty(trim($pass))){
        $pass = trim($pass);
        $pass = htmlspecialchars($pass);
        $pass = stripslashes($pass);
        $pass = filter_var($pass,FILTER_SANITIZE_STRING);
        
    }else{
        echo json_encode("Campo contraseña vacio");
    }


    if(!empty(trim($nombre)) && !empty(trim($apellido)) && !empty(trim($carrera))
         && !empty(trim($telefono)) && !empty(trim($correo))&& !empty(trim($pass))){
            $con = conectar();
            if($addUser = mysqli_query($con,"insert into usuario (nombre,apellido,carrera, telefono, correo,contrasenia)values('$nombre','$apellido','$carrera','$telefono','$correo','$pass')")){
                echo json_encode("Usuario agregado exitosamente");
            }else{
               echo json_encode("No se pudo agregar el usuario");
            }
        
    }
}

//metodo update user
function updateUser($id,$nombre,$apellido,$carrera,$telefono,$correo,$pass){
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
    if(!empty(trim($apellido))){
        $apellido = trim($apellido);
        $apellido = htmlspecialchars($apellido);
        $apellido = stripslashes($apellido);
        $apellido = filter_var($apellido,FILTER_SANITIZE_STRING);
    }else{
        echo json_encode("Campo apellido vacio");
    }
    if(!empty(trim($carrera))){
        $carrera = trim($carrera);
        $carrera = htmlspecialchars($carrera);
        $carrera = stripslashes($carrera);
        $carrera = filter_var($carrera,FILTER_SANITIZE_STRING);
    }else{
        echo json_encode("Campo carrera vacio");
    }
    if(!empty(trim($telefono))){
        $telefono = trim($telefono);
        $telefono = htmlspecialchars($telefono);
        $telefono = stripslashes($telefono);
        $telefono = filter_var($telefono,FILTER_SANITIZE_STRING);
    }else{
        echo json_encode("Campo telefono vacio");
    }
    if(!empty(trim($correo))){
        $correo = trim($correo);
        $correo = htmlspecialchars($correo);
        $correo = stripslashes($correo);
        $correo = filter_var($correo,FILTER_SANITIZE_STRING);
        if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
            echo json_encode("Correo no valido");
        }
    }else{
        echo json_encode("Campo correo vacio");
    }
    if(!empty(trim($pass))){
        $pass = trim($pass);
        $pass = htmlspecialchars($pass);
        $pass = stripslashes($pass);
        $pass = filter_var($pass,FILTER_SANITIZE_STRING);
    }else{
        echo json_encode("Campo contraseña vacio");
    }
    if(!empty(trim($id)) &&!empty(trim($nombre)) && !empty(trim($apellido)) && !empty(trim($carrera)) 
        && !empty(trim($telefono)) && !empty(trim($correo))&& !empty(trim($pass))){
        $con = conectar();
        if($updateUser = mysqli_query($con,"update usuario set nombre='$nombre' ,apellido='$apellido', carrera ='$carrera', telefono = '$telefono' , correo='$correo', contrasenia='$pass' where id_usuario ='$id'")){
            echo json_encode("Usuario actualizado exitosamente");
       }else{
           echo json_encode("No se pudo actualizar el usuario");
       }

    }
}

//metodo get all users
function getAllUsers(){
    $con = conectar();
    $traer_usuarios = mysqli_query($con,"select * from usuario");
    $usuariosData= array();
    while($fila = mysqli_fetch_row($traer_usuarios)){
        $usuariosData["usuarios"][]=$fila;
    
    }
    echo json_encode($usuariosData);
}
//metodo get user
function getUser($id){
    $con = conectar();
    $traer_usuarios = mysqli_query($con,"select * from usuario where id_usuario ='$id'");
    $usuariosData;
    while($fila = mysqli_fetch_row($traer_usuarios)){
        $usuariosData=["id"=>$fila[0],"nombre"=>$fila[1],"apellido"=>$fila[2],"carrera"=> $fila[3], 
        "telefono"=>$fila[4],"correo"=>$fila[5],"pass"=>$fila[6]];
    }
    echo json_encode($usuariosData);
}

//metodo delete user
function deleteUser($id){
    $con = conectar();
    if($borrar_usuario = mysqli_query($con,"delete  from usuario where id_usuario ='$id'")){
        echo json_encode("Usuario eliminado exitosamente");
    }else{
        echo json_encode("No se pudo eliminar el usuario");
    } 
}

 if($_SERVER["REQUEST_METHOD"]=="POST"){
    //add user
     if($_POST["action"]=="addUser"){
         $usuario = json_decode($_POST["data"]);
         $nombre = $usuario->nombre;
         $apellido = $usuario->apellido;
         $carrera = $usuario->carrera;
         $telefono = $usuario->telefono;
         $correo = $usuario->correo;
         $pass = $usuario->pass;
        addUser($nombre,$apellido,$carrera,$telefono,$correo,$pass);    
     }

     //update user
     if($_POST["action"]=="updateUser"){
        $usuario = json_decode($_POST["data"]);
        $id = $usuario->id;
        $nombre = $usuario->nombre;
        $apellido = $usuario->apellido;
        $carrera = $usuario->carrera;
        $telefono = $usuario->telefono;
        $correo = $usuario->correo;
        $pass = $usuario->pass;
        updateUser($id,$nombre,$apellido,$carrera,$telefono,$correo,$pass);
     }

     //get all users
     if($_POST["action"]=="getAllUsers"){
        getAllUsers();
     }

     //get user
     if($_POST["action"]=="getUser"){
         $usuario = json_decode($_POST["data"]);
         $id = $usuario->id;
         getUser($id);
     }

     //delete user
     if($_POST["action"]=="deleteUser"){
        $usuario = json_decode($_POST["data"]);
        $id = $usuario->id;
        deleteUser($id);
    }
 }
?>