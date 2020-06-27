<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	$this->load->view('header'); 
	$this->load->helper('url');
	$this->load->helper('form');
	$base = base_url() . index_page();
	$img_base = base_url()."assets/images/products/";
?>

<div class="container" > 
	<br><br>	
	<h1 class="main">Searched Item</h1>
		<?php echo $this->pagination->create_links();?>
	<table id= "Product"> 
		<?php 
			// If there is a valid search show a table with result
			if($product_info != null)
			{		
				foreach($product_info as $row){	
		?>
		<tr >
			<th onclick="sortTable(0)">Description</th>
			<th colspan = "10" onclick="sortTable(1)">Supplier</th>
			<th colspan = "10" onclick="sortTable(2)">Quantity In Stock</th>
			<th colspan = "10" > Photo</th>
		</tr>

				 <tr onclick="window.location='<?php echo base_url('index.php/ProductController/viewProduct/'.$row->produceCode);?>' ;">
				<?php	
					echo '	<td>'. $row->description.' </td>'; 
					echo '	<td colspan = "10"> '.$row->supplier.' </td> ';
					echo '	<td colspan = "10"> '.$row->quantityInStock.' </td> ';
					echo '	<td colspan = "10"> <img src=" '.$img_base.'thumbs/'.$row->Photo .'"></td> ';
				?>
				</tr>  
		<?php 
				}
			}
		
			// If there is not a valid search show this..
			else{
				echo '<div class= "noSearch">';
				echo '<img src=" '.$img_base .'full/not-found.jpg">';
				echo '</div>';
			}
			
			
			
		?>
		
		
			
   </table>
   <br><br><br>
   <div style = "height: 300px;">
	</div>
</div>
<?php
	$this->load->view('footer'); 
?>