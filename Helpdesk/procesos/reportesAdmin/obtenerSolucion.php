<?php

    $idReporte = $_POST['idReporte'];

    include "../../clases/Reportes.php";
    $Reportes = new Reportes();
    echo json_encode($Reportes->obtenerSolucion($idReporte));