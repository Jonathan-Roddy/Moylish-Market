<?php
	$this->load->view('header'); 
	$this->load->helper('url');
	$base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
?>
<br>
<h1 class="main"> Insert Produce </h1>
<?php echo form_open_multipart('ProductController/handleInsert');
	echo '<br><br>';
	
	echo 'Produce Code :';
	echo form_input('produceCode', $produceCode);
	
	echo '</br></br>Description :';
	echo form_input('description', $description);

	echo '</br></br>Product Line:';
	echo form_input('productLine', $productLine);

	echo '</br></br>Supplier :';
	echo form_input('supplier', $supplier);
	
	echo '</br></br>Quantity In Stock :';
	echo form_input('quantityInStock', $quantityInStock);

	echo '</br></br>Bulk Buy Price:';
	echo form_input('bulkBuyPrice', $bulkBuyPrice);

	echo '</br></br>Bulk Sale Price:';
	echo form_input('bulkSalePrice', $bulkSalePrice);
	
	echo '</br></br>Select File for Upload :';
	echo form_upload('userfile');
	
	echo '</br></br>';
	
	echo form_submit('submitInsert', "Submit!");

	echo '</br></br>';
	
	echo form_close();
	echo validation_errors();
?>

<?php
	$this->load->view('footer'); 
?>