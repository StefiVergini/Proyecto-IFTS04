<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/e_iniciales.css">
    <link rel="stylesheet" href="../css/horarios.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/navegacion.css">
    <link rel="stylesheet" href="../css/modalStyle.css">
    <link rel="stylesheet" href="../css/administrador.css">
    <link rel="stylesheet" href="../css/elimDatos.css">
    <title>Inscripcion - Examenes Finales</title>

</head>
<body>
    <!-- <h1>Panel de Administracion</h1>
    <h3>
        En esta pagina se debe crear la Administracion del sitio.
        Esta pagina solo es accesible mediante una sesion valida de usuario.
    </h3> -->
    <?php
        session_start(); 

        include('../session/conexion.php');
        include('./navegacion_admin.php');
        include("./modal_admin.php"); 
        // include("../header_publico.php");
    ?>
    <!-- <a href="logout.php">
        Log Out
    </a> -->
    <h1>
        Inscripcion a Examenes Finales
    </h1>
    <h2>
        Formulario en caso de errores con la inscripcion desde el SIU GUARANI. Los estudiantes deberian poder descargar la ultima version del Formulario y presentarlo segun los medios indicados por bedelia.
    </h2>
    <div class="contenedor-recuadro">
        <div class="recuadro-e" style="background-color:#777B82">
            <form class='form' action='./examFinal_upload.php' method="post" enctype="multipart/form-data">
                <div class="input-y-label">
                    <label class= "label-estilo" for="examFinal_form">Subir Formulario de Inscripcion a Finales</label>
                    <br>
                    <input class="input-estilo" type="file" name='examFinal_form' accept="application/pdf" required>
                    <br>
                </div>
                <br>
                <input class="clase-links" type="submit" value="Subir Archivo">
            </form>
        </div>
        <div class="recuadro-e" style="background-color:#777B82">
            <div class="div-titulos">
                <h2  style="color:#f1f1f1">Formulario de Inscripcion a Finales</h2>
            </div>
            <ul>
                <?php $sql = mysqli_query($conn, 'SELECT * FROM archivos_pdf WHERE titulo = "FORMULARIO DE INSCRIPCION FINALES"');
                 if($sql -> num_rows > 0){
                    while($row = mysqli_fetch_assoc($sql)){ 
                        $ruta = '../pfd/' . $row['ruta_archivo'];
                        ?>
                        <div class="">
                        <button class="clase-links"><a class="a-link" href=<?php echo $ruta ?> target='_blank'>Ver Formulario de Inscripcion a Examenes</a></button>
                            <br>
                            <br>
                            <button class="clase-links"><a class="a-link" href="./examFinal_delete.php?id=<?php echo $row['id'] ?>" onclick="return confirmDelete('Estas a punto de eliminar el archivo <?php echo $row['ruta_archivo']; ?>')">Eliminar</a></button>
                            <br>
                        </div>
        </div>
    </div>            
            <?php } 
        }else{ ?>
            <div>
                <p class="p-notfound">No se han subido archivos de momento</p>
            </div>
        <?php } ?>
        
    </ul>
   <script src='../js/confirms_alerts.js'></script>
</body>
</html>
