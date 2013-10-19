 		<div id="wrapper">
			<div class="subMenuAdmin">
				<ul>
					<li>
						<input type="search" name="q" id="q">
						<a href="#"><span class="icoSearch">&nbsp;</span></a>
					</li>
					<?php if($admin): ?>
						<li><a href="<?php echo base_url("inicio/newlibros"); ?>">Nuevo+</a></li>
					<?php endif; ?>
				</ul>
			</div>
			<section class="libros_view">
				<h3>Stock</h3>
				<?php foreach($libros as $row): ?>
				<article id="<?php echo $row->id_libro; ?>" >
					<div>
						<span class="r_image">
							<img src="<?php echo base_url(); ?>uploads/<?php echo $row->imagen; ?>" width="150" title="">
						</span>
					</div>
					<div class="parrafo1">
						<p>
							<?php  
								echo "<span class='titulo1'>" .$row->titulo . "</span><br><br>" . substr($row->descripcion,0,150) . "...";
							?>
						</p>
					</div>
				</article>
				<?php endforeach; ?>
				<script type="text/javascript">
					(function(){
						$("article").click(function(){
							var id = $(this).attr('id');
							location.href = '<?php echo base_url("inicio/verLibro"); ?>/'+id;
						});
					})();
				</script>		
			</section>
			
		</div>
