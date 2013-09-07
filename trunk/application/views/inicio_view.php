
		<div id="wrapper">
			<section id="sec_left">
				<h3>Bastesellers</h3>
				<?php foreach($libros as $row): ?>
				<article>
					<div>
						<span class="r_image">
							<img src="<?php echo base_url(); ?>assets/img/<?php echo $row->imagen; ?>" title="">
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
			<section id="sec_right">
				<h3>Bastesellers</h3>
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
