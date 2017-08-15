<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model
{	   
	var $table = 'customers'; 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	} 

	// Get all customer data to display on listing page
	public function get_all_customers()
	{
		$this->db->from($this->table);
		$query=$this->db->get();
		return $query->result();
	}	

	// Get one customer data
	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('customer_id',$id);
		$query = $this->db->get();	
		return $query->row();
	}

	// Add data in to database
	public function customer_add($data)
	{
		return $this->db->insert($this->table, $data);		
	}

	// Update one record
	public function customer_update($where, $data)
	{
		return $this->db->update($this->table, $data, $where);			
	}

	// Delete one record
	public function delete_by_id($id)
	{
		$this->db->where('customer_id', $id);
		return $this->db->delete($this->table);
	}	 
}
