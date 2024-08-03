<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReveCoin - ¡Invierte en el FUTURO!</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link href="css/revecoin.css" rel="stylesheet">
</head>

<body>
    <?php include 'header.php'; ?>
    <main>
        <section class="welcome-section">
            <h1>¡Bienvenido a Revecoin!</h1>
            <p>Gira la ruleta y gana</p>
            <div class="images">
                <img src="images/f19d3210-e311-4151-b0d3-7c747bf44204.png" alt="Image 1" class="img1">
                <button id="start-button">¡Empieza Ya!</button>
                <img src="images/319bd0d8-63f8-4322-9ea5-facedac69750.png" alt="Image 2" class="img2">
            </div>
        </section>

        <section id="nosotros" class="about-section">
            <div class="about-header">
                <h2>Acerca de Nosotros</h2>
            </div>
            <div class="about-content">
                <div class="about-images">
                    <img src="images/v11_5.png" alt="Image 1">
                    <img src="images/v11_4.png" alt="Image 2">
                    <img src="images/v11_6.png" alt="Image 3">
                    <img src="images/v11_7.png" alt="Image 4">
                </div>
                <div class="about-text">
                    <h3>¡Invierte en el FUTURO!</h3>
                    <p>Somos un independiente de inversión que se compromete a trabajar contigo para obtener los
                        resultados que deseas. <br>

                        <br>ReveCoin te ofrece la oportunidad de ganar dinero real de manera pasiva al realizar tareas
                        automáticas.
                    </p>
                    <div class="about-buttons">
                        <a href="#contacto">
                            <button>Contáctenos</button>
                        </a>

                        <button id="start-button-2">Girar Ruleta</button>
                    </div>
                </div>
            </div>
        </section>

        <section id="why-trust-us">
            <h2>¿Por qué confiar en nosotros?</h2>
            <p><span class="highlight">La confianza surge de la experiencia. Muchos de los <br> clientes satisfechos
                    pueden servirle de guía.</span></p>
            <div class="cards-container">
                <div class="card">
                    <div class="icon">
                        <img src="images/icon1.png" alt="Icon 1">
                    </div>
                    <div>
                        <h3>Membresía con efectivo</h3>
                        <p>Disfruta de beneficios y reembolsos en efectivo, diseñados para recompensar a nuestros
                            valiosos miembros.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="icon">
                        <img src="images/icon2.png" alt="Icon 2">
                    </div>
                    <div>
                        <h3>Servicio de Consultoría</h3>
                        <p>Asesoría experta para guiarte en cada decisión importante, asegurando que tomes el camino
                            correcto hacia el éxito.</p>
                    </div>
                </div>
            </div>
            <div id="how-to-buy">
                <h2>¿Cómo comprar con nosotros?</h2>
                <p><span class="highlight2">Complete el siguiente formulario y nos comunicaremos con usted por correo
                        electrónico y detalles.</span></p>
                <div class="form-container">
                    <input type="text" placeholder="Billetera" id="billetera">
                    <input type="text" placeholder="Tipo de Pago" id="tipo">
                    <input type="text" placeholder="Monto" id="monto">
                    <input type="email" id="email" name="email" placeholder="E-mail" required>
                    <button id="submit-button">Iniciar</button>
                </div>
            </div>

        </section>


        <section id="pricing-plans">
    <h2 id="planes">Impresionante Plan de Precios</h2>
    <div class="pricing-cards">
        <div class="pricing-card">
            <div class="header">
                <img src="images/bronce.png" alt="Bronce Icon" class="plan-icon">
                <h3 class="bronze">Bronce</h3>
            </div>
            <p>Perfecto para Iniciar</p>
            <p class="initial-investment">Ganancias:</p>
            <div class="price">
                <h4>$2,2<span> / Diarios</span></h4>
            </div>
            <a href="registro1.php?plan=bronce">
                <button class="cta">Hacer Inversión</button>
            </a>
            <ul class="features">
                <p class="initial-investment">El Plan Bronce incluye:</p>
                <li><img src="images/check.png" alt="Feature Icon"> Acceso a la plataforma.</li>
                <li><img src="images/check.png" alt="Feature Icon"> Soporte técnico.</li>
                <li><img src="images/check.png" alt="Feature Icon"> Tutoriales y recursos de inicio.</li>
                <li><img src="images/check.png" alt="Feature Icon"> Actualizaciones periódicas</li>
                <li><img src="images/check.png" alt="Feature Icon"> Informe mensual de progreso.</li>
            </ul>
            <p class="initial-investment">Inversión Inicial: $66,00</p>
        </div>
        <div class="pricing-card">
            <div class="header">
                <img src="images/plata.png" alt="Plata Icon" class="plan-icon">
                <h3 class="silver">Plata</h3>
            </div>
            <p>Perfecto para Iniciar</p>
            <p class="initial-investment">Ganancias:</p>
            <div class="price">
                <h4>$5<span>/ Diarios</span></h4>
            </div>
            <a href="registro1.php?plan=plata">
                <button class="cta">Hacer Inversión</button>
            </a>
            <ul class="features">
                <p class="initial-investment">El Plan Plata incluye:</p>
                <li><img src="images/check.png" alt="Feature Icon"> Acceso a la plataforma.</li>
                <li><img src="images/check.png" alt="Feature Icon"> Soporte técnico.</li>
                <li><img src="images/check.png" alt="Feature Icon"> Recursos exclusivos.</li>
                <li><img src="images/check.png" alt="Feature Icon"> Actualizaciones personalizadas.</li>
                <li><img src="images/check.png" alt="Feature Icon"> Informe quincenal de progreso.</li>
            </ul>
            <p class="initial-investment">Inversión Inicial: $150,00</p>
            <div class="popular">Popular</div>
        </div>
        <div class="pricing-card">
            <div class="header">
                <img src="images/oro.png" alt="Oro Icon" class="plan-icon">
                <h3 class="gold">Oro</h3>
            </div>
            <p>Perfecto para Iniciar</p>
            <p class="initial-investment">Ganancias:</p>
            <div class="price">
                <h4>$10<span>/ Diarios</span></h4>
            </div>
            <a href="registro1.php?plan=oro">
                <button class="cta">Hacer Inversión</button>
            </a>
            <ul class="features">
                <p class="initial-investment">El Plan Oro incluye:</p>
                <li><img src="images/check.png" alt="Feature Icon"> Acceso a la plataforma.</li>
                <li><img src="images/check.png" alt="Feature Icon"> Soporte prioritario.</li>
                <li><img src="images/check.png" alt="Feature Icon"> Capacitación y recursos exclusivos.</li>
                <li><img src="images/check.png" alt="Feature Icon"> Actualizaciones y mejoras continuas.</li>
                <li><img src="images/check.png" alt="Feature Icon"> Informes semanales de rendimiento.</li>
            </ul>
            <p class="initial-investment">Inversión Inicial: $300,00</p>
        </div>
    </div>
