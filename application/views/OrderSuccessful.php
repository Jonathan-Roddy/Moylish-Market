<?php
	$this->load->view('header'); 
	$this->load->helper('url');
	$this->load->helper('cookie');
	$this->load->helper('form');
	$base = base_url() . index_page();
	$img_base = base_url()."assets/images/products/";
	
?>

<div class="container" > 
	<br><br>	
	<h1 class="main">Order Successful</h1>

				<div class= "noSearch">
				<?php echo '<img src=" '.$img_base .'full/Successful.png">'; ?> 
				</div>	
			
   <br><br><br>
</div>

<?php
	$this->load->view('footer'); 
?>