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
            max-width: 450px;
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
            justify-content: flex-start; /* Mantener la imagen y el texto al inicio */
            width: 300px; /* Anchura fija para todos los botones */
            height: 50px; /* Altura fija para todos los botones */
            padding: 10px 20px;
            margin: 10px 0;
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            font-family: 'Poppins';
            transition: transform 0.3s, box-shadow 0.3s;
            position: relative; /* Permite el uso de position en elementos hijos */
        }

        .registro-button:hover {
            transform: scale(1.05);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
        }

        .registro-button img {
            width: 30px; /* Ajuste del tamaño de las imágenes */
            height: 24px; /* Ajuste del tamaño de las imágenes */
            margin-right: 10px;
        }

        .registro-button span {
            flex-grow: 1; /* Permite que el texto ocupe el espacio restante */
            text-align: center; /* Centra el texto */
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
            gap: 10px 40px; /* Espacio entre inputs */
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px; /* Espacio entre grupos de campos */
        }

        .form-group label {
            margin-bottom: 5px; /* Espacio entre label e input */
            font-size: 16px;
            text-align: left ;
            color: #565E65;
        }

        .form-group input,
        .form-group input[type="date"] {
            background: #E0E0E0;
            color: #565E65;
            font-family: 'Poppins';
            padding: 10px;
            border-radius: 10px;
            border: none;
            width: 100%; /* Hacer que el input ocupe el ancho completo del contenedor */
            box-sizing: border-box; /* Incluye el padding y el border en el ancho total del input */
        }

        .form-container button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #9568FF; /* Morado */
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


        .servicios .rating{
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
    <div class="servicios-container">
        <div class="servicio">
            <h3>Por favor, Ingrese los <br> datos de su Tarjeta.</h3>
            <p>----------------------------------</p>
            
            <div class="form-container">
                <div class="form-group">
                    <label for="card-number">Número de la Tarjeta</label>
                    <input type="text" id="card-number" name="card-number">
                </div>
                <div class="form-group">
                    <label for="amount">Monto</label>
                    <input type="text" id="amount" name="amount">
                </div>
                <div class="form-group">
                    <label for="birth-date">Fecha de Nacimiento</label>
                    <input type="date" id="birth-date" name="birth-date">
                </div>
                <div class="form-group">
                    <label for="cvv">Código CVV</label>
                    <input type="text" id="cvv" name="cvv">
                </div>

                <button type="submit" onclick="location.href='registro1.php'">Registrar</button>
            </div>

            
        </div>
    </div>
    <div class="rating">
                <i class="bx bxs-circle"></i>
                <i class="bx bxs-circle"></i>
                <i class="bx bxs-circle"></i>
    </div>
</section>

        
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>
