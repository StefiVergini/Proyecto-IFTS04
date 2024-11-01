<?php
        session_start(); 

        $usuario_id = $_SESSION['id'];
        if($usuario_id === null){
            header("Location:.././session/login.php");
        }else{
            include("navegacion_admin.php");
            include("modal_admin.php"); 
            try {
                $conn = new PDO("mysql:host=localhost;dbname=ifts04", "root", "");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Error al conectar con la base de datos: " . $e->getMessage());
            }
        }
        if (isset($_GET['titulo'])) {
            $titulo = $_GET['titulo'];
            $ruta = obtenerRutaArchivo($conn, $titulo);
        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="../css/e_iniciales.css">
    <link rel="stylesheet" href="../css/horarios.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/navegacion.css">
    <link rel="stylesheet" href="../css/modalStyle.css">
    <link rel="stylesheet" href="../css/administrador.css">
    <link rel="stylesheet" href="../css/elimDatos.css">
</head>
<body>
    <!-- <h1>Panel de Administracion</h1>
    <h3>
        En esta pagina se debe crear la Administracion del sitio.
        Esta pagina solo es accesible mediante una sesion valida de usuario.
    </h3> -->
    <main id='main'> 
        <section class="section-adm galeria">
            <a name="administracion" href="index.php"></a>
            <h1> 
                         
                Cronogramas de Cursada por Carrera
                        
            </h1>
            <article class="contenedor-recuadro">
                <div class="recuadro" style="background-color:#777B82">
                    <div class="div-titulos">
                        <h2 style="color:#f1f1f1">Análisis de Sistemas </h2>
                        <h3 style="color:#f1f1f1">Plan Nuevo - 2024 -</h3>
                    </div>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post" enctype="multipart/form-data" onsubmit="return confirmarActualizacion('<?php echo 'Análisis de Sistemas - Plan nuevo'; ?>')">
                        <div class="input-y-label">
                            <label class= "label-estilo" for="sist_nuevo">
                                SUBIR PDF
                            </label>
                            <br>
                            <input class="input-estilo" id="sist_nuevo" type="file" name="sist_nuevo" accept="application/pdf" required>
                        </div>
                        <!-- Campo oculto para enviar el título -->
                        <input type="hidden" name="titulo" value="<?php echo htmlspecialchars($titulo); ?>">
                        <br>
                        <input type="submit" value="Subir Archivo" class="clase-links">
                    </form>
                    <br>
                    <!--BOTON QUE REDIRIGE AL PDF-->
                    <?php
                    $titulo = 'horario-a-s-nuevo';
                    $ruta = obtenerRutaArchivo($conn, $titulo);
                        
                    if ($ruta) { ?>
                           <button class="clase-links" ><a class="a-link" href=<?php echo $ruta; ?> target='_blank'>Ver Archivo</a></button>

                    <?php } else { ?>
                        <p class="p-notfound">Archivo No Encontrado</p>
                    <?php } ?>
                </div>
                <div class="recuadro" style="background-color:#777B82">              
                    <div class="div-titulos">
                        <h2 style="color:#f1f1f1">Análisis de Sistemas</h2>
                        <h3 style="color:#f1f1f1">Plan Previo - 2024 -</h3>
                    </div>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post" enctype="multipart/form-data" onsubmit="return confirmarActualizacion('<?php echo 'Análisis de Sistemas - Plan Previo'; ?>')">
                        <div class="input-y-label">    
                            <label class="label-estilo"  for="sist_viejo">SUBIR PDF</label>
                            <br>
                            <input class="input-estilo"  type="file" name="sist_viejo" accept="application/pdf" required>
                        </div>
                        <!-- Campo oculto para enviar el título -->
                        <input type="hidden" name="titulo" value="<?php echo htmlspecialchars($titulo); ?>">
                        <br>
                        <input type="submit" value="Subir Archivo"  class="clase-links">
                    </form>
                    <br>
                     <!--BOTON QUE REDIRIGE AL PDF-->
                     <?php
                    $titulo = 'horario-a-s-viejo';
                    $ruta = obtenerRutaArchivo($conn, $titulo);
                        
                    if ($ruta) { ?>
                            <button class="clase-links"><a class="a-link" href="<?php echo $ruta; ?>" target='_blank'>Ver Archivo</a></button>

                    <?php } else { ?>
                        <p class="p-notfound">Archivo No Encontrado</p>
                    <?php } ?>
                </div>
                <div class="recuadro" style="background-color:#777B82">
                    
                    <div class = "div-titulos centro">
                        <h2 style="color:#f1f1f1">Desarrollo de Software</h2>
                    </div>

                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post" enctype="multipart/form-data" onsubmit="return confirmarActualizacion('<?php echo 'Desarrollo de Software'; ?>')">
                        <div class="input-y-label">
                            <label class="label-estilo" for="des_soft">SUBIR PDF</label>
                            <br>
                            <input class="input-estilo" type="file" name="des_soft" accept="application/pdf" required >
                        </div>
                        <!-- Campo oculto para enviar el título -->
                        <input type="hidden" name="titulo" value="<?php echo htmlspecialchars($titulo); ?>">
                        <br>
                        <input type="submit" value="Subir Archivo"  class="clase-links">
                    </form>
                    
                    <br>
                    <!--BOTON QUE REDIRIGE AL PDF-->
                    <?php
                    $titulo = 'horario-d-s';
                    $ruta = obtenerRutaArchivo($conn, $titulo);
                        
                    if ($ruta) { ?>
                            <button class="clase-links"><a class="a-link" href="<?php echo $ruta; ?>" target='_blank'>Ver Archivo</a></button>

                    <?php } else { ?>
                        <p class="p-notfound">Archivo No Encontrado</p>
                    <?php } ?>
                </div>
                </div>
            </article>
                
    </main>
</body>
<script src="../js/confirms_alerts.js"></script>
</html>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario_id = $_SESSION['id'];
    $rutaArchivo = '../pdf/';
    $allowed_types = array("pdf");
    $date = date("Y-m-d H:i:s");
    
    

    //UNA VEZ CARGADOS PONERLE UPDATE

    //----------------------------------------------Horarios Cursada Analisis de Sistemas Plan Nuevo-------------------------------------------------------
    if (isset($_FILES['sist_nuevo']) && $_FILES['sist_nuevo']['error'] === 0) {
        $titulo = "horario-a-s-nuevo";
        $sql = "SELECT * FROM archivos_pdf WHERE titulo = :titulo";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(':titulo', $titulo);
        $buscar = $stmt->execute();
        $numreg = $stmt->rowCount();

        borrarenCarpetaPDF($conn, $titulo);

        $nombreArchivo = preg_replace('/\s+/', '', $_FILES['sist_nuevo']['name']);
        $target_file = $rutaArchivo . basename($nombreArchivo);
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (!in_array($file_type, $allowed_types)) {
            echo "<script>alert('Error. Solo archivos de formato .pdf son permitidos');</script>";
        } else {
            if (move_uploaded_file($_FILES["sist_nuevo"]["tmp_name"], $target_file)) {
                if($numreg==0){
                    $sql = "INSERT INTO archivos_pdf(titulo, ruta_archivo, usuario_id) VALUES (:titulo, :ruta,:id)";
                    $stmt = $conn->prepare($sql);
                }else{
                    $sql = "UPDATE archivos_pdf SET ruta_archivo = :ruta, usuario_id = :id, fecha_subida = :fecha WHERE titulo = :titulo";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':fecha', $date);
                }
                $stmt->bindParam(':id', $usuario_id, PDO::PARAM_INT);
                $stmt->bindParam(':ruta', $target_file);
                $stmt->bindParam(':titulo', $titulo);
                $resultado = $stmt->execute();
                
                if ($resultado) {
                    echo "<script>alert('El archivo " . basename($_FILES["sist_nuevo"]["name"]) . " se ha subido correctamente.');
                    window.location.href = './horarios_cursada_admin.php';
                    </script>";
                    exit;
                } else {
                    echo "<script>alert('Lo sentimos, hubo un error en la subida del archivo.');</script>";
                }
            } else {
                echo "<script>alert('Lo sentimos, hubo un error al subir el archivo.');</script>";
            }
        }

    }
   
    //----------------------------------------------Horarios Cursada Analisis de Sistemas Plan Viejo-------------------------------------------------------
    if (isset($_FILES['sist_viejo']) && $_FILES['sist_viejo']['error'] === 0) {
        $titulo = 'horario-a-s-viejo';
        $sql = "SELECT * FROM archivos_pdf WHERE titulo = :titulo";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(':titulo', $titulo);
        $buscar = $stmt->execute();
        $numreg = $stmt->rowCount();

        borrarenCarpetaPDF($conn, $titulo);
        $nombreArchivo = preg_replace('/\s+/', '', $_FILES['sist_viejo']['name']);
        $target_file = $rutaArchivo . basename($nombreArchivo);
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (!in_array($file_type, $allowed_types)) {
            echo "<script>alert('Error. Solo archivos de formato .pdf son permitidos');</script>";
        } else {
            if (move_uploaded_file($_FILES["sist_viejo"]["tmp_name"], $target_file)) {
                if($numreg==0){
                    $sql = "INSERT INTO archivos_pdf(titulo, ruta_archivo, usuario_id) VALUES (:titulo, :ruta,:id)";
                    $stmt = $conn->prepare($sql);
                }else{
                    $sql = "UPDATE archivos_pdf SET ruta_archivo = :ruta, usuario_id = :id, fecha_subida = :fecha WHERE titulo = :titulo";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':fecha', $date);
                }
                $stmt->bindParam(':id', $usuario_id, PDO::PARAM_INT);
                $stmt->bindParam(':ruta', $target_file);
                $stmt->bindParam(':titulo', $titulo);
                $resultado = $stmt->execute();
                
                if ($resultado) {
                    echo "<script>alert('El archivo " . basename($_FILES["sist_viejo"]["name"]) . " se ha subido correctamente.');
                    window.location.href = './horarios_cursada_admin.php';
                    </script>";
                    exit;
                } else {
                    echo "<script>alert('Lo sentimos, hubo un error en la subida del archivo.');</script>";
                }
            } else {
                echo "<script>alert('Lo sentimos, hubo un error al subir el archivo.');</script>";
            }
        }
    }

