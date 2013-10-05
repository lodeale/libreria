
		<div id="wrapper">
			<section id="sec_left">
				<h3>Estrenos</h3>
				<?php foreach($libros as $row): ?>
				<article>
					<div>
						<span class="r_image">
							<img src="<?php echo base_url(); ?>uploads/<?php echo $row->imagen; ?>" width="150" title="">
						</span>
					</div>
					<div>
						<p>
							<?php  
								echo "<span class='titulo1'>" .$row->titulo . "</span><br><br>" . substr($row->descripcion,0,150) . "...";
							?>
						</p>
					</div>
				</article>
				<?php endforeach; ?>		
			</section>
			<section id="sec_right">
				<h3>Mas Votados</h3>
				<article>
					<div>
						<span class="r_image">
							<img src="<?php echo base_url(); ?>assets/img/image4" title="">
						</span>
					</div>
					<div>
						<h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h4>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						
						</p>
					</div>	
				</article>
				<article>
					<div>
						<span class="r_image">
							<img src="<?php echo base_url(); ?>assets/img/image6" title="">
						</span>
					</div>
					<div>
						<h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h4>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							
						</p>
					</div>	
				</article>
			</section>
		</div>
