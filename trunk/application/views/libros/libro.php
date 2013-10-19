 		<div id="wrapper">
			
			<section class="viewLibro">
				<article class="libroCompleto">
					<h2>El titulo del libro Acá</h2>
					<div>
						<img src="<?php echo base_url(); ?>uploads/dolin.jpg" width="200" title="">
					</div>
					<div>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</p>
						<br><br>
						<h3>Detalle:</h3>
						<ul class="lista1">
							<li>Autor: Tanto</li>
							<li>Categoria: tanto</li>
							<li>Editorial: tanto</li>
							<li>Pagin: 124</li>
							<li>Stock: 1</li>
							<li>Precio: $10</li>
						</ul>
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
							<textarea name="comentarioLibro" id="comentarioLibro" cols="50" rows="5" placeholder="Ingrese un comentario..."></textarea>
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
