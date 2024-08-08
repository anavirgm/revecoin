<?php
session_start();
include 'db_connection.php'; // archivo con la conexión a la base de datos

// Verificar si el usuario está logueado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php"); // Redirigir al inicio de sesión si no está autenticado
    exit();
}

// Obtener la información del usuario desde la sesión
$id = $_SESSION['id'];
$nombres = $_SESSION['nombres'];

// Obtener el plan del usuario
$sql = "SELECT plan FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $planId = $user['plan'];

    // Obtener la recompensa del plan
    $sql = "SELECT tareas FROM planes WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $planId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $plan = $result->fetch_assoc();
        $recompensa = $plan['tareas'];
    } else {
        $recompensa = "No disponible";
    }
} else {
    $recompensa = "No disponible";
}

// Obtener el valor acumulado actual
$sql = "SELECT dinero_acumulado FROM monedero WHERE usuario_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $dinero_acumulado = $row['dinero_acumulado'];
} else {
    $dinero_acumulado = 0;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReveCoin - ¡Invierte en el FUTURO!</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link href="css/revecoin.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <link rel="icon" href="images/cropped-v5_15.ico" type="image/x-icon">
    <style>
        /* Estilos para el formulario */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 50px;
            background: white;
        }

        header nav ul li a {
            color: #374557;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
        }

        .pricing-card {
            padding: 2rem; /* Añadido padding interno */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra sutil */
            border-radius: 10px; /* Bordes redondeados */
            background-color: #fff; /* Fondo blanco */
        }

        .pricing-card p {
            font-size: 18px;
            color: #374557;
            font-weight: bold;
            text-align: center; /* Centrar el texto del párrafo */
        }

        .pricing-card .initial-investment1 {
            color: #A19CB1;
            font-weight: bold;
        }

        .pricing-card .header .bronze {
            color: #693DCF;
        }

        .pricing-card .header {
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            gap: 10px;
            align-items: center;
            margin-top: 10px;
        }

        /* Estilos del formulario */
        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
            align-items: center; /* Centrar los elementos dentro de form-group */
        }

        .form-group label {
            font-size: 16px;
            color: #565E65;
            margin-bottom: 10px;
            text-align: center; /* Centrar el texto del label */
        }

        .form-group input {
            font-family: 'Poppins', sans-serif;
            background: #E0E0E0;
            color: #565E65;
            padding: 10px;
            border-radius: 10px;
            border: none;
            width: 70%; /* Ocupa todo el ancho disponible */
            box-sizing: border-box;
            text-align: center;
        }

        .submit-btn {
            background-color: #693DCF;
            color: white;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 6px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 15px; /* Espacio entre el botón y el formulario */
            width: 50%; /* Ajustar al ancho del contenedor */
        }

        .submit-btn:hover {
            background-color: #572b9b;
        }

    </style>
</head>
<body>
<?php include 'header.php'; ?>

<main>
    <section id="pricing-plans">
        <h2 id="planes"> </h2>

        <div class="pricing-cards">

            <div class="pricing-card" data-id="1">
                <div class="header">
                    <h3 class="bronze">Monedero <br> $<?php echo number_format($dinero_acumulado, 2); ?></h3>
                </div>

                <p>Realizar Retiro</p>

                <form method="post">
                    <div class="form-group">
                        <label for="amount">Monto</label>
                        <input type="number" id="amount" name="amount" value="<?php echo htmlspecialchars(number_format($dinero_acumulado, 2)); ?>">
                    </div>
                    <div class="form-group">
                        <label for="commission">Comisión</label>
                        <input type="text" id="commission" name="commission" value="0,33" readonly>
                    </div>

                    <button type="submit" class="submit-btn">Aceptar</button>
                </form>
            
            </div>
        </div>
    </section>
</main>
<?php include 'footer.php'; ?>
</body>
</html>
