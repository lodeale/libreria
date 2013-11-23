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

		function colocarCarrito(){
			var param = {
				"id_libro" : $("#id_libro").val(),
				"titulo" : $("#titulo").val(),
				"precio" : $("#precio").val(),
				"categoria" : $("#categoria").val()
			}

			$.ajax({
				type: 'POST',
				url: '<?php echo base_url("index.php/inicio/colocarCarrito"); ?>',
				data: param,
				success: function(response){
					$("#cart_show").html(response);
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

		<?php if ($this->session->userdata("loginTrue")): ?>
			
		<div id="cart_show" style="display:block; position:fixed;background: #fff;border:solid 3px #333;margin-left:-500px;padding:5px 28px;">
			<div style="float:left;">
				<?php echo form_open('inicio/comprarLibro'); ?>

					<table cellpadding="6" cellspacing="1" style="width:100%" border="0">

					<tr>
					  <th>QTY</th>
					  <th>Item Description</th>
					  <th style="text-align:right">Item Price</th>
					  <th style="text-align:right">Sub-Total</th>
					</tr>

					<?php $i = 1; ?>

					<?php foreach ($this->cart->contents() as $items): ?>

						<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

						<tr>
						  <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
						  <td>
							<?php echo $items['name']; ?>

								<?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

									<p>
										<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

											<strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

										<?php endforeach; ?>
									</p>

								<?php endif; ?>

						  </td>
						  <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
						  <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
						</tr>

					<?php $i++; ?>

					<?php endforeach; ?>

					<tr>
					  <td colspan="2"> </td>
					  <td class="right"><strong>Total</strong></td>
					  <td class="right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
					</tr>

					</table>

					<p><?php echo form_submit('', 'Update your Cart'); ?></p>
			</div>
			<br><br>
			<hr>
			<a href="javascript:void(0);" id="cart_esc">Esconder</a>
			<a href="javascript:void(0);" id="cart_ver" style="display:block;float:right;margin-right:-22px;">Ver</a>
			<script type="text/javascript">
			(function(){
				$("#cart_ver").mouseover(function(){
					$("#cart_show").animate({marginLeft:'-150px'});
				});

				$("#cart_esc").click(function(){
					$("#cart_show").animate({marginLeft:'-500px'});
				});
			})();
			</script>
			<br>
		</div>
		<!-- carts end -->
		<?php endif ?>

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
						<?php if($this->session->userdata("privilegio") == 1): ?>
							<li><a id="cargas" href="<?php echo base_url('inicio/cargas'); ?>">Cargas</a></li>
						<?php endif; ?>
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