</section>





        <section id="servicios">
            <h2>Solución integral a tu futuro</h2>
            <p><span class="highlight">Confía en nuestra experiencia para guiarte hacia un futuro seguro y
                    exitoso.</span></p>
            <div class="servicios-container">
                <div class="servicio">
                    <div class="icon-container">
                        <img src="images/servicio1.png" alt="Servicio 1">
                    </div>
                    <h3>Apoyo</h3>
                    <p>Siempre a tu lado, brindándote la asistencia que necesitas en cada paso de tu camino.</p>
                </div>
                <div class="servicio">
                    <div class="icon-container">
                        <img src="images/servicio2.png" alt="Servicio 2">
                    </div>
                    <h3>Seguridad</h3>
                    <p>Protegemos tu información y transacciones con seguridad avanzada.</p>
                </div>
                <div class="servicio">
                    <div class="icon-container">
                        <img src="images/servicio3.png" alt="Servicio 3">
                    </div>
                    <h3>Transacción Rápida</h3>
                    <p>Operaciones más rápidas, brindando a nuestros valiosos usuarios un nivel de eficiencia mayor.</p>
                </div>
            </div>



            <div id="contacto" class="contact-section">
                <div class="container">
                    <div class="contact-content">
                        <div class="contact-header">
                            <h3><span class="highlight3">¿Tienes Dudas? <br> Contáctanos </span></h3>
                        </div>
                        <form id="contact-form" class="contact-form">
                            <div class="form-row">
                                <input type="text" id="nombres" name="nombres" placeholder="Nombres" required>
                                <input type="text" id="apellidos" name="apellidos" placeholder="Apellidos" required>
                                <input type="email" id="email2" name="email" placeholder="E-mail" required>
                            </div>
                            <div class="form-row">
                                <input type="tel" id="telefono" name="telefono" placeholder="Telefono" required>
                                <textarea id="mensaje" name="mensaje" placeholder="Mensaje" rows="1"
                                    required></textarea>
                                <button type="submit">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>


    </main>


    <div id="wheel-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="ruleta">
                <div id="sectores">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <div id="divisores">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>

            </div>
            <div id="triangulo"></div>

            <button id="spin-wheel-button">Girar</button>
        </div>
    </div>


    <?php include 'footer.php'; ?>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const startButtons = document.querySelectorAll("#start-button, #start-button-2");
            const spinButton = document.getElementById("spin-wheel-button");
            const modal = document.getElementById("wheel-modal");
            const closeModal = document.getElementsByClassName("close")[0];
            const ruleta = document.getElementById("ruleta");

            startButtons.forEach(button => {
                button.addEventListener("click", function () {
                    modal.style.display = "flex";
                });
            });

            closeModal.addEventListener("click", function () {
                modal.style.display = "none";
            });

            window.addEventListener("click", function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            });

            spinButton.addEventListener("click", function () {
                ruleta.style.setProperty('--rotacion', `${Math.floor(Math.random() * 3600 + 3600)}deg`);
            });
        });

        emailjs.init("TxnXL-FkcC2Av4lV7"); // Tu clave pública correcta

        document.getElementById("submit-button").addEventListener("click", function () {
            const billetera = document.getElementById("billetera").value;
            const tipo = document.getElementById("tipo").value;
            const monto = document.getElementById("monto").value;
            const email = document.getElementById("email").value;

            if (billetera && tipo && monto && email) {
                emailjs.send("service_7m5j22w", "template_tqk846r", {
                    billetera: billetera,
                    tipo: tipo,
                    monto: monto,
                    email: email, // Enviar el correo a la dirección ingresada
                    to_email: email // Enviar el correo a la dirección ingresada
                }).then(function (response) {
                    alert("Correo enviado exitosamente!");
                    document.getElementById("billetera").value = '';
                    document.getElementById("tipo").value = '';
                    document.getElementById("monto").value = '';
                    document.getElementById("email").value = '';
                }, function (error) {
                    alert("Error al enviar el correo: " + JSON.stringify(error));
                });
            } else {
                alert("Por favor, completa todos los campos.");
            }
        });


        emailjs.init("TxnXL-FkcC2Av4lV7"); // Tu clave pública correcta

        document.getElementById("contact-form").addEventListener("submit", function (event) {
            event.preventDefault();

            const nombres = document.getElementById("nombres").value;
            const apellidos = document.getElementById("apellidos").value;
            const email = document.getElementById("email2").value;
            const telefono = document.getElementById("telefono").value;
            const mensaje = document.getElementById("mensaje").value;

            emailjs.send("service_7m5j22w", "template_26ldsq8", {
                nombres: nombres,
                apellidos: apellidos,
                email: email,
                telefono: telefono,
                mensaje: mensaje,
                to_email: email // Enviar el correo a la dirección ingresada
            }).then(function (response) {
                alert("Correo enviado exitosamente!");
                document.getElementById("contact-form").reset();
            }, function (error) {
                alert("Error al enviar el correo: " + JSON.stringify(error));
            });
        });

    </script>
</body>

</html>
