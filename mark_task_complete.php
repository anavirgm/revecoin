<?php
session_start();
include './database/db_connection.php'; // Archivo con la conexión a la base de datos

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    http_response_code(403);
    echo 'No autorizado';
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task_id = intval($_POST['task_id']);
    $usuario_id = $_SESSION['id'];
    $fecha_completado = date('Y-m-d');

    $sql = "INSERT INTO tareas_completadas (usuario_id, task_id, fecha_completado)
            VALUES (?, ?, ?)
            ON DUPLICATE KEY UPDATE fecha_completado = VALUES(fecha_completado)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $usuario_id, $task_id, $fecha_completado);

    if ($stmt->execute()) {
        echo 'Tarea marcada como completada';
    } else {
        http_response_code(500);
        echo 'Error al marcar la tarea';
    }

    $stmt->close();
    $conn->close();
} else {
    http_response_code(405);
    echo 'Método no permitido';
}
