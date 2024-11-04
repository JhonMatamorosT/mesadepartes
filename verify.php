<?php
include ('app/config.php'); // Conexión a la base de datos
session_start(); // Iniciar la sesión para almacenar mensajes

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    try {
        // Buscar el token en la base de datos
        $sql = "SELECT * FROM usuarios_pendientes WHERE token = :token";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['token' => $token]);
        $usuario_pendiente = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario_pendiente) {
            // Intentar insertar el usuario en la tabla 'usuarios_finales'
            $sql_insert = "INSERT INTO usuarios_finales (email, password, estado) VALUES (:email, :password, :estado)";
            $stmt_insert = $pdo->prepare($sql_insert);
            $stmt_insert->execute([
                'email' => $usuario_pendiente['email'],
                'password' => $usuario_pendiente['password'],
                'estado' => 1
            ]);

            // Eliminar el registro de la tabla 'usuarios_pendientes'
            $sql_delete = "DELETE FROM usuarios_pendientes WHERE token = :token";
            $stmt_delete = $pdo->prepare($sql_delete);
            $stmt_delete->execute(['token' => $token]);

            // Redirigir a la página de usuario con mensaje de éxito
            $_SESSION['mensaje'] = "Se registró exitosamente";
            $_SESSION['icono'] = "success";
            header('Location: index_usuario.php');
            exit();
        } else {
            // Si el token no es válido
            $_SESSION['mensaje'] = "Token inválido o expirado.";
            $_SESSION['icono'] = "error";
            header('Location: index_usuario.php');
            exit();
        }
    } catch (PDOException $e) {
        // Verificar si el error se debe a una violación de clave única (correo duplicado)
        if ($e->getCode() == 23000) {
            // Mostrar un mensaje amigable de que el correo ya existe
            $_SESSION['mensaje'] = "El correo ya está registrado. Por favor, intente con otro.";
            $_SESSION['icono'] = "error";
            header('Location: index_usuario.php');
            exit();
        } else {
            // Si ocurre otro tipo de error, mostrar un mensaje genérico
            $_SESSION['mensaje'] = "Ocurrió un error al procesar la solicitud. Inténtelo de nuevo.";
            $_SESSION['icono'] = "error";
            header('Location: index_usuario.php');
            exit();
        }
    }
} else {
    $_SESSION['mensaje'] = "Token no proporcionado.";
    $_SESSION['icono'] = "error";
    header('Location: index_usuario.php');
    exit();
}
?>
