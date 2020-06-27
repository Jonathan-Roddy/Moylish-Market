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
	<h1 class="main">Visitor Log</h1>

                                   		<table id= "Product"> 
											<tr >
												<th colspan = "10" onclick="sortTable(0)">Date Time</th>
												<th colspan = "10" onclick="sortTable(1)">Session Id</th>
												<th colspan = "10" onclick="sortTable(2)">Page</th>
												<th colspan = "10" onclick="sortTable(3)">Browser Type</th>
												<th colspan = "10" onclick="sortTable(4)">IP</th>
											</tr>
						<?php 	foreach($product_info as $row) { ?>
											<tr>
							<?php
												echo '	<td colspan = "10">'. $row->Today.' </td>';  
												echo '	<td colspan = "10"> '.$row->SessionID.' </td> ';
												echo '	<td colspan = "10"> '.$row->CurrentPage.' </td> ';
												echo '	<td colspan = "10"> '.$row->BrowserType.' </td> ';
												echo '	<td colspan = "10"> '.$row->IP.' </td> ';
							?>
											</tr>
						<?php }?>
													</table>
									<br><br><br><br><br><br>
		
			
   </table>
   <br><br><br>
   <div style = "height: 300px;">
	</div>
</div>
<?php
	$this->load->view('footer'); 
?>