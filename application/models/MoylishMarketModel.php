<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MoylishMarketModel extends CI_Model
{
    function __construct()
    {	parent::__construct();
		$this->load->database();
    }
	
	// INSERT CODE HERE //	
	function insertFoodItemModel($ID_Num)
	{	$this->db->insert('fooditems',$ID_Num);
		if ($this->db->affected_rows() ==1) {
			return true;
		}
		else {
			return false;
		}
	}

	function get_all_FoodItems() 
	{	$this->db->select("ID_Num,Item,ItemCategory,Price,Cost,NutritionalDetails,NotSuitableFor,Vendor,Photo"); 
		$this->db->from('fooditems');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function deleteFoodItemModel($ID_Num)
	{	$this->db->where('ID_Num', $ID_Num);
		return $this->db->delete('fooditems');
    }

	function updateFoodItemModel($fooditems,$ID_Num)
	{	$this->db->where('ID_Num', $ID_Num);
		return $this->db->update('fooditems', $fooditems);
	}

	public function drilldown($fooditems)
	{	$this->db->select("ID_Num,Item,ItemCategory,Price,Cost,NutritionalDetails,NotSuitableFor,Vendor,Photo"); 
		$this->db->from('fooditems');
		$this->db->where('ID_Num',$fooditems);
		$query = $this->db->get();
		return $query->result();
    }
}
?>