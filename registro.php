<?php 
	
	require_once "clases/Conexion.php";
	$obj= new conectar();
	$conexion=$obj->conexion();

	$sql="SELECT * from usuarios where email='admin'";
	$result=mysqli_query($conexion,$sql);
	$validar=0;
	if(mysqli_num_rows($result) > 0){
		header("location:index.php");
	}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>registro</title>
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
<body style="background-color: gray">
	<br><br><br>
	<div class="container mt-5">
        <div class="login-container">
            <section class="text-center">
                <h2>Iniciar Sesión</h2>
                <p>Por favor, ingresa los datos para ingresar.</p>
                <form id="frmRegistro">
                        <label for="username">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingresa tu usuario"  required>
                        <label for="password">Apellido</label>
                        <input type="password" class="form-control" name="apellido" id="apellido" placeholder="Ingresa tu contraseña"  required>
                        <label for="password">Usuario</label>
                        <input type="password" class="form-control" name="usuario" id="usuario" placeholder="Ingresa tu contraseña"  required>
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Ingresa tu contraseña" required>
                    <br>
                    <span class="btn btn-primary" id="registro">Registrar</span>
                    <a href="index.php" class="btn btn-default">Regresar login</a>
            </section>
        </div>
    </div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#registro').click(function(){

			vacios=validarFormVacio('frmRegistro');

			if(vacios > 0){
				alert("Debes llenar todos los campos!!");
				return false;
			}

			datos=$('#frmRegistro').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/regLogin/registrarUsuario.php",
				success:function(r){
					alert(r);

					if(r==1){
						alert("Agregado con exito");
					}else{
						alert("Fallo al agregar :(");
					}
				}
			});
		});
	});
</script>

