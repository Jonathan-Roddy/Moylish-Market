<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	$this->load->view('header'); 
	$this->load->helper('url');
	$base = base_url() . index_page();
	$img_base = base_url()."assets/images/products/";
	$jsbase = base_url()."assets/js/";
?>

<div class="container" > 
	<br><br>	
		<?php echo '<div class="wishlist_heading">' . $this->session->userdata('contactFirstName') . '\'s Wishlist</div>';
			echo 'Total';
			$url = "index.php/ProductController/emptyWishlist";
			echo ' <a id = "emptyWishlist" href=" '.base_url($url).' ">Empty Wishlist</a> ';
		?>
	 <table id= "Product"> 
		
		<tr >
			<th onclick="sortTable(0)">Description</th>
			<!-- <th> Buy/Sell</th> -->
			<th> Photo</th>
			<th></th>
			
		</tr>
	 <?php for($i=0; $i<count($data); $i++){?>		
    	<tr onclick="window.location='<?php echo base_url('index.php/ProductController/viewProduct/'.$data[$i]['produceCode']);?>' ;">
		<?php echo '<div class="list_product">'; ?>
	    	<td><?php echo '<span class="list_product_name">' . $data[$i]['description'] . '</span>'; ?></td>
			<!--<td><?php echo '<span class="list_product_name">' . $data[$i]['bulkBuyPrice'] . '</span>'; ?></td> -->
	    	<!--<td><?php echo '<span class="list_product_name">' . $data[$i]['bulkSalePrice'] . '</span>'; ?></td> -->
	    	<td><?php echo '<span class="list_product_image">' . $data[$i]['photo'] . '</span>'; ?></td>
			<td>
			<?php 
				if($this->cart->has_options($row_id = $data[$i]['produceCode']))
				{
					$url = "index.php/ProductController/removeFromCart?produceCode=" .$data[$i]['produceCode'] . '"'; 
					echo ' <a id="xWishlist" title="Remove from Cart" href=" '.base_url($url).' " >-</a> ';
				}
				else 
				{
					$url = "index.php/ProductController/addToCartFromWishlist?produceCode=" .$data[$i]['produceCode'] . '"'; 
					echo ' <a id="addC" title="Add to Cart" href=" '.base_url($url).' " >+</a> ';
					
				}
				?>
			
			<?php $url = "index.php/ProductController/removeFromMainWishlist?produceCode=" .$data[$i]['produceCode'] . '"'; echo ' <a id="xWishlist" title="Remove from your Wishlist" href=" '.base_url($url).' " >x</a> ';?>
			</td>
	<?php
    	echo '</div>';
    	echo '</a>';
    }
    ?>
  </table>
   <br><br><br><br><br><br>  <br><br><br><br><br><br>
</div>



<?php
	//var_dump($this->cart);

	$this->load->view('footer'); 
?>