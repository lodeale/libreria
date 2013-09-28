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
				<article>
					<div>
						<span class="r_image">
							<img src="<?php echo base_url(); ?>assets/img/<?php echo $row->imagen; ?>" width="100" title="">
						</span>
					</div>
					<div>
						<p>
							<?php  
								echo $row->titulo . "<br>" . $row->descripcion;
							?>
						</p>
					</div>
				</article>
				<?php endforeach; ?>		
			</section>
			
		</div>