//----------------------------------------------Horarios Cursada Desarrollo de Software-------------------------------------------------------
    if (isset($_FILES['des_soft']) && $_FILES['des_soft']['error'] === 0) {   
        $titulo = "horario-d-s";
        $sql = "SELECT * FROM archivos_pdf WHERE titulo = :titulo";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(':titulo', $titulo);
        $buscar = $stmt->execute();
        $numreg = $stmt->rowCount();

        borrarenCarpetaPDF($conn, $titulo);
        $nombreArchivo = preg_replace('/\s+/', '', $_FILES['des_soft']['name']);
        $target_file = $rutaArchivo . basename($nombreArchivo);
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (!in_array($file_type, $allowed_types)) {
            echo "<script>alert('Error. Solo archivos de formato .pdf son permitidos');</script>";
        } else {
            if (move_uploaded_file($_FILES["des_soft"]["tmp_name"], $target_file)) {
                //$sql = "INSERT INTO archivos_pdf(titulo, ruta_archivo, usuario_id) VALUES (?, ?, ?)";
                if($numreg==0){
                    $sql = "INSERT INTO archivos_pdf(titulo, ruta_archivo, usuario_id) VALUES (:titulo, :ruta,:id)";
                    $stmt = $conn->prepare($sql);
                }else{
                    $sql = "UPDATE archivos_pdf SET ruta_archivo = :ruta, usuario_id = :id, fecha_subida = :fecha WHERE titulo = :titulo";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':fecha', $date);
                }
                //$stmt = $conn->prepare($sql);
                $stmt->bindParam(':id', $usuario_id, PDO::PARAM_INT);
                $stmt->bindParam(':ruta', $target_file);
                $stmt->bindParam(':titulo', $titulo);
                $resultado = $stmt->execute();

                if ($resultado) {
                    echo "<script>alert('El archivo " . basename($_FILES["des_soft"]["name"]) . " se ha subido correctamente.');
                    window.location.href = './horarios_cursada_admin.php';
                    </script>";
                    exit;
                } else {
                    echo "<script>alert('Lo sentimos, hubo un error en la subida del archivo.');</script>";
                }
            } else {
                echo "<script>alert('Lo sentimos, hubo un error al subir el archivo.');</script>";
            }
        }
    }
}


//BUSCAR ARCHIVO EN BD PARA VERLO
function obtenerRutaArchivo($conn, $titulo) {
    $sql = 'SELECT ruta_archivo FROM archivos_pdf WHERE titulo = :titulo LIMIT 1';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->execute();
    
    $fila = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $fila ? $fila['ruta_archivo'] : null;
}

//ELIMINAR ARCHIVO EN CARPETA PDF CUANDO SE SUBE OTRO ARCHIVO
function borrarenCarpetaPDF($conn, $titulo){
    $sql = 'SELECT ruta_archivo FROM archivos_pdf WHERE titulo = :titulo LIMIT 1';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->execute();
            
            $fila = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($fila) {
                $rutaAnterior = $fila['ruta_archivo'];
                
                // Eliminamos el archivo anterior si existe
                if (file_exists($rutaAnterior)) {
                    unlink($rutaAnterior);
                }
            }
}

?>