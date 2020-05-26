<?php

function conectarBD(){
    // Conexión a la BBDD
    $bd = new mysqli("localhost","ds_app","pass","DS");
    if ($bd->connect_error)
        die("Conexión fallida: " . $bd->connect_error);
    // Establecer la codificación de los datos almacenados
    
    $bd->set_charset("utf8");
    
    //Imprimir para ver el numero de conexiones que se realizan (SOLO DEPURACION)
    echo "Conexión a BD";

    return $bd;
}

//////////////////////
//    ENTIDADES     //
//////////////////////

function DB_nuevaEntidad($bd, $titulo, $img){
    $stmt = $bd->prepare("INSERT INTO Entidades (titulo, imagen) VALUES (?,?)");
    $stmt->bind_param("ss", $titulo, $img);
        if($stmt->execute())
            return true;
        else
            return false; 
}

function DB_borrarEntidad($bd, $titulo){
    $stmt = $bd->prepare("DELETE FROM Entidades WHERE titulo = ?");
    $stmt->bind_param("s", $titulo);
        if($stmt->execute())
            return true;
        else
            return false; 
}

function DB_actualizarEntidad($bd, $id_entidad, $titulo, $imagen){
    $stmt = $bd->prepare("UPDATE Entidades SET titulo = ? AND imagen = ? WHERE id = ?");
    $stmt->bind_param("ssi", $titulo, $imagen, $id_entidad);
        if($stmt->execute())
            return true;
        else
            return false; 
}

// Consulta para obtener una Entidad
function DB_getEntidad($bd, $titulo){
    $stmt = $bd->prepare("SELECT * FROM Entidades WHERE titulo = ?");
    $stmt->bind_param("s", $titulo);
    $stmt->execute();
    $res = $stmt->get_result();

    if($res){	//Si no hay error
        if($res->num_rows > 0){	//Si devuelve alguna tupla de respuesta
            $fila = $res->fetch_assoc();
        } else { 
            $fila = [];
        }
        mysqli_free_result($res);	// Liberar memoria de la consulta
    } else {	// Error en la consulta
        $fila = false; 
    }

    return $fila; 
}

// Consulta para obtener listado de entidades
function DB_getEntidades($bd){
    $stmt = $bd->prepare("SELECT * FROM Entidades");
    $stmt->execute();
    $res = $stmt->get_result();

    if($res){	//Si no hay error
        if($res->num_rows > 0){	//Si devuelve alguna tupla de respuesta
            $tabla = $res->fetch_all(MYSQLI_ASSOC);
        } else { 
            $tabla = [];
        }
        // Liberar memoria de la consulta
        $res->free_result();	
    } else {	// Error en la consulta
        $tabla = false; 
    }
    return $tabla; 
}

//////////////////////
//    USUARIOS     //
//////////////////////

function DB_nuevoUsuario($bd, $nombre, $correo, $password){
    $stmt = $bd->prepare("INSERT INTO Usuarios (nombre, correo, contraseña) VALUES (?,?,?)");
    $contraseña = password_hash($password, PASSWORD_DEFAULT);
    $stmt->bind_param("sss", $nombre, $correo, $contraseña);
        if($stmt->execute())
            return true;
        else
            return false; 
}

function DB_borrarUsuario($bd, $nombre){
    $stmt = $bd->prepare("DELETE FROM Usuarios WHERE nombre = ?");
    $stmt->bind_param("s", $nombre);
        if($stmt->execute())
            return true;
        else
            return false; 
}

function DB_actualizarUsuario($bd, $nombre, $correo, $password){
    $stmt = $bd->prepare("UPDATE Usuarios SET nombre = ? AND correo = ? AND contraseña = ? WHERE nombre = ?");
    $contraseña = password_hash($password, PASSWORD_DEFAULT);
    $stmt->bind_param("ssss", $nombre, $correo, $contraseña, $nombre);
        if($stmt->execute())
            return true;
        else
            return false; 
}

// Consulta para obtener un Usuario
function DB_getUsuario($bd, $nombre){
    $stmt = $bd->prepare("SELECT * FROM Usuarios WHERE nombre = ?");
    $stmt->bind_param("s", $nombre);
    $stmt->execute();
    $res = $stmt->get_result();

    if($res){	//Si no hay error
        if($res->num_rows > 0){	//Si devuelve alguna tupla de respuesta
            $fila = $res->fetch_assoc();
        } else { 
            $fila = [];
        }
        mysqli_free_result($res);	// Liberar memoria de la consulta
    } else {	// Error en la consulta
        $fila = false; 
    }

    return $fila; 
}

// Consulta para obtener listado de entidades
function DB_getUsuarios($bd){
    $stmt = $bd->prepare("SELECT * FROM Usuarios");
    $stmt->execute();
    $res = $stmt->get_result();

    if($res){	//Si no hay error
        if($res->num_rows > 0){	//Si devuelve alguna tupla de respuesta
            $tabla = $res->fetch_all(MYSQLI_ASSOC);
        } else { 
            $tabla = [];
        }
        // Liberar memoria de la consulta
        $res->free_result();	
    } else {	// Error en la consulta
        $tabla = false; 
    }
    return $tabla; 
}


?>