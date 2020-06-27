<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	$this->load->view('header'); 
	$this->load->helper('url');
	$base = base_url() . index_page();
	$img_base = base_url()."assets/images/products/";
?>
<div class="container">
	<br><br>
	<h1 class="main">List of Products</h1>
	
		<?php echo $this->pagination->create_links();?>
	
	<br><br>
	<table width="95%" id= "Product"> 
		
		<tr>
			<th align="left" onclick="sortTable(0)">Produce Code</th>
			<th align="left" onclick="sortTable(1)">Description</th>
			<th align="left" onclick="sortTable(2)">Product Line</th>
			<th align="left" onclick="sortTable(3)">Supplier</th>
			<th align="left" onclick="sortTable(4)">Quantity In Stock</th>
			<th align="left" onclick="sortTable(5)">Bulk Buy Price</th>
			<th align="left" onclick="sortTable(6)">Bulk Sale Price </th>
			<th align="left" >Photo</th>
		</tr>

		<?php foreach($product_info as $row){?>
		<tr onclick="window.location='<?php echo base_url('index.php/ProductController/viewProduct/'.$row->produceCode);?>' ;">
			<td><?php echo $row->produceCode;?></td>
			<td><?php echo $row->description;?></td>
			<td><?php echo $row->productLine;?></td>
			<td><?php echo $row->supplier;?></td>
			<td><?php echo $row->quantityInStock;?></td>
			<td><?php echo $row->bulkBuyPrice;?></td>
			<td><?php echo $row->bulkSalePrice;?></td>
			<td><img src="<?php echo $img_base.'thumbs/'.$row->Photo;?>"></td>
			<td><?php echo anchor('ProductController/viewProduct/'.$row->produceCode, 'View'); ?> </td>
			<td><?php echo anchor('ProductController/editProduct/'.$row->produceCode, 'Update'); ?> </td>			
			<td><?php echo anchor('ProductController/deleteProduct/'.$row->produceCode, 'Delete', 'onclick = "return checkDelete()"'); ?> </td>
		</tr>     
		<?php }?>  
   </table>
   <br><br>
</div>
<?php
	$this->load->view('footer'); 
?>