<?php
    
    session_start();
    $datos = array(
        'idReporte' => $_POST['idReporte'],
        'solucion' => $_POST['solucion'],
        'estatus' => $_POST['estatus'],
        'idUsuario' => $_SESSION['usuario']['id']
    );

    include "../../clases/Reportes.php";
    $Reportes = new Reportes();
    echo $Reportes->actualizarSolucion($datos);