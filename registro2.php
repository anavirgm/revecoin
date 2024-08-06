<?php
session_start(); // Iniciar sesión al inicio del archivo

// Verificar que el usuario haya llegado a esta página después de llenar los datos
if (!isset($_SESSION['nombre']) || !isset($_SESSION['email']) || !isset($_SESSION['telefono']) || !isset($_SESSION['contraseña']) || !isset($_SESSION['planId'])) {
    header('Location: registro1.php');
    exit();
}

// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "revecoin";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
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
            max-width: 300px;
            margin-top: 30px;
            margin-bottom: 20px;
            transition: none;
        }


        .servicio:hover {
            transform: none;
            box-shadow: none;
        }

        .button-container {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
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
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <section id="servicios">
            <div class="servicios-container">
                <div class="servicio">
                    <h3>Por favor, Ingrese su <br> método de pago.</h3>
                    <p>----------------------------------</p>
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
