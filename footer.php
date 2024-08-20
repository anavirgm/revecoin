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
                    <li><a href="#">Políticas de privacidad</a></li>
                    <li><a href="#">Preguntas Frecuentes (FAQ)</a></li>
                    <li><a href="#">Uso de Datos</a></li>
                    <li><a href="#">Política de Reembolso</a></li>
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
<script>
    // Selecciona todos los enlaces con la clase 'footer-icon'
    const icons = document.querySelectorAll('.footer-icon');

    // Agrega eventos de mouseover y mouseout para cambiar el color
    icons.forEach(icon => {
        icon.addEventListener('mouseover', () => {
            icon.style.color = '#ffffff'; // Color blanco en hover
        });
        icon.addEventListener('mouseout', () => {
            icon.style.color = '#9ca3af'; // Color gris claro fuera de hover
        });
    });
</script>