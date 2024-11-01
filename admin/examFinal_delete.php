<?php
    include('../session/conexion.php');
    if(isset($_GET['id'])){
        $id_file = $_GET['id'];
        $query = mysqli_query($conn, 'SELECT ruta_archivo FROM archivos_pdf WHERE titulo = "FORMULARIO DE INSCRIPCION FINALES"');
        if($query -> num_rows > 0){
           while($row = mysqli_fetch_assoc($query)){ 
               $rutaAnterior = $row['ruta_archivo'];
               if (file_exists($rutaAnterior)) {
                unlink($rutaAnterior);
            }
           }
        }    

        $sql = "DELETE FROM archivos_pdf WHERE id = $id_file";
        if ($conn->query($sql) === TRUE) {
            echo "El archivo ha sido eliminado correctamente ";
        } else {
            echo "Lo sentimos, hubo un error en la eliminacion del archivo: " . $conn->error;
        }
        $conn->close();
        header('Location: ./examFinal.php');
    } else {
        echo 'No se ha recibido ningun dato para eliminar';
    }

?>