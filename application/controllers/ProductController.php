<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ProductController extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('ProductModel');
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->library('table');
		$this->load->library('session'); 
		$this->load->helper('cookie');

			
	}

	public function index()
	{	$this->load->view('index');
	}

	// INSERT CODE HERE //
	public function viewProduct($produceCode)
    {	
		$data['view_data']= $this->ProductModel->drilldown($produceCode);
		$this->load->view('ProductView', $data);
    }
	
	public function ProductListView() 
	{	$config['base_url']=site_url('ProductController/ProductListView/');
		$config['total_rows']=$this->ProductModel->record_count();
		$config['per_page']=15;
		$this->pagination->initialize($config);
		$data['product_info']=$this->ProductModel->get_all_products(15,$this->uri->segment(3));
		$this->load->view('ProductListView',$data);
	}
	
	public function customerListView() 
	{	$config['base_url']=site_url('ProductController/croductListView/');
		$config['total_rows']=$this->ProductModel->record_count_c();
		$config['per_page']=15;
		$this->pagination->initialize($config);
		$data['customer_info']=$this->ProductModel->get_all_customers(15,$this->uri->segment(3));
		$this->load->view('customerListView',$data);
	}
	
	
	public function BakedGoodsView() 
	{	
		$config['base_url']=site_url('ProductController/BakedGoodsView/');
		$config['total_rows']=$this->ProductModel->record_count_bg();
		$config['per_page']=15;
		$this->pagination->initialize($config);
		$data['product_info']=$this->ProductModel->get_all_BakedGoods(15,$this->uri->segment(3));
		$this->load->view('ProductViews/BakedGoodsView', $data);
	}
	
	public function EggsDairyView() 
	{	
		$config['base_url']=site_url('ProductController/EggsDairyView/');
		$config['total_rows']=$this->ProductModel->record_count_ed();
		$config['per_page']=15;
		$this->pagination->initialize($config);
		$data['product_info']=$this->ProductModel->get_all_EggsDairy(15,$this->uri->segment(3));
		$this->load->view('ProductViews/EggsDairyView', $data);
	}
	
	public function ExoticFruitView() 
	{	
		$config['base_url']=site_url('ProductController/ExoticFruitView/');
		$config['total_rows']=$this->ProductModel->record_count_ef();
		$config['per_page']=15;
		$this->pagination->initialize($config);
		$data['product_info']=$this->ProductModel->get_all_ExoticFruit(15,$this->uri->segment(3));
		$this->load->view('ProductViews/ExoticFruitView', $data);
	}
	
	public function FruitView() 
	{	
		$config['base_url']=site_url('ProductController/FruitView/');
		$config['total_rows']=$this->ProductModel->record_count_f();
		$config['per_page']=16;
		$this->pagination->initialize($config);
		$data['product_info']=$this->ProductModel->get_all_Fruit(16,$this->uri->segment(3));
		$this->load->view('ProductViews/FruitView', $data);
	}
	
	public function JamsPreservesView() 
	{	
		$config['base_url']=site_url('ProductController/JamsPreservesView/');
		$config['total_rows']=$this->ProductModel->record_count_jp();
		$config['per_page']=15;
		$this->pagination->initialize($config);
		$data['product_info']=$this->ProductModel->get_all_JamsPreserves(15,$this->uri->segment(3));
		$this->load->view('ProductViews/JamsPreservesView', $data);
	}
	
	public function SaladView() 
	{	
		$config['base_url']=site_url('ProductController/SaladView/');
		$config['total_rows']=$this->ProductModel->record_count_s();
		$config['per_page']=15;
		$this->pagination->initialize($config);
		$data['product_info']=$this->ProductModel->get_all_Salad(15,$this->uri->segment(3));
		$this->load->view('ProductViews/SaladView', $data);
	}
	
	public function VegetableView() 
	{	
		$config['base_url']=site_url('ProductController/VegetableView/');
		$config['total_rows']=$this->ProductModel->record_count_v();
		$config['per_page']=15;
		$this->pagination->initialize($config);
		$data['product_info']=$this->ProductModel->get_all_Vegetables(15,$this->uri->segment(3));
		$this->load->view('ProductViews/VegetableView', $data);
	}
	
	public function editProduct($produceCode)
    {	
		$data['edit_data']= $this->ProductModel->drilldown($produceCode);
		$this->load->view('updateProductView', $data);
    }

	public function deleteProduct($produceCode)
    {	
		$deletedRows = $this->ProductModel->deleteProductModel($produceCode);
		if ($deletedRows > 0)
			$data['message'] = "$deletedRows Product has been deleted";
		else
			$data['message'] = "There was an error deleting the Product with an ID of $produceCode";
		$this->load->view('displayMessageView',$data);
    }

    public function updateProduct($produceCode)
    {	
		$pathToFile = $this->uploadAndResizeFile();
		$this->createThumbnail($pathToFile);

		$this->db->select("produceCode,description,productLine,supplier,quantityInStock,bulkBuyPrice,bulkSalePrice,Photo"); 

		//set validation rules
			$this->form_validation->set_rules('produceCode', 'Produce Code ', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');
			$this->form_validation->set_rules('productLine', 'Product Line', 'required');	
			$this->form_validation->set_rules('supplier', 'Supplier', 'required');
			$this->form_validation->set_rules('quantityInStock', 'Quantity In Stock', 'required');
			$this->form_validation->set_rules('bulkBuyPrice', 'Bulk Buy Price', 'required');
			$this->form_validation->set_rules('bulkSalePrice', 'Bulk Sale Price', 'required');	
			
	
		//get values from post
		$produceCode = $this->input->post('produceCode');
		//get values from post
			$aProduct['description'] = $this->input->post('description');
			$aProduct['productLine'] = $this->input->post('productLine');
			$aProduct['supplier'] = $this->input->post('supplier');
			$aProduct['quantityInStock'] = $this->input->post('quantityInStock');
			$aProduct['bulkBuyPrice'] = $this->input->post('bulkBuyPrice');
			$aProduct['bulkSalePrice'] = $this->input->post('bulkSalePrice');
			$aProduct['Photo'] = $_FILES['userfile']['name'];

		//check if the form has passed validation
		if (!$this->form_validation->run()){
			//validation has failed, load the form again
			$this->load->view('updateProductView', $aProduct);
			return;
		}

		
		//check if update is successful
		if ($this->ProductModel->updateProductModel($aProduct, $produceCode)) {
			redirect('ProductController/ProductListView');
		}
		else {
			$data['message']="Uh oh ... problem on update";
		}
    }

	public function handleInsert(){
		if ($this->input->post('submitInsert')){

			$pathToFile = $this->uploadAndResizeFile();
			$this->createThumbnail($pathToFile);
				
				
			//set validation rules
			$this->form_validation->set_rules('produceCode', 'Produce Code ', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');
			$this->form_validation->set_rules('productLine', 'Product Line', 'required');	
			$this->form_validation->set_rules('supplier', 'Supplier', 'required');
			$this->form_validation->set_rules('quantityInStock', 'Quantity In Stock', 'required');
			$this->form_validation->set_rules('bulkBuyPrice', 'Bulk Buy Price', 'required');
			$this->form_validation->set_rules('bulkSalePrice', 'Bulk Sale Price', 'required');	


			//get values from post
			$aProduct['produceCode'] = $this->input->post('produceCode');
			$aProduct['description'] = $this->input->post('description');
			$aProduct['productLine'] = $this->input->post('productLine');
			$aProduct['supplier'] = $this->input->post('supplier');
			$aProduct['quantityInStock'] = $this->input->post('quantityInStock');
			$aProduct['bulkBuyPrice'] = $this->input->post('bulkBuyPrice');
			$aProduct['bulkSalePrice'] = $this->input->post('bulkSalePrice');
			$aProduct['Photo'] = $_FILES['userfile']['name'];
			
			//check if the form has passed validation
			if (!$this->form_validation->run()){
				//validation has failed, load the form again
				$this->load->view('insertProductView', $aProduct);
				return;
			}

			//check if insert is successful
			if ($this->ProductModel->insertProductModel($aProduct)) {
				$data['message']="The insert has been successful";
			}
			else {
				$data['message']="Uh oh ... problem on insert";
			}
			
			//load the view to display the message
			$this->load->view('displayMessageView', $data);
			
			return;
		}
		$aProduct['produceCode'] = "";
		$aProduct['description'] =  "";
		$aProduct['productLine'] =  "";
		$aProduct['supplier'] = "";
		$aProduct['quantityInStock'] =  "";
		$aProduct['bulkBuyPrice'] =  "";
		$aProduct['bulkSalePrice'] = "";
		$aProduct['Photo'] = "";

		//load the form
		$this->load->view('insertProductView', $aProduct);
	}

	public function uploadAndResizeFile()
	{	//set config options for thumbnail creation
		$config['upload_path']='./assets/images/products/full/';
		$config['allowed_types']='gif|jpg|png';
		$config['max_size']='100';
		$config['max_width']='1024';
		$config['max_height']='768';
		
		$this->load->library('upload',$config);
		if (!$this->upload->do_upload())
			echo $this->upload->display_errors();
		else
			echo 'upload done<br>';	
	
		$upload_data = $this->upload->data();
		$path = $upload_data['full_path'];
		
		$config['source_image']=$path;
		$config['maintain_ratio']='FALSE';
		$config['width']='180';
		$config['height']='200';

		$this->load->library('image_lib',$config);
		if (!$this->image_lib->resize())
			echo $this->image_lib->display_errors();
		else
			echo 'image resized<br>';
			
		$this->image_lib->clear();
		return $path;
	}
	
	public function createThumbnail($path)
	{	//set config options for thumbnail creation
		$config['source_image']=$path;
		$config['new_image']='./assets/images/products/thurmbs/';
		$config['maintain_ratio']='FALSE';
		$config['width']='42';
		$config['height']='42';
		
		//load library to do the resizing and thumbnail creation
		$this->image_lib->initialize($config);
		
		//call function resize in the image library to physiclly create the thumbnail
		if (!$this->image_lib->resize())
			echo $this->image_lib->display_errors();
		else
			echo 'thumbnail created<br>';	
	}

	public function SearchProducts()
	{
				
		$search = $this->input->post('searchInput');
		$config['base_url']=site_url('index.php/ProductController/SearchProducts');
		$data['product_info']=$this->ProductModel->SearchAllProducts($search );
		
		
		$this->load->view('ProductViews/SearchView', $data);
			
	}
	
	public function SearchOrders()
	{
				
		$search = $this->input->post('searchOrderInput');
		$config['base_url']=site_url('index.php/ProductController/SearchOrders');
		$data['product_info']=$this->ProductModel->SearchAllOrders($search );
		
		
		$this->load->view('ProductViews/SearchOrderView', $data);
			
	}
	
   	public function ProductWishlist()
    {
        $customerNumber = $this->session->userdata('customerNumber');
        $product_list = $this->ProductModel->get_products_wishlist($customerNumber);
        $data = null;


        for($i=0; $i<count($product_list); $i++)
        {
            $produceCode = $product_list[$i]['produceCode'];

            $product_info = $this->ProductModel->getProductId($produceCode);
            $photo = '<img src="' . base_url() . 'assets/images/products/thumbs/' . $product_info[0]['photo'] . '" alt="' . $product_info[0]['photo'] .'"';

            $data[$i] = array('produceCode' => $product_info[0]['produceCode'], 'description' => $product_info[0]['description'],'bulkBuyPrice' => $product_info[0]['bulkBuyPrice'], 'bulkSalePrice' => $product_info[0]['bulkSalePrice'], 'photo' => $photo);

        }

              
        $this->load->view('wishlist', array('data' => $data));
        

    }

    public function addToWishlist()
    {
        $customerNumber = $this->session->userdata('customerNumber');
        $produceCode = $_GET['produceCode'];
       
        $this->ProductModel->addToWishlist($customerNumber, $produceCode);

        redirect(base_url('index.php/ProductController/viewProduct/' . $produceCode));
        
    }
	
	public function removeFromWishlist()
    {
        $customerNumber = $this->session->userdata('customerNumber');
        $produceCode = $_GET['produceCode'];

        $this->ProductModel->removeFromWishlist($customerNumber, $produceCode);
		redirect(base_url('index.php/ProductController/viewProduct/' . $produceCode));
    }

    public function removeFromMainWishlist()
    {
        $customerNumber = $this->session->userdata('customerNumber');
        $produceCode = $_GET['produceCode'];

        $this->ProductModel->removeFromWishlist($customerNumber, $produceCode);
		redirect(base_url('index.php/ProductController/ProductWishlist'));
    }
	
	public function emptyWishlist()
	{
		$customerNumber = $this->session->userdata('customerNumber');
		$this->ProductModel->emptyWishlist($customerNumber);
        redirect(ProductController);
		
	}
	
	public function product_by_id() 
    {   
        $produceCode = $_GET['produceCode'];
        $data['products'] = $this->productModel->getProductId($produceCode);
              
        foreach($data['products'] as &$row)
        {
            $img=$row['image'];
            $row['image'] = '<img src="' . base_url() . 'assets/images/products/' . $img . '" alt="' . $img .'"';
            //$row['msrp'] = '€' . $row['msrp']; 
        }

        $this->load->view('header');        
        $this->load->view('product', $data);
        $this->load->view('footer'); 
    }

	public function cart()
	{
		$this->load->view('CartView');
	}
	
	public function emptyCart()
	{
		$this->cart->destroy();
		redirect('ProductController/Cart');
	}
	
    public function addToCart()
    {
        $product = $this->ProductModel->getProductId($_GET['produceCode']);
		$produceCode = $_GET['produceCode'];
        $photo = '<img src="' . base_url() . 'assets/images/products/thumbs/' . $product[0]['photo'] . '" alt="' . $product[0]['photo'] .'">';

        $data = array(
            'id'      => $product[0]['produceCode'],
            'qty'     => 1,
			'price'   => 39.95,
            'name' => $product[0]['description'],
            'photo'   => $photo
        );

        $this->cart->insert($data);
        redirect(base_url('index.php/ProductController/viewProduct/'.$produceCode));
    }
	
	public function addToCartFromWishlist()
    {
        $product = $this->ProductModel->getProductId($_GET['produceCode']);
        $photo = '<img src="' . base_url() . 'assets/images/products/thumbs/' . $product[0]['photo'] . '" alt="' . $product[0]['photo'] .'">';

        $data = array(
            'id'      => $product[0]['produceCode'],
            'qty'     => 1,
			'price'   => 39.95,
            'name' => $product[0]['description'],
            'photo'   => $photo
        );

        $this->cart->insert($data);
       redirect(base_url('index.php/ProductController/ProductWishlist'));
    }

    public function removeFromCart()
    {
        $data = array(
            'rowid'  => $_GET['rowid'],
            'qty' => 0
        );

        $this->cart->update($data);
        redirect(base_url('index.php/ProductController/Cart'));
    }

    public function cartQuantity()
    {
        $rowid = $this->input->post("rowid");
        $quantity = $this->input->post("quantity");

        $data = array(
            'rowid'  => $rowid,
            'qty' => $quantity
        );

        $this->cart->update($data);
      
        $this->load->view('CartView');
    }

    public function cartOrder()
    {
        $this->load->view('OrderView');
        
    }

    public function order_quantity()
    {
        $rowid = $this->input->post("rowid");
        $quantity = $this->input->post("quantity");

        $data = array(
            'rowid'  => $rowid,
            'qty' => $quantity
        );

        $this->cart->update($data);
     
        $this->load->view('OrderView');
    }

    public function remove_from_order()
    {
        $data = array(
            'rowid'  => $_GET['rowid'],
            'qty' => 0
        );

        $this->cart->update($data);
        $this->load->view('order');
    }

    public function checkout()
    {
        $orderDate = 
        $required_date = "0000-00-00";
        $orderNumber = null;
        $loop = true;

        while($loop == true)
        {
            $orderNumber = mt_rand(1000,9999);

            if(!$this->ProductModel->if_order_exists($orderNumber))
            {
                $loop = false;
            }
        }

        $data = array(
            'orderNumber' => $orderNumber,
            'orderDate' => date('Y-m-d'),
            'requiredDate' => "0000-00-00",
            'status' => "In Process",
            'customerNumber' => $this->session->userdata('customerNumber')
        );

        if($this->ProductModel->create_order($data))
        {
            foreach ($this->cart->contents() as $item)
            {
                $data = array(
                    'orderNumber' => $orderNumber,
                    'productCode' => $item['id'],
                    'quantityOrdered' => $item['qty'],
                    'priceEach' => $item['price']
                );
                
                $this->ProductModel->create_order_details($data);
            }        

            $this->cart->destroy();
			
            
			$this->load->view('OrderSuccessful');
            echo '<br><a href="' . base_url() .'">Return To Homepage</a>'; 
        }

        else
        {
            echo "Error Creating order";
            echo '<br><a href="' . base_url() .'">Return To Homepage</a>'; 
        }

    }
	
	public function visitorLog()
	{
		$config['base_url']=site_url('ProductController/Visitor');
		$data['product_info']=$this->ProductModel->visitorLog();
		$this->load->view('VisitorLogView',$data);
	}
	
    public function adminOrders()
    {
		
        if($this->input->post('orderNumber'))
        {
			$config['total_rows']=$this->ProductModel->record_count_Order();
			$config['per_page']=15;
			$this->pagination->initialize($config);
            
			$orderNumber = $this->input->post('orderNumber');
            $data['requiredDate'] = $this->input->post('requiredDate');
            $data['shippedDate'] = $this->input->post('shippedDate');
            $data['status'] = $this->input->post('status');
            $data['comments'] = $this->input->post('comments');
			
			//$data['product_info']=$this->ProductModel->update_order($orderNumber, $data,15,$this->uri->segment(3);
            $this->ProductModel->update_order($orderNumber, $data);
        }  

        $data = $this->ProductModel->get_orders();
        $this->load->view('AdminOrders', array('data' => $data));
    }

    public function orders()
    {
        if($this->input->post('orderNumber'))
        {
            $orderNumber = $this->input->post('orderNumber');
            $data['requiredDate'] = $this->input->post('requiredDate');
            $data['shippedDate'] = $this->input->post('shippedDate');
            $data['status'] = $this->input->post('status');
            $data['comments'] = $this->input->post('comments');

            $this->ProductModel->update_order($orderNumber, $data);
        }  

        $data = $this->ProductModel->get_orders_by_customer($this->session->userdata('customerNumber'));
        $this->load->view('orders', array('data' => $data));
        
    }

    public function delete_order()
    {
        $this->ProductModel->delete_order($_GET['orderNumber']);
        $this->ProductModel->delete_order_details($_GET['orderNumber']);
        redirect('ProductController/adminOrders');
    }

    public function cancel_order()
    { 
		$this->ProductModel->delete_order_details($_GET['orderNumber']);
        $this->ProductModel->delete_order($_GET['orderNumber']);
       
        redirect('ProductController/orders');
    }

    public function OrderDetails($orderNumber)
    {
		
		$order = $this->input->post('order');
		$config['base_url']=site_url('index.php/ProductController/OrderDetails');
		$data['product_info']=$this->ProductModel->get_order_details($orderNumber);
		$this->load->view('OrderDetails', $data);
		
 
    }
	
	public function AllOrderDetails()
    {
		
		$config['base_url']=site_url('index.php/ProductController/AdminAllOrderDetails');
		$data['product_info']=$this->ProductModel->get_all_order_details();
		$this->load->view('AdminAllOrderDetails', $data);
		
 
    }
    public function update_order_details()
    {
        if($this->input->post('orderNumber'))
        {
			$data = $this->ProductModel->get_order_details($this->input->post('orderNumber'));
			
            $data = $this->ProductModel->update_order_details($this->input->post('orderNumber'), $this->input->post('productCode'), $this->input->post('quantity_ordered'));

            

            $this->load->view('admin_order_details',  array('data' => $data));
        }  
    }
}
