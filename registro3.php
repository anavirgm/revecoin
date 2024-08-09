<?php
session_start(); // Iniciar sesión al inicio del archivo
include 'db_connection.php'; // archivo con la conexión a la base de datos

// Verificar que el usuario haya llegado a esta página después de llenar los datos
if (!isset($_SESSION['nombre']) || !isset($_SESSION['email']) || !isset($_SESSION['telefono']) || !isset($_SESSION['contraseña']) || !isset($_SESSION['planId']) || !isset($_GET['metodo'])) {
    header('Location: registro1.php');
    exit();
}

// Obtener los datos de la sesión
$nombre = $_SESSION['nombre'];
$email = $_SESSION['email'];
$telefono = $_SESSION['telefono'];
$contraseña = $_SESSION['contraseña'];
$planId = $_SESSION['planId'];
$metodoId = intval($_GET['metodo']); // ID del método de pago

// Consultar la inversión del plan seleccionado
$inversion = '';
$stmt = $conn->prepare("SELECT inversion FROM planes WHERE id = ?");
if ($stmt) {
    $stmt->bind_param("i", $planId);
    $stmt->execute();
    $stmt->bind_result($inversion);
    $stmt->fetch();
    $stmt->close();
}

// Procesar el formulario si se envió
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numeroTarjeta = $_POST['numero_tarjeta'];
    $fechaVencimiento = $_POST['fecha_vencimiento'];
    $codigoCvv = $_POST['codigo_cvv'];

    // Insertar datos en la tabla `usuarios`
    $stmt = $conn->prepare("INSERT INTO usuarios (nombres, email, telefono, contraseña, plan, metodo_pago) VALUES (?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    $hashed_password = password_hash($contraseña, PASSWORD_DEFAULT);
    if ($stmt->bind_param("ssssii", $nombre, $email, $telefono, $hashed_password, $planId, $metodoId) && $stmt->execute()) {
        $userId = $stmt->insert_id; // Obtener el ID del usuario recién insertado
        echo "<h2>Registro de usuario completado exitosamente</h2>";
    } else {
        echo "<h2>Error al registrar el usuario</h2>";
        echo "<p>Error: " . $stmt->error . "</p>";
    }
    $stmt->close();

    // Insertar datos en la tabla `credito_debito`
    $stmt = $conn->prepare("INSERT INTO credito_debito (id_metodo, id_usuario, numero_tarjeta, fecha_vencimiento, codigo_cvv) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    if ($stmt->bind_param("isssi", $metodoId, $userId, $numeroTarjeta, $fechaVencimiento, $codigoCvv) && $stmt->execute()) {
        echo "<h2>Registro completado exitosamente</h2>";
    } else {
        echo "<h2>Error al registrar los datos de la tarjeta</h2>";
        echo "<p>Error: " . $stmt->error . "</p>";
    }
    $stmt->close();
}

// Recuperar los IDs de los métodos de pago desde la base de datos
$metodos = [];
$result = $conn->query("SELECT id, nombre FROM metodos_pago");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $metodos[$row['nombre']] = $row['id'];
    }
}

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

        #servicios h3 {
            font-size: 20px;
            color: #374557;
        }

        .servicio {
            background: #fff;
            padding: 1.5rem;
            border-radius: 16px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            flex: 1;
            max-width: 450px;
            margin-top: 30px;
            margin-bottom: 20px;
            transition: none;
        }

        .servicio:hover {
            transform: none;
            box-shadow: none;
        }

        .form-container {
            margin-top: 20px;
            gap: 10px 40px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }

        .form-group label {
            margin-bottom: 5px;
            font-size: 16px;
            text-align: left;
            color: #565E65;
        }

        .form-group input {
            background: #E0E0E0;
            color: #565E65;
            font-family: 'Poppins';
            padding: 10px;
            border-radius: 10px;
            border: none;
            width: 100%;
            box-sizing: border-box;
        }

        .form-group input[readonly] {
            background: #D0D0D0;
            cursor: not-allowed;
        }

        .form-container button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #9568FF;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            font-family: 'Poppins';
            transition: transform 0.3s, box-shadow 0.3s;
            width: 300px;
        }

        .form-container button:hover {
            transform: scale(1.05);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
<?php include 'header.php'; ?>

<main>

<button class="back-button" onclick="history.back()">
        <img src="images/izq.png" alt="Volver">
    </button>
    

    <section id="servicios">
        <div class="servicios-container">
            <div class="servicio">
                <h3>Por favor, Ingrese los <br> datos de su Tarjeta.</h3>
                <p>----------------------------------</p>
                <form method="POST" action="">
                    <div class="form-container">
                        <div class="form-group">
                            <label for="card-number">Número de la Tarjeta</label>
                            <input type="text" id="card-number" name="numero_tarjeta" required>
                        </div>

                        <div class="form-group">
                            <label for="amount">Monto</label>
                            <input type="text" id="amount" name="amount" value="<?php echo htmlspecialchars($inversion); ?>" readonly>
                        </div>
                        
                        <div class="form-group">
                            <label for="fecha-vencimiento">Fecha de Vencimiento</label>
                            <input type="text" id="fecha-vencimiento" name="fecha_vencimiento" placeholder="MM/AA" required>
                        </div>
                        <div class="form-group">
                            <label for="cvv">Código CVV</label>
                            <input type="text" id="cvv" name="codigo_cvv" required>
                        </div>
                        <button type="submit">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
        
    </section>
</main>
<?php include 'footer.php'; ?>
</body>
</html>
