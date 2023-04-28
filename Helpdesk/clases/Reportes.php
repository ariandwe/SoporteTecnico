<?php
    include "Conexion.php";
    
    class Reportes extends Conexion {
        public function agregarReporteCliente($datos) {
            $conexion = parent::conectar();
            $sql = "INSERT INTO t_reportes (id_usuario,
                                            id_equipo,
                                            descripcion_problema) 
                    VALUES (?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('iis', $datos['idUsuario'],
                                        $datos['idEquipo'],
                                        $datos['problema']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        public function eliminarReporteCliente($idReporte) {
            $conexion = parent::conectar();
            $sql = "DELETE FROM t_reportes WHERE id_reporte = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('i', $idReporte);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        public function obtenerSolucion($idReporte) {
            $conexion = parent::conectar();
            $sql = "SELECT solucion_problema, 
                            estatus
                    FROM t_reportes 
                    WHERE id_reporte = '$idReporte'";
            $respuesta = mysqli_query($conexion, $sql);
            $reporte = mysqli_fetch_array($respuesta);

            $datos = array(
                "idReporte" => $idReporte,
                "estatus" => $reporte['estatus'],
                "solucion" => $reporte['solucion_problema']
            );

            return $datos;
        }

        public function actualizarSolucion($datos) {
            $conexion = parent::conectar();
            $sql = "UPDATE t_reportes 
                    SET id_usuario_tecnico = ?,
                        solucion_problema = ?,
                        estatus = ? 
                    WHERE id_reporte = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('isii', $datos['idUsuario'],
                                        $datos['solucion'],
                                        $datos['estatus'],
                                        $datos['idReporte']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;

        }
    }