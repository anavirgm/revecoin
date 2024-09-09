<?php
session_start();
include './database/db_connection.php'; // archivo con la conexión a la base de datos

// Obtener el nombre del plan seleccionado
$planId = $_SESSION['planId'];
$result = $conn->query("SELECT nombre FROM planes WHERE id = $planId");
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $planName = $row['nombre'];
} else {
    $planName = 'Plan desconocido';
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

        /* header dentro de la clase servicio */
        .servicio-header {
            background-color: #9568FF; 
            color: white; 
            text-align: center;
            padding: 15px;
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
            font-size: 18px;
            margin-bottom: 15px; 
        }

        #servicios h3 {
            font-size: 20px;
            color: #374557;
        }

        .servicio {
            background: #fff;
            padding: 0rem;
            border-radius: 16px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            flex: 1;
            max-width: 400px;
            margin-top: 30px;
            margin-bottom: 20px;
            transition: none;
            position: relative;
        }

        .servicio:hover {
            transform: none;
            box-shadow: none;
        }

        .button-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .registro-button {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            width: 300px;
            height: 50px;
            padding: 10px 20px;
            margin: 10px 0;
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            transition: transform 0.3s, box-shadow 0.3s;
            position: relative;
        }

        .registro-button:hover {
            transform: scale(1.05);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
        }

        .registro-button img {
            width: 30px;
            height: 24px;
            margin-right: 10px;
        }

        .registro-button span {
            flex-grow: 1;
            text-align: center;
        }

        .crédito {
            background-color: #E85C5C; /* Rojo */
        }

        .débito {
            background-color: #8CB95F; /* Verde */
        }

        .paypal {
            background-color: #555BEB; /* Azul oscuro */
        }

        .binancepay {
            background-color: #BCB575; /* Beige */
            color: white;
            margin-bottom:40px;
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
    
    <section id="servicios">
        <div class="servicios-container">
            <div class="servicio">
                <!-- Agregamos un header similar al de la imagen -->
                <div class="servicio-header">
                    Usted Ha Elegido el Plan <?php echo $planName; ?>
                </div>
                <h3>Por favor, Ingrese su <br> método de pago.</h3>
                
                <p>
                    <hr class="custom-line">
                </p>


                <div class="button-container">
                    <?php foreach ($metodos as $nombre => $id): ?>
                    <button class="registro-button <?php echo strtolower($nombre); ?>" onclick="location.href='registro3.php?metodo=<?php echo $id; ?>'">
                        <img src="images/<?php echo strtolower($nombre); ?>.png" alt="<?php echo $nombre; ?>">
                        <span><?php echo $nombre; ?></span>
                    </button>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    </main>
    
    <?php include 'footer.php'; ?>
</body>
</html>
