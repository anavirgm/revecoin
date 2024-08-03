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
                    <h3>Por favor, Ingrese su <br> método de pago.</h3>
                    <p>----------------------------------</p>
                    <div class="button-container">
                        <button class="registro-button credit-card" onclick="location.href='registro3.php?metodo=credito'">
                            <img src="images/credito.png" alt="Crédito">
                            <span>Tarjeta de Crédito</span>
                        </button>
                        <button class="registro-button debit-card" onclick="location.href='registro3.php?metodo=debito'">
                            <img src="images/debito.png" alt="Débito">
                            <span>Tarjeta de Débito</span>
                        </button>
                        <button class="registro-button paypal" onclick="location.href='registro3.php?metodo=paypal'">
                            <img src="images/paypal.png" alt="Paypal">
                            <span>Paypal</span>
                        </button>
                        <button class="registro-button binancepay" onclick="location.href='registro3.php?metodo=binance'">
                            <img src="images/binance.png" alt="BinancePay">
                            <span>BinancePay</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="rating">
					<i class="bx bxs-circle"></i>
					<i class="bx bxs-circle"></i>
					<i class="bx bx-circle"></i>
			</div>
        </section>
    </main>
    <?php include 'footer.php'; ?>
</body>

</html>
