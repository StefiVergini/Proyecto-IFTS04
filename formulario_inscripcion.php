<?php
include('./session/conexion.php');

$documentos = [];
$mensaje = '';

// Consulta para obtener todos los documentos
$sql = "SELECT ruta_archivo, titulo FROM archivos_pdf WHERE titulo= 'FORMULARIO DE INSCRIPCION FINALES'";
$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $documentos[] = $row;
        }
    } else {
        $mensaje = "No se han subido archivos de momento.";
    }
} else {
    $mensaje = "Ups! Algo salió mal, inténtalo más tarde.";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favi.ico" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="MDC">
    <meta name="Description" content="Instituto de Formación Técnico Superior">
    <meta name="Keywords" content="IFTS">
    <meta name="Resource-type" content="Document">
    <meta name="DateCreated" content="21/6/2023">
    <meta name="Revisit-after" content="1 month">
    <meta name="Robots" content="All">
    <meta name="Language" scheme="RFC1766" content="spanish">
    <title>Home</title>
    <link rel="stylesheet" href="css/e_iniciales.css">
    <link rel="stylesheet" href="css/horarios.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/navegacion.css">
    <link rel="stylesheet" href="css/modalStyle.css">
    <link rel="stylesheet" href="css/bot.css">
    <style>
    </style>
</head>

<body translate="no"><!-- SE AGREGA 'translate="no" ' para que no se traduzca cualquier palabra en ingles aún si quiero utilizar el botón derecho del mouse   -->
    <a name="inicio" href="index.html"></a>
    <!-- este div lo genera grupo alejandro -->
    <div class="container">
        <!-- inicio barra de navegación -->
        <?php
        include("navegacion.php");
        // <!-- fin barra de navagación -->
        // Inicio vantana Modal
        include("modal.php");
        //fin ventana modal            
        // <!-- inicio cabecera menu principal -->
        include("header_publico.php");
        ?>
        <!-- fin cabecera menu principal -->
        <!-- inicio cuerpo del menu principal -->
        <!-- este id lo genera el grupo alejandro -->
        <main id='main'>
            <section class="section-adm galeria">
                <a name="administracion" href="index.php"></a>
                <h1>Formulario de inscripción a exámenes</h1>
                <h3>Error en el SIU</h3>
                <article class="contenedor-recuadro">
                    <?php if (!empty($documentos)): ?>
                        <?php foreach ($documentos as $documento): ?>
                            <div class="recuadro" style="background-color: #0ac92d">
                                <a class="a-link-public" href="./pdf/<?php echo htmlspecialchars($documento['ruta_archivo']); ?>" target="_blank">
                                    <h3 style="color:#f1f1f1">Abrir Formulario</h3>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="p-notfound"><?php echo $mensaje; ?></p>
                    <?php endif; ?>
                </article>
                <!-- <script src="js/script_v.js"></script> -->
                <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
                <!-- inicio script bot -->
                <script src="js/bot.js"></script>
                <!-- fin script bot -->
                <script src="js/script.js"></script>
                <?php
                //<!-- incio flechas -->
                include("flechas.php");
                // <!-- fin flechas -->
                // <!-- inicio sector contacto -->  
                // include("navegacion_footer.php");
                include("footer_publico.php");
                ?>
</body>
</html>