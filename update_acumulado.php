<?php
session_start();
include './database/db_connection.php'; // archivo con la conexión a la base de datos

// Verificar si el usuario está logueado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    http_response_code(403); // Prohibido
    exit();
}

if (isset($_POST['recompensa'])) {
    $recompensa = floatval($_POST['recompensa']); // Asegúrate de que sea decimal
    $id = $_SESSION['id'];

    // Obtener el valor acumulado actual
    $sql = "SELECT dinero_acumulado FROM monedero WHERE usuario_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $dinero_acumulado = $row['dinero_acumulado'];
        $dinero_acumulado += $recompensa;

        // Actualizar el valor en la base de datos
        $sql = "UPDATE monedero SET dinero_acumulado = ? WHERE usuario_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("di", $dinero_acumulado, $id);
        $stmt->execute();
    } else {
        // Si no hay registro en la tabla, insertarlo
        $sql = "INSERT INTO monedero (usuario_id, dinero_acumulado) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("id", $id, $recompensa);
        $stmt->execute();
        $dinero_acumulado = $recompensa;
    }

    echo number_format($dinero_acumulado, 2); // Asegúrate de devolver el valor como decimal con dos decimales
}
?>
