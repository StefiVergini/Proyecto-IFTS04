<?php
include('validate_rol.php');
require_once('../conexion/conexion.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener la ruta del archivo
    $sql = "SELECT ruta_archivo FROM archivos_pdf WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($ruta_archivo);
    $stmt->fetch();
    $stmt->close();

    // Eliminar el archivo del servidor
    if (file_exists($ruta_archivo)) {
        unlink($ruta_archivo);
    }

    // Eliminar el registro de la base de datos
    $sql = "DELETE FROM archivos_pdf WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo "Archivo eliminado correctamente.";
    } else {
        echo "Error al eliminar el archivo.";
    }
}
?>