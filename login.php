<?php
session_start();
include 'db_connection.php'; // archivo con la conexión a la base de datos

$error_message = '';

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
                    header("Location: dashboard.php");
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
}
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
</head>

<body>
<?php include 'header.php'; ?>

    <main>
        <section id="login-section">
            <div class="login-container">
                <h3>Inicio de Sesión</h3>
                <p>
                    <hr class="custom-line">
                </p>

                <?php
                // Mostrar mensaje de error (si hay uno)
                if (!empty($error_message)) {
                    echo "<p style='color:red; text-align:center;'>$error_message</p>";
                }
                ?>

                <form action="login.php" method="post">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" id="password" name="password" required>
                    </div>

                    <button type="submit">Iniciar Sesión</button>
                </form>

                <p>¿Olvidó su contraseña? </p>
            </div>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>

<style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

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

        #login-section {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(90vh - 10px); /* Ajusta la altura según sea necesario */
            background-color: #f4f4f4;
        }

        .login-container {
            background: #fff;
            padding: 2rem;
            border-radius: 16px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 320px;
            width: 100%;
        }

        .login-container h3 {
            font-size: 24px;
            font-weight: bold;
            color: #362465;
            margin-top: 10px;
            text-align: center;
        }

        .login-container p {
    font-size: 15px;
    color:#565E65;
    text-align: center;
    margin-bottom: 20px;
    cursor: pointer;
    text-decoration: none;
    position: relative;
}

.login-container p:hover {
    text-decoration-color:#565E65;
}

.login-container p::before {
    content: "";
    position: absolute;
    display: block;
    width: 60%; /* Ajusta esto según sea necesario */
    height: 2px;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%) scaleX(0);
    background-color: #7179A8;
    transition: transform 0.5s ease;
}

.login-container p:hover::before {
    transform: translateX(-50%) scaleX(1);
}

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }

        .form-group label {
            font-size: 16px;
            color: #565E65;
            margin-bottom: 5px;
            text-align: left;
        }

        .form-group input {
            font-family: 'Poppins', sans-serif;
            background: #E0E0E0;
            color: #565E65;
            padding: 10px;
            border-radius: 10px;
            border: none;
            width: 100%; /* Ajustado para ocupar todo el ancho del contenedor */
            box-sizing: border-box;
        }

        .login-container button {
            font-family: 'Poppins', sans-serif;
            display: block;
            margin: 40px auto 20px;
            padding: 10px 20px;
            background-color: #9568FF;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
            width: 90%;
        }

        .login-container button:hover {
            color: white;
            background-color: #4f3492;
            transform: scale(1.05);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
        }

        .custom-line {
            border: 0; /* Eliminar el borde predeterminado */
            height: 2px; /* Altura de la línea */
            background-color: #7179A8; /* Color de la línea */
            margin: 20px auto; /* Márgenes automáticos para centrar la línea */
        }

        
    </style>
</html>
