<?php
	$this->load->view('header'); 
	$this->load->helper('url');
	$base = base_url() . index_page();
	$img_base = base_url()."assets/images/products/";
?>


<?php 
	foreach ($view_data as $row) { 
	
?>

<!--Main container for page content-->  
<div class="container1" > 

	<div class="ProductMain">
		<br><br>
		
		<h3> Product Item : <?php echo $row->produceCode; ?>  </h3>
		<div class ="actionButtons">
		<?php
		if($this->session->userdata('customerNumber'))
		{
			
				$url = "index.php/ProductController/addToCart?produceCode=" . $row->produceCode . '"';
				echo ' <a class = "addCart" href=" '.base_url($url).' "> Add To Cart</a> ';
		
			
			
    		$this->db->select('customerNumber');
			$this->db->select('produceCode');
			$this->db->from('wishlist');
            $this->db->where('customerNumber', $this->session->userdata('customerNumber'));
			$this->db->where('produceCode', $row->produceCode);
			$query = $this->db->get();

			if(count($query->result_array()) > 0)
			{
				$url = "index.php/ProductController/removeFromWishlist?produceCode=" . $row->produceCode . '"';
				echo ' <a class = "addWishlist" href=" '.base_url($url).' ">Remove from Wishlist</a> &nbsp;&nbsp; ';
			}

			else
			{
				$url = "index.php/ProductController/addToWishlist?produceCode=" . $row->produceCode . '"'; 
				echo '<a class = "addWishlist" href=" '.base_url($url).' "> Add to Wishlist</a> ';
											
			}
		}
		?>
		</div>
		
		<br><br>
		
                    <div class="row">
						
						
						<!--Left Hand Side (LHS) content panel--> 
                        <div class="col-md-3" >
                                <div class="panelProduct ">
                                    <!-- <div class="panel-heading"> <h3> Image<h3>  </div> --> 
                                    <div class="panel-body-product">
									<?php
																	
									echo '</br>Description :  </br><h3>'.$row->description. '</h3>';
									echo '</br>Product Line:  </br><h3>' .$row->productLine. '</h3> ';
									echo '</br>Supplier :  </br><h3>'.$row->supplier.'</h3>';
									

																		
									?>
									</div>
                                </div>
								
								
                        </div> 
	
	
						<!--Left Hand Side (LHS) content panel--> 
                        <div class="col-md-3" >
						
                                <div class="panelProduct ">
                                    <!-- <div class="panel-heading"> <h3> Product Info :  <h3>  </div> -->
                                    <div class="panel-body-product">
									
									<?php
									
										
									echo '</br>Quantity In Stock : </br><h3>' .$row->quantityInStock. '</h3>  ';
									
									if($this->session->userdata('adminNumber'))
													echo '</br>Bulk Buy Price:  </br><h3>€'.$row->bulkBuyPrice. '</h3> ';

									echo '</br>Bulk Sale Price :  </br><h3>€'.$row->bulkSalePrice.'</h3>  ';
	
									echo '</br></br>';
																	
									?>
									</div>
                                </div>
								
                        </div>
    
                        <!--Right Hand Side (RHS) content panel--> 
                        <div class="col-md-6" >
                                <div class="panelProduct ">
                                    <!-- <div class="panel-heading"> <h3> Image<h3>  </div> --> 
																	
                                    <?php
									
									echo form_open();
									echo '</br></br>';
				
									echo '<img src='. $img_base.'full/'.$row->Photo.'>';

									echo '</br></br>';
									echo form_close();								
									
									?>
									
                                </div>
                        </div> 
					
			</div>
        </div>  

		
		<br><br><br><br>
		
</div><!--end of main container-->

		
	<?php	
		
	}
?>


<?php
	$this->load->view('footer'); 
?>