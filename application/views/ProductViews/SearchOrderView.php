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
	<h1 class="main">Searched Order</h1>
	<a href="' . base_url("index.php/AccountController/controlPanel") . "> </a>
		<?php echo $this->pagination->create_links();?>
	<table id= "Product"> 
		
		<tr >
			<th colspan = "10" onclick="sortTable(0)">Order Number</th>
			<th colspan = "10" onclick="sortTable(1)">Order Date</th>
			<th colspan = "10" onclick="sortTable(2)">Required Date</th>
			<th colspan = "10" onclick="sortTable(3)">Shipped Date</th>
			<th colspan = "10" onclick="sortTable(4)">Status</th>
			<th colspan = "10" onclick="sortTable(5)">Comments</th>
			<th colspan = "10" onclick="sortTable(6)">Customer Number</th>
		</tr>

		<?php 
			// If there is a valid search show a table with result
			if($product_info != null)
			{		
				foreach($product_info as $row){	
		?>
				 <tr onclick="window.location='<?php echo base_url('index.php/ProductController/OrderDetails/'.$row->orderNumber);?>' ;">
				<?php	
					echo '	<td colspan = "10">'. $row->orderNumber.' </td>'; 
					echo '	<td colspan = "10"> '.$row->orderDate.' </td> ';
					echo '	<td colspan = "10"> '.$row->requiredDate.' </td> ';
					echo '	<td colspan = "10"> '.$row->shippedDate.' </td> ';
					echo '	<td colspan = "10"> '.$row->status.' </td> ';
					echo '	<td colspan = "10"> '.$row->comments.' </td> ';
					echo '	<td colspan = "10"> '.$row->customerNumber.' </td> ';
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