<?php 
	
	require_once "clases/Conexion.php";
	$obj= new conectar();
	$conexion=$obj->conexion();

	$sql="SELECT * from usuarios where email='admin'";
	$result=mysqli_query($conexion,$sql);
	$validar=0;
	if(mysqli_num_rows($result) > 0){
		$validar=1;
	}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Login de usuario</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<script src="librerias/jquery-3.7.1.min.js"></script>
	<script src="js/funciones.js"></script>
	<link rel="icon" href="img/LOGO1.2JB.jpg">
	<style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: white;
        }
        h2 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
	<br><br>
	<div class="container mt-5">
        <div class="login-container">
            <section class="text-center">
                <h2>Iniciar Sesión</h2>
                <p>Por favor, ingresa los datos para ingresar.</p>
                <div class="text-center">
					<img src="img/LOGO1.2JB.jpg" class="img-fluid rounded" height="100" alt="Logo">
				</div>
                <form id="frmLogin">
                        <label for="username">Usuario</label>
                        <input type="text" class="form-control"  placeholder="Ingresa tu usuario" name="usuario" id="usuario" required>
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" placeholder="Ingresa tu contraseña" name="password" id="password" required>
                    <br>
                    <span class="btn btn-primary btn-sm" id="entrarSistema">Entrar</span>
                    <?php  if(!$validar): ?>
						<a href="registro.php" class="btn btn-danger btn-sm">Registrar</a>
					<?php endif; ?>
            </section>
        </div>
    </div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#entrarSistema').click(function(){

		vacios=validarFormVacio('frmLogin');

			if(vacios > 0){
				alert("Debes llenar todos los campos!!");
				return false;
			}

		datos=$('#frmLogin').serialize();
		$.ajax({
			type:"POST",
			data:datos,
			url:"procesos/regLogin/login.php",
			success:function(r){

				if(r==1){
					window.location="vistas/inicio.php";
				}else{
					alert("No se pudo acceder :(");
				}
			}
		});
	});
	});
</script>