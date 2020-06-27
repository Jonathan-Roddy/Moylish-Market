<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	$this->load->view('header'); 
	$this->load->helper('url');
	$base = base_url() . index_page();
	$img_base = base_url()."assets/images/products/";
?>
<div class="container" > 
	<br><br>
	<h1 class="main">List of Exotic Fruit</h1>
		<?php echo $this->pagination->create_links();?>
	<table id= "Product"> 
		
		<tr >
			<th onclick="sortTable(0)">Description</th>
			<th colspan = "10"onclick="sortTable(1)">Supplier</th>
			<th colspan = "10"onclick="sortTable(2)">Quantity In Stock</th>
			<th colspan = "10"> Photo</th>
		</tr>

		<?php foreach($product_info as $row){?>
		<tr onclick="window.location='<?php echo base_url('index.php/ProductController/viewProduct/'.$row->produceCode);?>' ;">
			<td ><?php echo $row->description;?></td>
			<td colspan = "10"><?php echo $row->supplier;?></td>
			<td colspan = "10"><?php echo $row->quantityInStock;?></td>
			<td colspan = "10"> <img src="<?php echo $img_base.'thumbs/'.$row->Photo;?>"></td>
		</tr>     
		<?php }?>  
   </table>
   <br><br><br><br><br><br>
</div>

<?php
	$this->load->view('footer'); 
?>