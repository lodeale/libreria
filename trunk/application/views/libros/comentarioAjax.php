<ul>
	<li>
		<h3>Comentarios</h3>
		<img src="<?php echo base_url(); ?>assets/img/mCli.png" width="150">
		
		<input type="hidden" name="id_libro" id="id_libro" value="<?php echo $id_libro ?>">
		<input type="text" name="usuario" id="usuario" size="44" required placeholder="Ingrese su nombre..."><br>
		<textarea name="comentarioLibro" id="comentarioLibro" cols="50" rows="5" placeholder="Ingrese un comentario..."></textarea>
		<input type="button" name="btoComentar" id="btoComentar" onclick="insertComentario();" value="Comentar">
	</li>
	<?php foreach ($comentarios as $row): ?>
		<li>
			<div>
				<img src="<?php echo base_url(); ?>assets/img/mCli.png" width="50">
				<h5><?php $row->nombre; ?></h5>
				<p>
					<?php echo $row->comentario; ?>
						<br>
						<?php echo $row->fecha . "|" . $row->hora; ?>
				</p>
			</div>
		</li>
	<?php endforeach ?>
</ul>