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