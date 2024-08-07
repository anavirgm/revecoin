<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php"); // Redirigir al inicio de sesión si no está autenticado
    exit();
}

// Obtener la información del usuario desde la sesión
$id = $_SESSION['id'];
$nombres = $_SESSION['nombres'];
$plan_id = isset($_SESSION['plan']) ? $_SESSION['plan'] : null; // Valor por defecto en caso de que no exista

// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = ""; // Cambia esto por tu contraseña de base de datos
$dbname = "revecoin"; // Cambia esto por el nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Preparar la consulta SQL
$sql = "SELECT p.ganancias 
        FROM usuarios u 
        JOIN planes p ON u.plan = p.id 
        WHERE u.id = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error en la preparación de la consulta: " . $conn->error);
}

$stmt->bind_param("i", $id); // `i` para integer
$stmt->execute();
$stmt->bind_result($ganancias);
$stmt->fetch();
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

        .logout-button {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #9568FF;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }

        .logout-button:hover {
            background-color: #7a4cd8;
        }

        .pricing-card .header {
            margin-bottom: -10px;
            display: flex;
            justify-content: center;
            gap: 10px;
            align-items: center;
            margin-top: 20px;
            background: #9367FD;
        }

        .pricing-card {
            width: 40%;
            background-color: #FFFFFF;
            border-radius: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            position: relative;
            margin-bottom: 20px;
            text-align: center;
        }

        .pricing-card:hover {
            transform: none;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .pricing-card p {
            font-size: 18px;
            color: #374557;
            font-weight: bold;
        }

        .pricing-card .header h3 {
            font-size: 24px;
            margin: 0;
            font-weight: bold;
        }

        .pricing-card .header .silver {
            color: #FFFFFF;
        }

        .pricing-card .header .bronze {
            color: #FFFFFF;
        }

        .pricing-card .button-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 400px;
            gap: 40px;
            padding: 20px; /* Espacio interno para que los botones no lleguen al borde */
        }

        /* Estilo para los enlaces que contienen los botones */
        .pricing-card .button-container a {
            display: block;
            width: 100%; /* Asegura que los botones ocupen todo el ancho del contenedor */
            max-width: 300px; /* Limita el ancho máximo de los botones */
        }

        .pricing-card .cta {
            width: 100%;
            max-width: 300px; 
            padding: 10px;
            background-color: #9568FF;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            font-family: 'Poppins';
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .pricing-card .cta:hover {
            transform: scale(1.05);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
        }

        .pricing-card .features {
            list-style: none;
            padding: 20px;
            margin: 20px 0 10px;
            font-size: 14px;
            text-align: left;
            margin-left: 30px;
        }

   
    </style>
</head>

<body>
<?php include 'header.php'; ?>

    <main>
        <section id="pricing-plans">

            <h1>Bienvenido, <?php echo htmlspecialchars($nombres); ?>!</h1>

            <div class="pricing-cards">

                <div class="pricing-card">
                    <div class="header">
                        <h3 class="bronze">Realizar tarea diaria</h3>
                    </div>
                    <p>Tareas de 10min</p>
                    <p class="initial-investment">Recompensas:</p>
                    <div class="price">
                        <h4>$<?php echo htmlspecialchars($ganancias); ?></h4>
                    </div>

                    <a href="tareas.php">
                        <button class="cta">Realizar tarea</button>
                    </a>

                    <ul class="features">
                        <p class="initial-investment">Objetivos:</p>
                        <li><img src="images/check.png" alt="Feature Icon"> Completar todas las tareas.</li>
                        <li><img src="images/check.png" alt="Feature Icon"> Ingresar y realizar tareas diariamente.</li>
                        <li><img src="images/check.png" alt="Feature Icon"> Realizar retiros.</li>
                    </ul>
                </div>


                <div class="pricing-card">
                    <div class="header">
                        <h3 class="silver">Más Opciones</h3>
                    </div>
                    <div class="button-container">
                        <a href="dashboard.php">
                            <button class="cta">Realizar Retiro</button>
                        </a>
                        <a href="index.php#planes">
                            <button class="cta">Invertir en otro Plan</button>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
