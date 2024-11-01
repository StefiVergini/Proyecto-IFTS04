<?php
    
    include('../session/conexion.php');

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_FILES['examFinal_form']) && $_FILES['examFinal_form']['error'] == 0){
            session_start(); 
            //var_dump($_SESSION);
            $usuario_id = $_SESSION['id'];
            $target_dir = '../pdf/';
            $clean_space = preg_replace('/\s+/', '', $_FILES['examFinal_form']['name']);
            echo $clean_space;
            $target_file = $target_dir . basename($clean_space);
            
            $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            $allowed_types = array("pdf");
            if (!in_array($file_type, $allowed_types)) {
                echo "Solo archivos de formato .pdf son permitidos";
            } else {
                if (move_uploaded_file($_FILES["examFinal_form"]["tmp_name"], $target_file)) {
                    $titulo = 'FORMULARIO DE INSCRIPCION FINALES';
                    $date = date("Y-m-d H:i:s");

                    $consulta = "SELECT * FROM archivos_pdf WHERE titulo ='FORMULARIO DE INSCRIPCION FINALES'";

                    $result = $conn ->query($consulta);

                    //var_dump($result);
                    if(mysqli_num_rows($result) == 0){
                        $sql = "INSERT INTO archivos_pdf(titulo, ruta_archivo, usuario_id) VALUES ('$titulo', '$target_file', $usuario_id)";
                    }else{
                        
                        while($row = mysqli_fetch_assoc($result)){ 
                            $rutaAnterior = $row['ruta_archivo'];
                            if (file_exists($rutaAnterior)) {
                                unlink($rutaAnterior);
                            }
                        }
                        $sql = "UPDATE archivos_pdf SET titulo = 'FORMULARIO DE INSCRIPCION FINALES', ruta_archivo = '$target_file', usuario_id = $usuario_id, fecha_subida = '$date' WHERE titulo = 'FORMULARIO DE INSCRIPCION FINALES'";
                    }
                    
                    if ($conn->query($sql) === TRUE) {
                        echo "<script>
                        alert('El archivo " . basename($_FILES["examFinal_form"]["name"]) . " se ha subido correctamente.');
                        window.location.href = './examFinal.php';
                        </script>";
                    } else {
                        echo "Lo sentimos, hubo un error en la subida del archivo: " . $conn->error;
                    }
                    $conn->close();
                }else{
                    echo "Lo sentimos, hubo un error al subir al archivo";
                }
            }
        }
    }else{
        echo 'No se ha subido ningun archivo.';
    }
?>