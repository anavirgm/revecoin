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
                <p>------------------------------------</p>

                <form action="login_processing.php" method="post">
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
            height: calc(100vh - 60px); /* Ajusta la altura según sea necesario */
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
            margin-bottom: 20px;
            text-align: center;
        }

        .login-container p {
            font-size: 1rem;
            color: #693DCF;
            text-align: center;
            margin-bottom: 20px;
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
            margin: 40px auto;
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
    </style>
</html>
