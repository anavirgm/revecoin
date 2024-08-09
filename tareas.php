<?php
session_start();
include 'db_connection.php'; // archivo con la conexión a la base de datos

// Verificar si el usuario está logueado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php"); // Redirigir al inicio de sesión si no está autenticado
    exit();
}

// Obtener la información del usuario desde la sesión
$id = $_SESSION['id'];
$nombres = $_SESSION['nombres'];


// Obtener el plan del usuario
$sql = "SELECT plan FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $planId = $user['plan'];

    // Obtener la recompensa del plan
    $sql = "SELECT tareas FROM planes WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $planId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $plan = $result->fetch_assoc();
        $recompensa = $plan['tareas'];
    } else {
        $recompensa = "No disponible";
    }
} else {
    $recompensa = "No disponible";
}

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

        .pricing-card p {
            font-size: 18px;
            color: #374557;
            font-weight: bold;
        }

        .pricing-card .initial-investment1 {
            color: #A19CB1;
            font-weight: bold;
        }

        .pricing-card .header .silver {
            color: #693DCF;
        }

        .pricing-card .header .bronze {
            color: #693DCF;
        }

        .pricing-card .header .gold {
            color: #693DCF;
        }

        .pricing-card .header {
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            gap: 10px;
            align-items: center;
            margin-top: 30px;
        }

        .acumulado {
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
            margin-bottom: 40px;
        }

        .cta {
            position: relative;
            padding: 10px 20px;
            background-color: #693DCF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-family: 'Poppins';
            font-size: 16px;
            overflow: hidden;
        }

        .cta .progress-bar {
            position: absolute;
            top: 0;
            left: 0;
            height: 42px;
            background-color:#693dcfbd;
            width: 0;
            transition: width 10s linear;
        }

        .cta.active .progress-bar {
            width: 100%;
        }

        .cta:disabled {
            opacity: 0.7;
            cursor:not-allowed;
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
                    <h3 class="bronze">Tarea Nº1</h3>
                </div>
                <p>Duración: 10seg</p>
                <p class="initial-investment1">Lorem ipsum dolor <br> sit amet, consectetur <br> adipiscing elit  sed <br> Lorem adipiscing elit</p>
                
                <a href="javascript:void(0);">
                    <button class="cta" id="start-task-1" data-task-complete="false" data-recompensa="<?php echo htmlspecialchars($recompensa); ?>">Iniciar
                        <div class="progress-bar"></div>
                    </button>
                </a>
                <p class="initial-investment">Recompensa: <br> $<?php echo htmlspecialchars($recompensa); ?></p>
            </div>





            <div class="pricing-card" data-id="2">
                <div class="header">
                    <h3 class="silver">Tarea Nº2</h3>
                </div>
                <p>Duración: 10seg</p>
                <p class="initial-investment1">Lorem ipsum dolor <br> sit amet, consectetur <br> adipiscing elit  sed <br> Lorem adipiscing elit</p>
                
                <a href="javascript:void(0);">
                    <button class="cta" id="start-task-2" data-task-complete="false" data-recompensa="<?php echo htmlspecialchars($recompensa); ?>">Iniciar
                        <div class="progress-bar"></div>
                    </button>
                </a>
                <p class="initial-investment">Recompensa: <br> $<?php echo htmlspecialchars($recompensa); ?></p>
            </div>

            <div class="pricing-card" data-id="3">
                <div class="header">
                    <h3 class="gold">Tarea Nº3</h3>
                </div>
                <p>Duración: 10seg</p>
                <p class="initial-investment1">Lorem ipsum dolor <br> sit amet, consectetur <br> adipiscing elit  sed <br> Lorem adipiscing elit</p>
                
                <a href="javascript:void(0);">
                    <button class="cta" id="start-task-3" data-task-complete="false" data-recompensa="<?php echo htmlspecialchars($recompensa); ?>">Iniciar
                        <div class="progress-bar"></div>
                    </button>
                </a>
                <p class="initial-investment">Recompensa: <br> $<?php echo htmlspecialchars($recompensa); ?></p>
            </div>

        </div>

        <a href="monedero.php">
        <button class="acumulado" id="acumulado-btn">Acumulado: <br>$<?php echo htmlspecialchars($dinero_acumulado, 2); ?></button>
        </a>

    </section>
</main>
<?php include 'footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.cta');
    buttons.forEach(button => {
        button.addEventListener('click', function() {
            if (this.dataset.taskComplete === 'false') {
                this.dataset.taskComplete = 'true';
                this.querySelector('.progress-bar').style.width = '100%';
                this.disabled = true; // Deshabilitar el botón durante la tarea

                const recompensa = parseFloat(this.dataset.recompensa); // Asegúrate de que sea decimal
                const acumuladoBtn = document.getElementById('acumulado-btn');

                setTimeout(() => {
                    this.textContent = 'Completado';

                    // Actualiza el valor en el botón de acumulado
                    fetch('update_acumulado.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: 'recompensa=' + encodeURIComponent(recompensa)
                    })
                    .then(response => response.text())
                    .then(data => {
                        acumuladoBtn.innerHTML = 'Acumulado:<br>$' + parseFloat(data).toFixed(2);
                    })
                    .catch(error => console.error('Error:', error));
                }, 10000); // 10 segundos
            }
        });
    });
});
</script>
</body>
</html>
