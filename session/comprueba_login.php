<?php
try {
    $user = htmlentities(addslashes($_POST["usu"]));
    $contrasenia = htmlentities(addslashes($_POST["contra"]));

    $contador = 0;

    // Conexión a la base de datos
    $base = new PDO("mysql:host=localhost; dbname=ifts04", "root", "");
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta para verificar el usuario
    $sql = "SELECT * FROM usuarios WHERE email = :usu";
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":usu" => $user));

    // Comprobar si la contraseña es válida
    while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
        if (password_verify($contrasenia, $registro['password'])) {
            // Si la contraseña es válida, incrementar el contador
            $contador++;
            
            // Iniciar la sesión
            session_start();

            // Guardar datos en la sesión
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $registro['id']; // Asegúrate de que 'id' sea la columna correcta
            $_SESSION['email'] = $registro['email']; // Guardar el email del usuario
            //$_SESSION['usuario'] = $registro['nombre']; // Si tienes un campo 'nombre' o similar
            $_SESSION['login_time_stamp'] = time(); // Guardar el tiempo de inicio de sesión
        }
    }

    // Verificar si el usuario fue autenticado
    if ($contador > 0) {
        // Redirigir al usuario a la página de administración
        header('Location: ../admin/index.php');
        exit;
    } else {
        echo "Registrate";
    }

    // Cerrar el cursor
    $resultado->closeCursor();
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>
