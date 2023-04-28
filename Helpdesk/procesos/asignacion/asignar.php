<?php
    
    $datos = array(
        'idPersona' => $_POST['idPersona'],
        'idEquipo' => $_POST['idEquipo'],
        'marca' => $_POST['marca'],
        'modelo' => $_POST['modelo'],
        'color' => $_POST['color'],
        'descripcion' => $_POST['descripcion'],
        'memoria' => $_POST['memoria'],
        'discoDuro' => $_POST['discoDuro'],
        'procesador' => $_POST['procesador']
    );

    include "../../clases/Asignacion.php";
    $Asignacion = new Asignacion();
    echo $Asignacion->agregarAsignacion($datos);