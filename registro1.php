

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReveCoin - Registro Completo</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link href="css/revecoin.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <link rel="icon" href="http://grupo8.miuni.kids/wp/wp-content/uploads/2024/07/cropped-v5_15.png" type="image/x-icon">
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

        #servicios h2 {
            font-size: 26px;
            color: #362465;
            margin-bottom: 10px;
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
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <section id="servicios">
            <?php
            // Obtener los parámetros 'plan' y 'id' de la URL
            $plan = isset($_GET['plan']) ? $_GET['plan'] : '';
            $planId = 0;
            $planName = '';

            // Determinar el ID del plan basado en el parámetro
            switch ($plan) {
                case 'bronce':
                    $planId = 1; // ID correspondiente para 'Bronce'
                    $planName = 'Bronce';
                    break;
                case 'plata':
                    $planId = 2; // ID correspondiente para 'Plata'
                    $planName = 'Plata';
                    break;
                case 'oro':
                    $planId = 3; // ID correspondiente para 'Oro'
                    $planName = 'Oro';
                    break;
                default:
                    echo '<h2>Plan no válido</h2>';
                    echo '<p>Por favor, elige un plan válido.</p>';
                    exit;
            }

            // Si el formulario ha sido enviado
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Obtener los datos del formulario
                $nombre = $_POST['full-name'];
                $email = $_POST['email'];
                $telefono = $_POST['phone'];
                $contraseña = $_POST['password'];
                
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

                // Preparar y ejecutar la consulta SQL
                $stmt = $conn->prepare("INSERT INTO usuarios (nombres, email, telefono, contraseña, plan) VALUES (?, ?, ?, ?, ?)");
                if (!$stmt) {
                    die("Error en la preparación de la consulta: " . $conn->error);
                }

                $hashed_password = password_hash($contraseña, PASSWORD_DEFAULT);
                $stmt->bind_param("ssssi", $nombre, $email, $telefono, $hashed_password, $planId);

                if ($stmt->execute()) {
                    echo "<h2>Registro completado exitosamente</h2>";
                } else {
                    echo "<h2>Error al registrar el usuario</h2>";
                    echo "<p>Error: " . $stmt->error . "</p>";
                }

                $stmt->close();
                $conn->close();
            }
            ?>

            <h2>Usted ha elegido el plan <?php echo $planName; ?></h2>

            <div class="servicios-container">
                <div class="servicio">
                    <h3>Por favor, Ingrese sus <br> datos personales.</h3>
                    <p>-----------------------------------------------</p>

                    <form method="post" class="form-container">
                        <div class="form-group">
                            <label for="full-name">Nombre y Apellido</label>
                            <input type="text" id="full-name" name="full-name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Teléfono</label>
                            <input type="tel" id="phone" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" id="password" name="password" required>
                        </div>

                        <button type="submit">Continuar</button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
