<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>libreria</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/estilo.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#bto_login").click(function(){
				$(".login").fadeIn();
			});
		});

		function insertComentario(){
			var param = {
				"nombre": $("#usuario").val(),
				"comentario":$("#comentarioLibro").val(),
				"id_libro": $("#id_libro").val()
			}
	
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url("index.php/inicio/addComentario"); ?>',
				data: param,
				success: function(response){
					$("#commentResponse").html(response);
				}
			});
		}
	</script>
</head>
<body>
	<?php  
		$msj = $this->session->flashdata('error');
		if(!empty($msj)):
		?>
			<div class="error"> <?php echo $msj; ?> </div>
			<script type="text/javascript">
				setTimeout(function(){
					$(".error").animate({
						opacity: 0.0
					});
				},7000);
			</script>
		<?php
		endif;

		$msj = $this->session->flashdata('correcto');
		if(!empty($msj)):
		?>
			<div class="correcto"> <?php echo $msj; ?> </div>
			<script type="text/javascript">
				setTimeout(function(){
					$(".correcto").animate({
						opacity: 0.0
					});
				},7000);
			</script>
		<?php
		endif;
	?>
	<div id="container">
		<div id="top_nav">
			<?php if($this->session->userdata("loginTrue")): ?>
			<ul>
				<li>
					<a href="javascript:void(0);">
						Bienvenido <?php echo $this->session->userdata("user"); ?>
					</a>&nbsp;&nbsp;|&nbsp;&nbsp;</li>
				<li><a href="javascript:void(0);">Perfil</a>&nbsp;&nbsp;|&nbsp;&nbsp;</li>
				<li><a href="<?php echo base_url("inicio/salir"); ?>">Salir</a></li>
			</ul>
			<?php else: ?>
			<ul>
				<li><a id="bto_login" href="javascript:void(0);">Login</a>&nbsp;&nbsp;|&nbsp;&nbsp;</li>
				<li><a href="javascript:void(0);">Registrar</a></li>
			</ul>
			<?php endif; ?>
		</div>
		<div class="login">
			<?php echo form_open("inicio/login"); ?>
				<label for="">Usuario</label>
				<input type="text" name="user" id="user">
				<label for="">Clave</label>
				<input type="password" name="pass" id="pass">
				<br><br>
				<input type="submit" name="btoEnviar" value="Enviar">
			<?php echo form_close(); ?>
		</div>
		<header>
			<div style="background: #fff;">
				<h1><span class="espan gradiente">Lib</span> Encode</h1>
				<nav>
					<ul>
						<li><a id="inicio" href="<?php echo base_url('inicio'); ?>">Inicio</a></li>
						<li><a id="libros" href="<?php echo base_url('inicio/libros'); ?>">Libros</a></li>
						<li><a id="novedades" href="<?php echo base_url('inicio/novedades'); ?>">Novedades</a></li>
						<li><a id="contacto" href="<?php echo base_url('inicio/contacto'); ?>">Contacto</a></li>
					</ul>
				</nav>
				<script type="text/javascript">
					(function(act){
						$("#"+act).addClass("check_bto");
					})("<?php echo $opcActivo; ?>");
				</script>
			</div>
			<div id="sub_header" class="gradiente divHor">
				<div class="w350">
					<h2 style="color:#fff;">Best</h2>
					<h3 style="color:#333;">Books Developer</h3>
					<br>
					<p style="color:#fff;">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					</p>
					<br>
					<a href="#">
						Mas Info.
					</a>
				</div>
				<div style="margin-left:100px;">
					<img src="<?php echo base_url(); ?>assets/img/libros.png" width="300">
				</div>
			</div>
		</header>