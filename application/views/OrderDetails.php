<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	$this->load->view('header'); 
	$this->load->helper('url');
	$base = base_url() . index_page();
	$img_base = base_url()."assets/images/products/";
	$jsbase = base_url()."assets/js/";
?>

<div class="container">

	<div class="ProductMain">
		<br>
		
		<h3> Order Details </h3>
				
		<br><br>

	<table id="Product">
		<tr >
			<th colspan = "10" onclick="sortTable(2)">Quantity Ordered</th>
			<th colspan = "10" onclick="sortTable(3)"> Price Each</th>
			<th colspan = "10" onclick="sortTable(0)">Order Number</th>
			<th colspan = "10" onclick="sortTable(1)">Product ID</th>
			<th></th>
			
		</tr>
		<?php foreach($product_info as $data)  { ?>	
		<tr>
			<td colspan = "10"><?php echo $data['quantityOrdered'] ;?></td>
			<td colspan = "10"><?php echo $data['priceEach'] ;?></td>
			<td colspan = "10"><?php echo $data['orderNumber'] ;?></td>
			<td colspan = "10"><?php echo $data['productCode'] ;?></td>
			<td> <?php echo ' <a class = "addCart" href=" '. base_url('index.php/ProductController/viewProduct/'.$data['productCode'] ).' "> View Product</a> '; ?> </td>
			
		</tr>
		<?php } ?>
	</table>
	<br><br><br>
	</div>
</div>


<?php
	$this->load->view('footer'); 
?>

