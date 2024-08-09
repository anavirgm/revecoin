<?php

$current_file = basename($_SERVER['PHP_SELF']);

switch ($current_file) {
    case 'dashboard.php':
    case 'tareas.php':
    case 'monedero.php':
        ?>
        <header>
            <div class="logo">
                <a href="index.php">
                    <img src="images/logo.png" alt="Revecoin Logo">
                </a>
            </div>
            <nav>
                <ul>
                    <!-- 
                    <li><img src="images/der.png"><a href="login.php">Cerrar Sesión</a></li> 
                    -->
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="index.php#planes">Planes</a></li>
                    <li><a href="logout.php">Cerrar Sesión</a></li>
                </ul>
            </nav>
        </header>
        <?php
        break;
        
    case 'login.php':
        ?>
        <header>
            <div class="logo">
                <a href="index.php">
                    <img src="images/logo.png" alt="Revecoin Logo">
                </a>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="index.php#planes">Registrarse</a></li>
                </ul>
            </nav>
        </header>
        <?php
        break;

    case 'registro1.php':
    case 'registro2.php':
    case 'registro3.php':
        ?>
        <header>
            <div class="logo">
                <a href="index.php">
                    <img src="images/logo.png" alt="Revecoin Logo">
                </a>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="index.php#planes">Planes</a></li>
                    <li><a href="login.php">Iniciar Sesión</a></li>
                </ul>
            </nav>
        </header>
        <?php
        break;
    
    default:
        ?>
        <header>
            <div class="logo">
                <a href="index.php">
                    <img src="images/logo.png" alt="Revecoin Logo">
                </a>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="index.php#nosotros">Nosotros</a></li>
                    <li><a href="index.php#planes">Planes</a></li>
                    <li><a href="index.php#servicios">Servicios</a></li>
                    <li><a href="index.php#contacto">Contacto</a></li>
                </ul>
            </nav>
        </header>
        <?php
        break;
}
?>