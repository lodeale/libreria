  
		<div id="wrapper">

			<div class="subMenuAdmin">
				<ul>
					
				</ul>	
			</div>

			<section class="libros_view">
				<h3>Lista de Libros</h3>
				<div class="newLibro">
					<?php echo form_open_multipart("inicio/do_upload"); ?>
						<div style="float:left;">
							<label for="">Titulo:</label>
							<br>
							<input type="text" id="titulo" name="titulo" placeholder="titulo">
							<br>
							<label for="">Fecha:</label>
							<br>
							<input type="date" name="fecha_emision" id="fecha_emision">
							<br>
							<label for="">Paginas:</label>
							<br>
							<input type="number" name="pagina" id="pagina">
							<br>
							<label for="">Precio:</label>
							<br>
							<input type="text" name="precio" id="precio">
							<br>
							<label for="">Stock:</label>
							<br>
							<input type="text" name="stock" id="stock">
							<br>
							<br>
							<input type="submit" value="enviar">
						</div>
						<div style="float:right;">
							<label for="">Descripción</label><br>
							<textarea name="descripcion" id="descripcion" cols="50" rows="10"></textarea>
							<fieldset>
								<legend>Categoria</legend>
								<input type="text" name="categoria" id="categoria">
							</fieldset>
							<fieldset>
								<legend>Editorial</legend>
								<input type="text" name="editorial" id="editorial">
							</fieldset>
							<fieldset>
								<legend>Autor:</legend>
								<input type="text" name="autor" id="autor" placeholder="Nombre y Apellido">
							</fieldset>
							<fieldset>
								<legend>Subir Imagen</legend>
									<input type="file" name="userfile" id="userfile">
							</fieldset>
					<?php echo form_close(); ?>
						</div>
				</div>	
			</section>
		</div>
