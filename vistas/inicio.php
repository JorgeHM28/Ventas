<?php 
	session_start();
	if(isset($_SESSION['usuario'])){
		
 ?>


<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="img/LOGO1.2JB.jpg">
	<title>inicio</title>
	<?php require_once "menu.php"; ?>
</head>
<body>
	<br>
	<div class="container">
		<!-- Carrusel -->
		<div class="row">
			<div class="col-md-6">
				<h2>OFERTAS DEL DIA</h2>
				<!-- Carrusel izquierdo -->
				<div id="carouselLeft" class="carousel slide" data-ride="carousel">
					<!-- Indicadores -->
					<ol class="carousel-indicators">
						<li data-target="#carouselLeft" data-slide-to="0" class="active"></li>
						<li data-target="#carouselLeft" data-slide-to="1"></li>
						<li data-target="#carouselLeft" data-slide-to="2"></li>
					</ol>

					<!-- Contenido del carrusel -->
					<div class="carousel-inner">
						<div class="item active">
							<img src="https://via.placeholder.com/600x400?text=Imagen+1" alt="Imagen 1">
						</div>
						<div class="item">
							<img src="https://via.placeholder.com/600x400?text=Imagen+2" alt="Imagen 2">
						</div>
						<div class="item">
							<img src="https://via.placeholder.com/600x400?text=Imagen+3" alt="Imagen 3">
						</div>
					</div>

					<!-- Controles del carrusel -->
					<a class="left carousel-control" href="#carouselLeft" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
						<span class="sr-only">Anterior</span>
					</a>
					<a class="right carousel-control" href="#carouselLeft" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
						<span class="sr-only">Siguiente</span>
					</a>
				</div>
			</div>

			<div class="col-md-6">
				<H2>OFERTAS DE LA SEMANA</H2>
				<!-- Carrusel derecho -->
				<div id="carouselRight" class="carousel slide" data-ride="carousel">
					<!-- Indicadores -->
					<ol class="carousel-indicators">
						<li data-target="#carouselRight" data-slide-to="0" class="active"></li>
						<li data-target="#carouselRight" data-slide-to="1"></li>
						<li data-target="#carouselRight" data-slide-to="2"></li>
					</ol>

					<!-- Contenido del carrusel -->
					<div class="carousel-inner">
						<div class="item active">
							<img src="https://via.placeholder.com/600x400?text=Imagen+4" alt="Imagen 4">
						</div>
						<div class="item">
							<img src="https://via.placeholder.com/600x400?text=Imagen+5" alt="Imagen 5">
						</div>
						<div class="item">
							<img src="https://via.placeholder.com/600x400?text=Imagen+6" alt="Imagen 6">
						</div>
					</div>

					<!-- Controles del carrusel -->
					<a class="left carousel-control" href="#carouselRight" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
						<span class="sr-only">Anterior</span>
					</a>
					<a class="right carousel-control" href="#carouselRight" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
						<span class="sr-only">Siguiente</span>
					</a>
				</div>
			</div>
		</div>


		<!-- Sección de Información -->
		<div class="row" style="margin-top: 20px;">
			<div class="col-md-12">
				<h2 class="text-center">Información Importante</h2>
			</div>
		</div>
	</div>
</div>

</body>
</html>
<?php 
	}else{
		header("location:../index.php");
	}
 ?>