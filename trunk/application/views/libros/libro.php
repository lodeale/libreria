 		<div id="wrapper">
			
			<section class="viewLibro">
				<article class="libroCompleto">
					<h2>
						<?php echo $libros[0]->titulo ?>
						<input type="hidden" name="titulo" id="titulo" value="<?php echo $libros[0]->titulo ?>">
						<input type="hidden" name="id_libro" id="id_libro" value="<?php echo $libros[0]->id_libro ?>">
					</h2>
					<div>
						<img src="<?php echo base_url(); ?>uploads/<?php echo $libros[0]->imagen ?>" width="200" title="">
					</div>
					<div>
						<p>
							<?php echo htmlentities($libros[0]->descripcion,null,"UTF-8"); ?>
						</p>
						<br><br>
						<h3>Detalle:</h3>
						<ul class="lista1">
							<li>Autor: <?php echo $libros[0]->nombre_apellido; ?></li>
							<li>
								Categoria: <?php echo $libros[0]->categoria ?>
								<input type="hidden" id="categoria" name="categoria" value="<?php echo $libros[0]->categoria ?>">
							</li>
							<li>Editorial: <?php echo $libros[0]->editorial ?></li>
							<li>Pagina: <?php echo $libros[0]->pagina ?></li>
							<li>Stock: <?php echo $libros[0]->stock; ?></li>
							<li>
								Precio: <?php echo $libros[0]->precio ?>
								<input type="hidden" name="precio" id="precio" value="<?php echo $libros[0]->precio ?>">
							</li>
						</ul>
						<br>
						<a href="javascript:colocarCarrito();" style="display:block;background:#333;color:#fff;text-align:center">Comprar Libro</a>
						<?php if($admin): ?>
							<div class="opciones" style="width:100%;height:50px;text-align:right;">
								<a href="<?php echo base_url("inicio/modificarLibro/".$libros[0]->id_libro); ?>">Modificar</a>
								<a href="">Eliminar</a>
							</div>
						<?php endif; ?>
					</div>
				</article>
			</section>
			<section class="comentarios">
				<div id="commentResponse">
					<ul>
						<li>
							<h3>Comentarios</h3>
							<img src="<?php echo base_url(); ?>assets/img/mCli.png" width="150">
							<?php 
								$bar = uri_string(); 
								list($c,$m,$id_libro) = explode("/",$bar);
							?>
							<input type="hidden" name="id_libro" id="id_libro" value="<?php echo $id_libro ?>">
							<input type="text" name="usuario" id="usuario" size="44" required placeholder="Ingrese su nombre..."><br>
							<textarea name="comentarioLibro" id="comentarioLibro" cols="43" rows="5" placeholder="Ingrese un comentario..."></textarea>
							<input type="button" name="btoComentar" id="btoComentar" onclick="insertComentario();" value="Comentar">
						</li>
						<?php foreach ($comentarios as $row): ?>
							<li>
								<div>
									<img src="<?php echo base_url(); ?>assets/img/mCli.png" width="50">
									<p>
										<?php echo $row->nombre; ?>:
										<?php echo $row->comentario; ?>
										<br>
										<h5 style="float:right;">
											<?php echo $row->fecha . "|" . $row->hora; ?>
										</h5>
									</p>
								</div>
							</li>
						<?php endforeach ?>
					</ul>
				</div>		
			</section>
			
		</div>
