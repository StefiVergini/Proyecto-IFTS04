<?php

// Conectar a la base de datos
include('./session/conexion.php');

if (isset($_GET['titulo'])) {
    $titulo = $_GET['titulo'];
    $stmt = $conn->prepare("SELECT ruta_archivo FROM archivos_pdf WHERE titulo = ?");
    $stmt->bind_param("s", $titulo);
    $stmt->execute();
    $stmt->bind_result($ruta_archivo);
    $stmt->fetch();
    $stmt->close();

    if ($ruta_archivo) {
        // Ajusta la ruta para asegurar que siempre esté en la carpeta ./pdf/
        $ruta_completa = './' . ltrim($ruta_archivo, './');
        if (file_exists($ruta_completa)) {
            header("Content-Type: application/pdf");
            header("Content-Disposition: inline; filename=\"" . basename($ruta_completa) . "\"");
            header("Content-Length: " . filesize($ruta_completa));
            readfile($ruta_completa);
            exit;
        } else {
            echo "La ruta encontrada es: $ruta_completa, pero el archivo no existe en esa ubicación.";
        }
    } else {
        echo "Archivo no encontrado en la base de datos.";
    }
} else {
    echo "Nombre no especificado.";
}

$conn->close();

?>
