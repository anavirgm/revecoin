<?php
session_start();
include 'db_connection.php'; // archivo con la conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el email y la contraseña del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Preparar la consulta SQL para obtener el usuario con el email proporcionado
    $query = "SELECT id, nombres, contraseña, status FROM usuarios WHERE email = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        
        // Verificar si se encontró un usuario con el email proporcionado
        if ($stmt->num_rows == 1) {
            $stmt->bind_result($id, $nombres, $hashed_password, $status);
            $stmt->fetch();
            
            // Verificar el estado del usuario
            if ($status == 1) {
                // Verificar la contraseña
                if (password_verify($password, $hashed_password)) {
                    // La contraseña es correcta, iniciar sesión
                    $_SESSION['loggedin'] = true;
                    $_SESSION['id'] = $id;
                    $_SESSION['nombres'] = $nombres;
                    header("Location: dashboard.php"); // Redirige a una página de inicio de sesión exitosa
                    exit();
                } else {
                    // Contraseña incorrecta
                    $error_message = "La contraseña que has introducido no es correcta.";
                }
            } else {
                // Usuario inactivo
                $error_message = "Tu cuenta está inactiva. Contacta con el administrador.";
            }
        } else {
            // Email no encontrado
            $error_message = "No hay ninguna cuenta asociada con ese email.";
        }
        
        $stmt->close();
    } else {
        // Error en la preparación de la consulta
        $error_message = "Error al preparar la consulta.";
    }
    
    $conn->close();
} else {
    // Redirigir si el acceso no es por POST
    header("Location: index.php");
    exit();
}

// Mostrar mensaje de error (si hay uno)
if (isset($error_message)) {
    echo "<p>$error_message</p>";
}
?>
