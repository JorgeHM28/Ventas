
<?php require_once "dependencias.php" ?>

<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="img/LOGO1.2JB.jpg ">
  <title></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
      <style>
       body {
        margin: 0;
        font-family: Arial, sans-serif;
    }
    
    .navbar {
        display: flex;
        justify-content: center; /* Centrar elementos horizontalmente */
        align-items: center;
        background-color: #000; /* Fondo negro */
        padding: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        flex-wrap: wrap; /* Permitir que los elementos se ajusten */
        position: fixed; /* O absolute si prefieres */
        top: 0;
        left: 0;
        width: 100%; /* Asegura que ocupe todo el ancho */
        z-index: 1000; /* Asegura que esté por encima de otros elementos */     
    }
    
    .logo {
        margin-right: auto; /* Asegurar que el logo esté a la izquierda */
    }
    
    .toggle {
        color: #fff; /* Texto blanco */
        font-size: 28px;
        cursor: pointer;
        display: none; /* Oculto en pantallas grandes */
    }
    
    .nav-links {
        list-style: none;
        display: flex;
        margin: 0;
        padding: 0;
    }
    
    .nav-links li {
        position: relative;
    }
    
    .nav-links a {
        color: #fff; /* Texto blanco */
        padding: 15px 20px;
        text-decoration: none;
        transition: background-color 0.3s;
    }
    
    .nav-links a:hover {
        background-color: #007BFF; /* Color azul al pasar el mouse */
    }
    
    .submenu {
        display: none; /* Oculto por defecto */
        position: absolute;
        top: 100%;
        left: 0;
        background-color: #000; /* Fondo negro para el submenu */
        list-style: none;
        padding: 0;
        margin: 0;
        min-width: 160px;
        z-index: 1;
    }
    
    .submenu li {
        text-align: center; /* Centrar texto en el submenú */
    }
    
    .submenu li a {
        padding: 10px 0; /* Padding vertical para centrado */
        color: #fff; /* Texto blanco para el submenu */
        display: block; /* Hacer que el enlace ocupe todo el ancho */
    }
    .submenu-toggle i {
        margin-left: 5px; /* Espacio entre el texto y el icono */
        color: #fff; /* Color blanco para el icono */
    }
    
    .submenu.active {
        display: block; /* Mostrar el submenu cuando esté activo */
    }
    
    .nav-links.active {
        display: block; /* Mostrar enlaces de navegación en modo móvil */
        flex-direction: column; /* Alinear verticalmente */
    }
    
    
    @media (max-width: 768px) {
        .toggle {
            display: block; /* Mostrar el toggle en pantallas pequeñas */
        }
    
        .nav-links {
            display: none; /* Ocultar enlaces de navegación por defecto en móvil */
            width: 100%;
            background-color: #000; /* Fondo negro para el menú */
            position: absolute;
            top: 60px; /* Ajustar según la altura de la barra de navegación */
            left: 0;
        }
    
        .nav-links.active {
            display: flex; /* Mostrar en modo móvil cuando esté activo */
            flex-direction: column; /* Alinear verticalmente */
        }
    
        .nav-links li {
            width: 100%; /* Asegurar que los elementos ocupen todo el ancho en móvil */
        }
    }
    
    
     
     
     </style>
</head>
 
<body>

    <nav class="navbar">
        <div class="logo">
          <a class="navbar-brand" href="inicio.php"><img class="img-responsive img-thumbnail" src="../img/logomenu.jpg" alt="" width="250px" height="180px"></a>
        </div>
        <div class="toggle" id="toggle">&#9776;</div>
        <ul class="nav-links" id="nav-links">
            <li><a href="inicio.php">Inicio</a></li>
            <li>
                <a href="#" class="submenu-toggle">Administrar Articulos<i class="fas fa-chevron-down"></i></a>
                <ul class="submenu">
                    <li><a href="categorias.php">Categorias</a></li>
                    <li><a href="articulos.php">Articulos</a></li>
                </ul>
            </li>
            
            <?php
            if($_SESSION['usuario']=="admin"):
             ?>
              <li><a href="usuarios.php">Administrar Usuarios</a></li>
                <?php 
             endif;
                ?>
            
            <li><a href="clientes.php">Clientes</a></li>
            <li><a href="ventas.php"><i class="fa-solid fa-dollar-sign"></i>Vender Articulos</a></li>
            <li>
                <a href="#" style="color: red" class="submenu-toggle"><i style="color: red" class="fa-solid fa-user"></i> Usuario: <?php echo $_SESSION['usuario']; ?></a>
                <ul class="submenu">
                    <li><a style="color: red" href="../procesos/salir.php"><i style="color: red" class="fa-solid fa-arrow-right-from-bracket"></i>Salir</a></li>
                </ul>
            </li>
        </ul>
    </nav>



    <!-- /container -->        


</body>
    <script>
        const toggle = document.getElementById('toggle');
        const navLinks = document.getElementById('nav-links');
        const submenuToggles = document.querySelectorAll('.submenu-toggle');
        
        toggle.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });
        
        // Añadir evento a cada submenu-toggle
        submenuToggles.forEach(toggle => {
            toggle.addEventListener('click', (e) => {
                e.preventDefault();
                const submenu = toggle.nextElementSibling; // Obtener el submenu asociado
                submenu.classList.toggle('active'); // Alternar visibilidad
            });
        });
    
    </script>
    
    
</html>