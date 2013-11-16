  
		<div id="wrapper">

			<div class="subMenuAdmin">
				<ul>
					
				</ul>	
			</div>

			<section class="libros_view">
				<h3>Lista de Libros</h3>
				<div class="newLibro">
					<?php echo form_open_multipart("inicio/actualizarLibro"); ?>
						<input type="hidden" name="id_libro" id="id_libro" value="<?php echo $libros[0]->id_libro; ?>">
						<div style="float:left;">
							<label for="">Titulo:</label>
							<br>
							<input type="text" id="titulo" name="titulo" placeholder="titulo" value="<?php echo $libros[0]->titulo ?>">
							<br>
							<label for="">Fecha:</label>
							<br>
							<input type="date" name="fecha_emision" id="fecha_emision" value="<?php echo $libros[0]->fecha_emision ?>">
							<br>
							<label for="">Paginas:</label>
							<br>
							<input type="number" name="pagina" id="pagina" value="<?php echo $libros[0]->pagina ?>">
							<br>
							<label for="">Precio:</label>
							<br>
							<input type="text" name="precio" id="precio" value="<?php echo $libros[0]->precio ?>">
							<br>
							<label for="">Stock:</label>
							<br>
							<input type="text" name="stock" id="stock" value="<?php echo $libros[0]->stock ?>">
							<br>
							<br>
							<input type="submit" value="Actualizar">
						</div>
						<div style="float:right;">
							<label for="">Descripción</label><br>
							<textarea name="descripcion" id="descripcion" cols="50" rows="10"><?php echo $libros[0]->descripcion ?></textarea>
							<fieldset>
								<legend>Categoria</legend>
								<select name="categoria" id="categoria">
									<?php foreach($categoria as $row): ?>
										<?php if($row->id_categoria == $libros[0]->id_categoria): ?>
											<option selected value="<?php echo $row->id_categoria ?>"><?php echo $row->descripcion ?></option>
										<?php else: ?>
											<option value="<?php echo $row->id_categoria ?>"><?php echo $row->descripcion ?></option>
										<?php endif; ?>
									<?php endforeach; ?>
								</select>
								<!--<input type="text" name="categoria" id="categoria" value="<?php echo $libros[0]->categoria ?>">-->
							</fieldset>
							<fieldset>
								<legend>Editorial</legend>
								<select name="editorial" id="editorial">
									<?php foreach($editorial as $row): ?>
										<?php if($row->id_editorial == $libros[0]->id_editorial): ?>
											<option selected value="<?php echo $row->id_editorial ?>"><?php echo $row->descripcion ?></option>
										<?php else: ?>
											<option value="<?php echo $row->id_editorial ?>"><?php echo $row->descripcion ?></option>
										<?php endif; ?>
									<?php endforeach; ?>
								</select>
								<!--<input type="text" name="editorial" id="editorial" value="<?php echo $libros[0]->editorial ?>">-->
							</fieldset>
							
							<fieldset>
								<legend>Autor:</legend>
								<select name="autor" id="autor">
									<?php foreach($autor as $row): ?>
										<?php if($row->id_autor == $libros[0]->id_autor): ?>
											<option selected value="<?php echo $row->id_autor ?>"><?php echo $row->nombre_apellido ?></option>
										<?php else: ?>
											<option value="<?php echo $row->id_autor ?>"><?php echo $row->nombre_apellido ?></option>
										<?php endif; ?>
									<?php endforeach; ?>
								</select>
								<!--<input type="text" name="autor" id="autor" placeholder="Nombre y Apellido" value="<?php echo $libros[0]->nombre_apellido ?>">-->
							</fieldset>
					<?php echo form_close(); ?>
						<?php echo form_open_multipart("inicio/do_upload"); ?>
							<fieldset>
								<img src="<?php echo base_url(); ?>uploads/<?php echo $libros[0]->imagen ?>" width="200">
								<br>
								<a href="#">Eliminar Imagen</a>
								<br><br>
								<legend>Subir Imagen</legend>
									<input type="file" name="userfile" id="userfile">
							</fieldset>
						<?php echo form_close(); ?>
						</div>
				</div>	
			</section>
		</div>
