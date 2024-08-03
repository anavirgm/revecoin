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
            font-family: 'Poppins';
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

        .credit-card {
            background-color: #E85C5C;
        }

        .debit-card {
            background-color: #8CB95F;
        }

        .paypal {
            background-color: #555BEB;
        }

        .binancepay {
            background-color: #BCB575;
            color: white;
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

        .servicios .rating {
            color: black;
            font-size: 1.6rem;
            margin: 2rem 2rem 2rem;
        }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>

    <main>
        <section id="servicios">
            <?php
            // Obtener el parámetro 'plan' de la URL
            $plan = isset($_GET['plan']) ? $_GET['plan'] : '';
            $planName = '';

            // Determinar el nombre del plan basado en el parámetro
            switch ($plan) {
                case 'bronce':
                    $planName = 'Bronce';
                    break;
                case 'plata':
                    $planName = 'Plata';
                    break;
                case 'oro':
                    $planName = 'Oro';
                    break;
                default:
                    echo '<h2>Plan no válido</h2>';
                    echo '<p>Por favor, elige un plan válido.</p>';
                    exit;
            }
            ?>

            <h2>Usted ha elegido el plan <?php echo $planName; ?></h2>

            <div class="servicios-container">
                <div class="servicio">
                    <h3>Por favor, Ingrese sus <br> datos personales.</h3>
                    <p>-----------------------------------------------</p>

                    <div class="form-container">
                        <div class="form-group">
                            <label for="full-name">Nombre y Apellido</label>
                            <input type="text" id="full-name" name="full-name">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Teléfono</label>
                            <input type="tel" id="phone" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" id="password" name="password">
                        </div>

                        <button type="submit" onclick="location.href='registro2.php?plan=<?php echo $plan; ?>'">Continuar</button>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
