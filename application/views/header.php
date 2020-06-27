<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	$this->load->helper('url'); 
	$this->load->helper('form');
	$this->load->helper('cookie');
	$cssbase = base_url()."assets/css/";
	$jsbase = base_url()."assets/js/";
	$img_base = base_url()."assets/images/";
	$base = base_url() . index_page();
	
?>

<?php echo '<link href="' . base_url() . 'assets/css/bootstrap.css" rel="stylesheet" type="text/css" />'; ?>

<script>

function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("Product");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc";
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}




</script>




<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Moylish Market</title>

<link href="<?php echo $cssbase . "style.css"?>" rel="stylesheet" type="text/css" media="all" />
<script src="<?php echo $jsbase."common.js"?>"></script>
	
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</head>

<header>
	
	<div class = "menu">
		
		<nav class="navbar  fixed-top" style="background-color: #4b853e;" >	
		
			<!-- ------------------------------------------------------------------------------------------------ -->
			
				<div class="col-4">
					<!-- Logo -->
					<!--<img class="image" src="<?php echo $img_base . "site/banana.gif"?>" /> -->
					<img class="image" src="<?php echo $img_base . "site/spinner-chicken.gif"?>" />
					<!-- Brand -->
					<div class="logo">
						<?php echo '<a href="' . base_url() . '" ><h2><span id="no">Moylish</span> <span id="yes">Market</span></h2> </a>'; ?>
					</div>
					
				</div>
				
				<div class="col-5">
					<form class="navbar-form">
						<!-- Search -->
                        <?php
							echo '<div id="search">';		
						
							
						?>
							</div>
					</form>
                    
			     </div> 
				
				
				<div class="col-3">
					<!-- Login -->
					
					<div class = "ShoppingBasket">
					<?php 
					if($this->session->userdata('customerNumber'))
					{	
										
						//wishlist Size Query	
						$this->db->select('produceCode');
						$this->db->from('wishlist');
						$this->db->where('customerNumber', $this->session->userdata('customerNumber'));
						$query = $this->db->get();
						$wishlist_size = count($query->result_array());
						
						
						if($wishlist_size != 0)
							//Wislist
							echo '<a href="' . base_url("index.php/ProductController/ProductWishlist")  . '"><img class = "wislistIcon" src=" '.$img_base .'site/wishlist_icon3.png"/><span class = "wishlistIconNumber">(' . $wishlist_size . ')</span></a>';
						
						if($this->cart->total_items() != 0)		
							//Cart
							echo '<a href="' . base_url("index.php/ProductController/Cart")  . '"><img class = "wislistIcon" src=" '.$img_base .'site/cart_icon.png"/><span>(' .$this->cart->total_items(). ')</span></a>';
						
						//Orders
						echo '<a href="' . base_url("index.php/ProductController/orders")  . '"><span>Orders</span></a>';	
						//Logout
						echo '<a href="' . base_url("index.php/AccountController/logout_user")  . '"><span>Logout</span></a>';
					}
					//Admin
					else if($this->session->userdata('adminNumber'))
					{
						//Control Panel
						echo '<a href="' . base_url("index.php/AccountController/controlPanel") . '"><span>' . $this->session->userdata('username') . '</span></a>';
						//Admin logout
						echo '<a href="' . base_url("index.php/AccountController/logout_user")  . '"><span>Logout</span></a>';
						//echo '<div id="'
					}  
					else
					{
						//Login
						echo '<div id="header_login">';	
						echo '<a href="' . base_url() . "index.php/AccountController/login" . '">Login/Create Account</a><br>';	
						echo '</div>';								
					}
			
					?>
					</div> 
					<br>
				</div>
				
				
				 
				
		</nav>
		
		<nav class="navbar navbar-dark navbar-expand-sm justify-content-center fixed-top fixed-top-2 nav-fill" style = "background-color: #4b853e; font-size:120%; border-radius: 0px 0px 15px 15px; ">
		
					<ul class="navbar-nav">
						
				<!-- Links -->
				<li class="nav-item">
					<a class="nav-link" href= "<?php echo base_url('index.php/ProductController/BakedGoodsView');?> ">Baked Goods</a>
				</li>
				
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('index.php/ProductController/EggsDairyView');?>  ">Eggs & Dairy</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('index.php/ProductController/ExoticFruitView');?> ">Exotic Fruit</a>
				</li>
				
				<li class="nav-item">
					<a class="nav-link" href=" <?php echo base_url('index.php/ProductController/FruitView');?> ">Fruit</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('index.php/ProductController/JamsPreservesView');?> ">Jams and Preserves</a>
				</li>
				
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('index.php/ProductController/SaladView');?> ">Salad</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('index.php/ProductController/VegetableView');?> ">Vegetables</a>
				</li>
				
				
			
				</ul>
			
		
			
		
		</nav>
	</div>
	
	<br><br><br><br>
	
	
	
</header>

<body>


