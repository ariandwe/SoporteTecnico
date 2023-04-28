<?php

    include "../../../clases/Usuarios.php";
    $Usuarios = new Usuarios();
    $datos = array(
        "idUsuario" => $_POST['idUsuario'],
        "idPersona" => $_POST['idPersona']
    );
    
    echo $Usuarios->eliminarUsuario($datos);

?>