<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	$this->load->view('header'); 
	$this->load->helper('url');
	$base = base_url() . index_page();
	$img_base = base_url()."assets/images/products/";
?>

<div class="container">

	<br><br>
	<h1 class="main">List of All Customer</h1>
	<?php echo '<a class = "back_Btn" href="' . base_url("index.php/AccountController/controlPanel") . '"><span>Return to Control Panel</span></a>'; ?>
		
	<br><br>
	<table class= "Product"> 
		
		<tr>
			<th align="center" onclick="sortTable(0)">Customer ID</th>
			<th align="center" onclick="sortTable(1)">Company Name</th>
			<th align="center" onclick="sortTable(2)">First Name</th>
			<th align="center" onclick="sortTable(3)">Last Name</th>
			<th align="center" onclick="sortTable(4)">Phone</th>
			<th align="center" onclick="sortTable(5)">Adress</th>
			<th align="center" onclick="sortTable(6)"></th>
			<th align="center" onclick="sortTable(7)">City </th>
			<th align="center" onclick="sortTable(8)">Postal Code</th>
			<th align="center" onclick="sortTable(9)">Country</th>
			<th align="center" onclick="sortTable(10)">Credit Limit</th>
			<th align="center" onclick="sortTable(11)">email </th>
		</tr>

		<?php foreach($customer_info as $row){?>
		<tr onclick="window.location='<?php echo base_url('index.php/ProductController/viewCustomer/'.$row->customerNumber);?>' ;">
			<td><?php echo $row->customerNumber;?></td>
			<td><?php echo $row->customerName;?></td>
			<td><?php echo $row->contactFirstName;?></td>
			<td><?php echo $row->contactLastName;?></td>
			<td><?php echo $row->phone;?></td>
			<td><?php echo $row->addressLine1;?></td>
			<td><?php echo $row->addressLine2;?></td>
			<td><?php echo $row->city;?></td>
			<td><?php echo $row->postalCode;?></td>
			<td><?php echo $row->country;?></td>
			<td><?php echo $row->creditLimit;?></td>
			<td><?php echo $row->email;?></td>
			<!-- <td><?php echo anchor('ProductController/viewProduct/'.$row->viewCustomer, 'View'); ?> </td>
			<td><?php echo anchor('ProductController/editProduct/'.$row->viewCustomer, 'Update'); ?> </td>			
			<td><?php echo anchor('ProductController/deleteProduct/'.$row->viewCustomer, 'Delete', 'onclick = "return checkDelete()"'); ?> </td> -->
		</tr>     
		<?php }?>  
   </table>
   <br><br>
</div>
<?php
	$this->load->view('footer'); 
?>