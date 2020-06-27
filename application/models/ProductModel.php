<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ProductModel extends CI_Model
{
    function __construct()
    {	parent::__construct();
		$this->load->database();
    }
	
	function insertProductModel($produceCode)
	{	
		$this->db->insert('products',$produceCode);
		if ($this->db->affected_rows() ==1) {
			return true;
		}
		else {
			return false;
		}
	}

	function get_all_products($limit,$offset) 
	{	
		$this->db->limit($limit,$offset);
		$this->db->select("produceCode,description,productLine,supplier,quantityInStock,bulkBuyPrice,bulkSalePrice,Photo"); 
		$this->db->from('products');
		$query = $this->db->get();
		return $query->result();
	}
	
	function record_count()
	{
		return $this->db->count_all('products');
	}
	
	function get_all_customers($limit,$offset) 
	{	
		$this->db->limit($limit,$offset);
		//My Stored Procedure
		$query = $this->db->query("CALL GetAllUsers()");
		return $query->result();
	}
	
	function record_count_c()
	{
		return $this->db->count_all('customers');
	}
	
	function get_all_BakedGoods($limit,$offset) 
	{	
		$bg = "Baked Goods";
		$this->db->limit($limit,$offset);
		$this->db->select("produceCode,description,productLine,supplier,quantityInStock,bulkBuyPrice,bulkSalePrice,Photo"); 
		$this->db->from('products');
		$this->db->where('productLine',$bg);
		$query = $this->db->get();
		
		return $query->result();
	}
	
	function record_count_bg()
	{
		$this->db->like('productLine','Baked Goods');	
		$this->db->from('products');
		return $this->db->count_all_results();
	}
	
	function get_all_EggsDairy($limit,$offset) 
	{	
		$ed = "Eggs & Dairy";
		$this->db->limit($limit,$offset);
		$this->db->select("produceCode,description,productLine,supplier,quantityInStock,bulkBuyPrice,bulkSalePrice,Photo"); 
		$this->db->from('products');
		$this->db->where('productLine',$ed);
		$query = $this->db->get();
		return $query->result();
	}
	
	function record_count_ed()
	{
		$this->db->like('productLine','Eggs & Dairy');	
		$this->db->from('products');
		return $this->db->count_all_results();
	}
	
	function get_all_ExoticFruit($limit,$offset) 
	{	
		$ef = "Exotic Fruit";
		$this->db->limit($limit,$offset);
		$this->db->select("produceCode,description,productLine,supplier,quantityInStock,bulkBuyPrice,bulkSalePrice,Photo"); 
		$this->db->from('products');
		$this->db->where('productLine',$ef);
		$query = $this->db->get();
		return $query->result();
	}
	
	function record_count_ef()
	{
		$this->db->like('productLine','Exotic Fruit');	
		$this->db->from('products');
		return $this->db->count_all_results();
	}
	
	function get_all_Fruit($limit,$offset) 
	{	
		$f = "Fruit";
		$this->db->limit($limit,$offset);
		$this->db->select("produceCode,description,productLine,supplier,quantityInStock,bulkBuyPrice,bulkSalePrice,Photo"); 
		$this->db->from('products');
		$this->db->where('productLine',$f);
		$query = $this->db->get();
		return $query->result();
	}
	
	function record_count_f()
	{
		$this->db->like('productLine','Fruit');	
		$this->db->from('products');
		return $this->db->count_all_results();
	}
	
	function get_all_JamsPreserves($limit,$offset) 
	{	
		$jp = "Jams and Preserves";
		$this->db->limit($limit,$offset);
		$this->db->select("produceCode,description,productLine,supplier,quantityInStock,bulkBuyPrice,bulkSalePrice,Photo"); 
		$this->db->from('products');
		$this->db->where('productLine',$jp);
		$query = $this->db->get();
		return $query->result();
	}
	
	function record_count_jp()
	{
		$this->db->like('productLine','Jams and Preserves');	
		$this->db->from('products');
		return $this->db->count_all_results();
	}
	
	function get_all_Salad($limit,$offset) 
	{	
		$s = "Salads";
		$this->db->limit($limit,$offset);
		$this->db->select("produceCode,description,productLine,supplier,quantityInStock,bulkBuyPrice,bulkSalePrice,Photo"); 
		$this->db->from('products');
		$this->db->where('productLine',$s);
		$query = $this->db->get();
		return $query->result();
	}
	
	function record_count_s()
	{
		$this->db->like('productLine','Salads');	
		$this->db->from('products');
		return $this->db->count_all_results();
	}
	
	function get_all_Vegetables($limit,$offset) 
	{	
		$v = "Vegetables";
		$this->db->limit($limit,$offset);
		$this->db->select("produceCode,description,productLine,supplier,quantityInStock,bulkBuyPrice,bulkSalePrice,Photo"); 
		$this->db->from('products');
		$this->db->where('productLine',$v);
		$query = $this->db->get();
		return $query->result();
	}
	
	function record_count_v()
	{
		$this->db->like('productLine','Vegetables');	
		$this->db->from('products');
		return $this->db->count_all_results();
	}
	function record_count_Order()
	{
		return $this->db->count_all('orders');
	}
	public function deleteProductModel($productCode)
	{	
		$this->db->where('produceCode', $productCode);
		return $this->db->delete('products');
    }

	function updateProductModel($products,$produceCode)
	{	
		$this->db->where('produceCode', $produceCode);
		return $this->db->update('products', $products);
	}

	public function drilldown($products)
	{	
		$this->db->select("produceCode,description,productLine,supplier,quantityInStock,bulkBuyPrice,bulkSalePrice,Photo"); 
		$this->db->from('products');
		$this->db->where('produceCode',$products);
		$query = $this->db->get();
		return $query->result();
    }
	
	public function visitorLog()
	{
		$this->db->select('Today,SessionID,CurrentPage,BrowserType,IP'); 
		$this->db->from('loggedIn'); 
		$query = $this->db->get();
		return $query->result();
	}
	
	public function SearchAllProducts($search)
	{
		
		$this->db->select("produceCode,description,productLine,supplier,quantityInStock,bulkBuyPrice,bulkSalePrice,Photo");
		$this->db->from('products');
		//$this->db->where('description') 
		$this->db->like('description',$search, 'both');
		//$this->db->or('productLine',$search, 'both');
		//$this->db->or('supplier',$search, 'both');
		//$this->db->where('description',$search);
		//$this->db->where('productLine',$search);
		//$this->db->where('supplier',$search);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function SearchAllOrders($search)
	{
		$this->db->select("orderNumber,orderDate,requiredDate,shippedDate,status,comments,customerNumber");
        $this->db->from('orders');
		$this->db->like('customerNumber',$search, 'both');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function Search($search)
	{
		//$this->db->query("SELECT * FROM products WHERE description LIKE '%$search%' where productLine LIKE '%$search%' where `upplier LIKE '%$search%'");
		//$this->db->query("SELECT * FROM products WHERE description LIKE '%$search%' ");
		//$this->db->query(" SELECT produceCode,description,productLine,supplier,quantityInStock,bulkBuyPrice,bulkSalePrice,Photo FROM products WHERE description LIKE '%$search%' ");
		$query = $this->db->get();
		return $query->result();
	}
	
	public function addToWishlist($customerNumber, $produceCode)
    {
        $data = array(
            'customerNumber' => $customerNumber,
            'produceCode' => $produceCode
        );

        $this->db->insert('wishlist', $data);
    }
	
	public function removeFromWishlist($customerNumber, $produceCode)
    {
        $this->db->where('customerNumber', $customerNumber);
        $this->db->where('produceCode', $produceCode);
        $this->db->delete('wishlist');    
    }
	
	public function emptyWishlist($customerNumber)
    {
        $this->db->where('customerNumber', $customerNumber);        
        $this->db->delete('wishlist');    
    }
	
	public function get_products_wishlist($customerNumber) 
    {
        $this->db->select('produceCode');
        $this->db->from('wishlist');
        $this->db->where('customerNumber', $customerNumber);
        $query = $this->db->get();

        return $query->result_array();
    }
	
	public function getProductWishlist($customerNumber) 
    {
        $this->db->select('produceCode');
        $this->db->from('wishlist');
        $this->db->where('customerNumber', $customerNumber);
        $query = $this->db->get();

        return $query->result_array();
    }
	
	public function getProductId($produceCode)
    {
        $this->db->select("produceCode,description,productLine,supplier,quantityInStock,bulkBuyPrice,bulkSalePrice,photo");
		$this->db->from('products');
        $this->db->where('produceCode', $produceCode);
        $query = $this->db->get();

        return $query->result_array();
    }
	public function get_orders()
    {
        $this->db->select('*');
        $this->db->from('orders');

        $query = $this->db->get();

        return $query->result_array();
    }
	
	public function create_order($data)
    {
        if($this->db->insert('orders', $data))
            return true;

        else
            return false;
    }
	public function create_order_details($data)
    {
        $this->db->insert('orderdetails', $data);
    }
	
	public function get_orders_by_customer($customerNumber)
    {
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->where('customerNumber', $customerNumber);

        $query = $this->db->get();

        return $query->result_array();
    }
	
	public function if_order_exists($orderNumber)
    {
        $this->db->select('orderNumber');  
        $this->db->from('orders');        
        $this->db->where('orderNumber', $orderNumber);
        $query = $this->db->get();

        if(count($query->result_array()) > 0) 
            return true;

        else
            return false;
    }

    public function delete_order($orderNumber)
    {
        $this->db->where('orderNumber', $orderNumber);
        $this->db->delete('orders');    
    }

    public function delete_order_details($orderNumber)
    {
        $this->db->where('orderNumber', $orderNumber);
        $this->db->delete('orderdetails'); 
    }

    public function get_order_details($orderNumber)
    {
        $this->db->select('orderNumber,productCode,quantityOrdered,priceEach');
        $this->db->from('orderdetails'); 
        $this->db->where('orderNumber', $orderNumber);

        $query = $this->db->get();

        return $query->result_array();
    }
	
	public function get_all_order_details()
    {
        $this->db->select('orderNumber,productCode,quantityOrdered,priceEach');
        $this->db->from('orderdetails'); 

        $query = $this->db->get();

        return $query->result_array();
    }

     public function update_order_details($orderNumber, $productCode, $quantity_ordered)
    {
          $data = array(
            'quantity_ordered' => $quantity_ordered
        );

        $this->db->where('orderNumber', $orderNumber);
        $this->db->where('productCode', $productCode);
        $this->db->update('orderdetails', $data);
    }

     public function update_order($orderNumber, $data)
    {
        $this->db->where('orderNumber', $orderNumber);
        $this->db->update('orders', $data);
    }
}
?>