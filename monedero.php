<?php
session_start();
include './database/db_connection.php'; // archivo con la conexión a la base de datos

// Verificar si el usuario está logueado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php"); // Redirigir al inicio de sesión si no está autenticado
    exit();
}

// Obtener la información del usuario desde la sesión
$id = $_SESSION['id'];
$nombres = $_SESSION['nombres'];

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

// Manejar la solicitud de retiro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $monto = isset($_POST['amount']) ? floatval($_POST['amount']) : 0;
    $comision = isset($_POST['commission']) ? floatval($_POST['commission']) : 0.33; // Obtener la comisión del formulario

    if ($monto > 0 && $monto <= $dinero_acumulado) {
        $nuevo_dinero_acumulado = $dinero_acumulado - $monto - $comision;

        // Iniciar una transacción
        $conn->begin_transaction();

        try {
            // Insertar el retiro en la base de datos
            $sql = "INSERT INTO retiros (monto, comision, usuario_id) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ddi", $monto, $comision, $id);
            $stmt->execute();

            // Actualizar el dinero acumulado
            $sql = "UPDATE monedero SET dinero_acumulado = ? WHERE usuario_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("di", $nuevo_dinero_acumulado, $id);
            $stmt->execute();

            // Confirmar la transacción
            $conn->commit();

            // Redirigir con un parámetro de éxito
            header("Location: " . $_SERVER['PHP_SELF'] . "?success=1");
            exit();
        } catch (Exception $e) {
            // Revertir la transacción si hay un error
            $conn->rollback();
            // Redirigir con un parámetro de error
            header("Location: " . $_SERVER['PHP_SELF'] . "?error=" . urlencode($e->getMessage()));
            exit();
        }
    } else {
        // Redirigir con un parámetro de error si el monto es inválido
        header("Location: " . $_SERVER['PHP_SELF'] . "?error=Monto inválido o insuficiente.");
        exit();
        
        
    }
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
            padding: 2rem;
            border-radius: 16px; 
            background-color: #fff;
        }

        .pricing-card:hover {
    transform: none;
    
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

        .pricing-card p {
            font-size: 18px;
            color: #374557;
            font-weight: bold;
            text-align: center;
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

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
            align-items: center;
        }

        .form-group label {
            font-size: 16px;
            color: #565E65;
            margin-bottom: 10px;
            text-align: center; 
        }

        .form-group input {
            font-family: 'Poppins', sans-serif;
            background: #E0E0E0;
            color: #565E65;
            padding: 10px;
            border-radius: 10px;
            border: none;
            width: 70%;
            box-sizing: border-box;
            text-align: center;
        }

        #pricing-plans button {
            font-family: 'Poppins';
            background: #9568FF;
            border: none;
            padding: 8px 20px;
            font-size: 16px;
            color: #fff;
            border-radius: 10px;
            transition: transform 0.3s, box-shadow 0.3s;
            margin-top: 15px;
            margin-bottom: 15px;
            width: 50%;
        }
        
        #pricing-plans button:hover {
            transform: scale(1.05);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
        }

        .pricing-card .header h3 {
            font-size: 30px;
            margin-top: -10px;
            font-weight: bold;
        }

        .custom-line {
            border: 0;
            height: 2px;
            background-color: #7179A8; 
            margin: 20px auto;
            width: 85%; 
        }


        
    </style>
</head>
<body>
<?php include 'header.php'; ?>

<main>

<button class="back-button" onclick="history.back()">
        <img src="images/izq.png" alt="Volver">
    </button>

    <section id="pricing-plans">
        <h2 id="planes"> </h2>

        <div class="pricing-cards">

            <div class="pricing-card" data-id="1">
                <div class="header">
                    <h3 class="bronze">Monedero <br> $<?php echo number_format($dinero_acumulado, 2); ?></h3>
                </div>
                <p>
                    <hr class="custom-line">
                </p>
                <p>Realizar Retiro</p>

               
                <form method="post">
                    <div class="form-group">
                        <label for="amount">Monto</label>
                        <input type="number" id="amount" name="amount" min="0" max="<?php echo number_format($dinero_acumulado, 2); ?>" value="<?php echo htmlspecialchars(number_format($dinero_acumulado, 2)); ?>">
                    </div>
                    <div class="form-group">
                        <label for="commission">Comisión</label>
                        <input type="text" id="commission" name="commission" value="0.33" readonly>
                    </div>

                    <button type="submit" class="submit-btn">Aceptar</button>
                
                
                    <?php if (isset($_GET['success']) && $_GET['success'] == '1'): ?>
                        <p style="color: green;">Retiro realizado con éxito.</p>
                    <?php endif; ?>

                    <?php if (isset($_GET['error'])): ?>
                        <p style="color: red;">Error: <?php echo htmlspecialchars($_GET['error']); ?></p>
                    <?php endif; ?>

                
                
                </form>
            </div>
        </div>
    </section>
</main>
<?php include 'footer.php'; ?>
</body>
</html>