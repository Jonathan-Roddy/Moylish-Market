<?php
	$this->load->view('header'); 
	$this->load->helper('url');
	$this->load->helper('cookie');
	$this->load->helper('form');
	$base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
	
		// Add a new Visit ot Index page
			$today = date('d/m/Y H:i:s');
		
			// customer		
			if( $this->session->userdata('customerNumber') )
				$value = $this->session->userdata('email');
			// Admin
			else if( $this->session->userdata('adminNumber') )
				$value = $this->session->userdata('username');
			//Guest
			else
				$value = "Guest";
		
			$currentPage = $_SERVER['PHP_SELF'] ;
			$browserType = $_SERVER['HTTP_USER_AGENT'];
			$ip = $_SERVER['REMOTE_ADDR'];
		
			$info = array( 'Today' => $today , 'SessionID' => $value, 'CurrentPage' => $currentPage,'BrowserType' => $browserType, 'IP' => $ip);
		
			$this->db->insert('loggedIn', $info);
		
		
		// Check if any user has a remember me function 
				
		$result = $this->AccountModel->getRemeberMe(); //Gets ID and password hash of user
		// Gets whoever has remember me 
		// print_r( $result);
		$customerNumber = null;
        $email = null;
        $contactFirstName = null;
		foreach($result as $results){
				$customerNumber = $results->customerNumber;
				$email = $results->email;
				$contactFirstName = $results->contactFirstName;
			}		
		if($result != null)
		{
			
			
			$sessiondata = array('customerNumber' => $customerNumber, 'email' => $email, 'contactFirstName' => $contactFirstName);
			$this->session->set_userdata($sessiondata);
		}
		else
			//$this->session->sess_destroy();
			
		
	
		
	
?>
<!--Main container for page content-->  
<div class="container" > 
	<div class="main">
		<br><br>	
			
		<h1>Welcome to Moylish Market</h1>
				
			            <div class="row">
   	
						<!--Left Hand Side (LHS) content panel--> 
                        <div class="col-md-8" >
                                <div class="panel ">
								<br>
                                    <div class="panel-heading"> <h3> Why Fresh? <h3>  </div>
                                    <div class="panel-body">
                                    
									This is the heart of our business. We love sourcing, producing and creating great food every day for our customers. We carefully hand pick all of the produce and ingredients that we use and sell every day.  

                                    Our fresh food teams strive to create tasty and convenient food. We work hard to ensure our food is always easy to take or easy to make. We work to be industry leaders in baked and confectionery breads, homemade salads, gourmet sandwiches, freshly made hot food and much more.

                                    The key to our fresh food departments is our quality and variety. We understand our customers tastes and interests change so we created a working ethos – So many foods for so many moods  
                                    </div>
																	
                                </div>
								<div class="panel ">
								<div class="panel-heading"> <h3> Where you can find us.. <h3>  </div>
                                    <div class="panel-body">
										<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2419.1700070689367!2d-8.650688784721032!3d52.674967732486174!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x485b5cf73a3da16d%3A0xf55474500d42913!2sLIT!5e0!3m2!1sen!2sie!4v1578583737840!5m2!1sen!2sie" 
										width="700" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
										
									</div>
									
								</div>
								
								<div class="panel ">
								<div class="panel-heading"> <h3> Cookies <h3>  </div>
                                    <?php
								    print_r( $result);	
									echo '<br>';									
									if($_COOKIE) 
									{
										$this->session->set_userdata(get_cookie('My_Cookie'));	
										print_r($_COOKIE);     //print all cookie
										echo '<br>';
									}
									else
										echo "COOKIE is not set";    
									
		
										?>
									
								</div>
								
								
								
                        </div>
    
                        <!--Right Hand Side (RHS) content panel--> 
                        <div class="col-md-4" >
								
								<div class="panel ">
								<br>
                                    <div class="panel-body">
                                    <?php
										echo '<div id="search">';		
										echo form_open('ProductController/SearchProducts'); 
										echo form_input(array('id' => 'search_box', 'name' => 'searchInput', 'type' => 'text', 'placeholder' => '   Search..', 'required'=>'required'));
										echo form_submit(array('id' => 'search_btn', 'name' => 'searchButton', 'value' => 'Search'));
										//$this->input->post('search');
										echo form_close(); 
										echo '</div><br>';
									?>
									</div>
								</div>
								
								
						
                                <div class="panel ">
								<br>
                                    <div class="panel-heading"> <h3> Whats New!!<h3>  </div>
                                    <div class="panel-body">
                                    <p>We are proud to bring you our new 'Fresh' website filled with tons of new updates that we hope will help you get the best products faster</p>
                                        <ul class = "a">
                                            <li> Registering </li>
                                            <li> Login/Logout - Remember me </li>
                                            <li> Browse Products - Search Products</li>
                                            <li> Add/Remove from WishList </li>
											<li> Add/Remove from Cart </li>
                                            <li> Updated your Order  </li>
                                        </ul>
									</div>
								</div>
								
								<div class="panel ">
									<p> <h2> Contact us </h2>
									call us  @: (061 239 000) 
									<br>
									or <a href = "mailto : k00212118@student.lit.ie">Send an email </a>
									<br><br>
								</div>	
								
								<div class="panel ">
								<h3> Opening Hours</h3>
											<p> Monday		7:30 - 21:00
                                            <p> Tuesday		7:30 - 21:00
                                            <p> Wednesday		7:30 - 21:00
                                            <p> Thursday		7:30 - 21:00
                                            <p> Friday		7:30 - 21:00
											<p> Saturday		7:30 - 13:00
											<br>		
											
								</div> 
								<div class="panel ">
								<h5> Total Visits on this Website:  </h5>
								<h4> <?php echo $this->db->count_all('loggedIn'); ?> </h4>
								<br>		
											
								</div> 
                    </div>
			</div><!--end of Row container-->
		</div>	<!--end of main container-->
				
		<br><br><br><br>
</div>

<?php
	$this->load->view('footer'); 
?>