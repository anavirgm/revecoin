<footer class="footer" style="background-image: url('/revecoin/images/footer.png'); color: #fff; padding: 40px 0;">
    <div class="container">
        <div class="footer-container">
            <div class="footer-column">
                <div class="logo">
                    <a href="index.php">
                        <img src="images/logo.png" alt="Revecoin Logo">
                    </a>
                </div>
                <p>Somos una plataforma de recompensas basada en moneda virtual que permite a los usuarios ganar
                    dinero real al realizar tareas que se completan automáticamente con un solo clic.</p>
                <p>
                    <a style="color: #9ca3af; margin: 0 8px; font-size: 1.875rem; cursor: pointer;" class="footer-icon" onclick="window.open('https://www.instagram.com/anavirgm/', '_blank', 'noopener noreferrer')">
                        <i class="bx bxl-instagram"></i>
                    </a>
                    <a style="color: #9ca3af; margin: 0 8px; font-size: 1.875rem; cursor: pointer;" class="footer-icon" onclick="window.open('https://x.com/anavirgm', '_blank', 'noopener noreferrer')">
                        <i class="bx bxl-twitter"></i>
                    </a>
                    <a style="color: #9ca3af; margin: 0 8px; font-size: 1.875rem; cursor: pointer;" class="footer-icon" onclick="window.open('https://github.com/anavirgm/revecoin', '_blank', 'noopener noreferrer')">
                        <i class="bx bxl-github"></i>
                    </a>
                </p>
            </div>
            <div class="footer-column">
                <h3>Links</h3>
                <ul>
                    <li><img src="images/pick.png" alt="Feature Icon"><a href="#"> Términos y condiciones</a></li>
                    <li><img src="images/pick.png" alt="Feature Icon"><a href="#"> Políticas de privacidad</a></li>
                    <li><img src="images/pick.png" alt="Feature Icon"><a href="#" id="openModal"> Preguntas Frecuentes (FAQ)</a></li>
                    <li><img src="images/pick.png" alt="Feature Icon"><a href="#"> Uso de Datos</a></li>
                    <li><img src="images/pick.png" alt="Feature Icon"><a href="#"> Política de Reembolso</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Atención al cliente</h3>
                <a>+58 424-6720472</a>
                <h3>Ubícanos</h3>
                <p>C.C Gran Bazar</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2024 ReveCoin. All right reserved </p>
        </div>
    </div>
</footer>

<style>
    /* Estilos generales para el modal */
.modal2 {
  display: none; /* Oculto por defecto */
  position: fixed;
  z-index: 9999;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.7); /* Fondo oscuro semi-transparente */
}

.modal2-content {
  background-color: #38304C; /* Fondo morado oscuro */
  color: #ffffff; /* Texto en blanco */
  margin: 5% auto;
  padding: 20px;
  border-radius: 15px;
  width: 80%;
  max-width: 900px;
  position: relative;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  border: 1px solid #6F5A9F; /* Borde similar al modal de la imagen */
}

.close {
  color: #ffffff;
  position: absolute;
  right: 20px;
  top: 20px;
  font-size: 28px;
  font-weight: bold;
  cursor: pointer;
}

.close:hover,
.close:focus {
  color: #FF8787; /* Color rosado al pasar el mouse */
  text-decoration: none;
  cursor: pointer;
}

.modal2 h2 {
  text-align: center;
  font-size: 24px;
  margin-bottom: 20px;
  color: #FFF;
  background-color: #6F5A9F; /* Fondo morado similar al título */
  padding: 15px;
  border-radius: 15px;
  margin-top: 0;
}

.faq-container {
  display: flex;
  flex-direction: column;
  gap: 15px;
  max-height: 60vh; /* Limitar la altura del contenedor */
  overflow-y: auto; /* Scroll si el contenido es largo */
}

.faq-item {
  background-color: #4A4067; /* Fondo morado más oscuro */
  padding: 15px;
  border-radius: 10px;
  box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
}

.faq-item p, .faq-item ol {
  margin: 0;
  line-height: 1.6;
  color: #D1D1D1; /* Texto en gris claro */
}

.faq-item ol {
  padding-left: 20px;
}

@media (max-width: 768px) {
  .modal2-content {
    width: 90%;
  }

  .faq-item {
    font-size: 14px;
  }
}

</style>


<!-- Modal de Preguntas Frecuentes (FAQ) -->
<div id="faqModal" class="modal2">
    <div class="modal2-content">
        <span class="close">&times;</span>
        <h2>Preguntas Frecuentes (FAQ)</h2>
        <div class="faq-container">
            <div class="faq-item">
                <p><strong>1. ¿Qué es ReveCoin?</strong> ReveCoin es una plataforma innovadora que permite a los usuarios ganar dinero real realizando tareas automáticas con solo un clic. Los usuarios invierten una cantidad inicial y pueden completar diversas tareas para acumular monedas virtuales, que luego pueden convertir en dinero real.</p>
            </div>
            <div class="faq-item">
                <p><strong>2. ¿Cómo me registro en ReveCoin?</strong> Para registrarte, sigue estos pasos:</p>
                <ol>
                    <li>Visita nuestro sitio web o descarga la aplicación móvil.</li>
                    <li>Haz clic en "Registrarse" y completa el formulario de inscripción con tu información personal.</li>
                    <li>Verifica tu cuenta a través del enlace que te enviaremos por correo electrónico.</li>
                    <li>Realiza una inversión al plan de tu preferencia para comenzar a participar.</li>
                </ol>
            </div>

            <div class="faq-item">
                <p><strong>3. ¿Qué tipo de tareas puedo realizar en ReveCoin?</strong> En ReveCoin, puedes realizar una variedad de tareas automáticas, tales como: 
   <br>• Visualización de anuncios. 
   <br>• Navegación por sitios web patrocinados. 
   <br>• Descarga e instalación de aplicaciones. 
   <br>• Pruebas de productos. </p>
            </div>
            <!-- Agrega más preguntas y respuestas según sea necesario -->
        </div>
    </div>
</div>

<script>
    // Código JavaScript para abrir y cerrar el modal

    // Seleccionar el modal
    var modal = document.getElementById("faqModal");

    // Seleccionar el botón que abre el modal
    var btn = document.getElementById("openModal");

    // Seleccionar el span que cierra el modal
    var span = document.getElementsByClassName("close")[0];

    // Cuando el usuario hace clic en el botón, abrir el modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // Cuando el usuario hace clic en el span (x), cerrar el modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // Cuando el usuario hace clic fuera del modal, cerrar el modal
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    // Código JavaScript para los iconos del pie de página
    const icons = document.querySelectorAll('.footer-icon');

    icons.forEach(icon => {
        icon.addEventListener('mouseover', () => {
            icon.style.color = '#ffffff'; // Color blanco en hover
        });
        icon.addEventListener('mouseout', () => {
            icon.style.color = '#9ca3af'; // Color gris claro fuera de hover
        });
    });
</script>