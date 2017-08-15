<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
	
	public function __construct()
	{
	 	parent::__construct();
		$this->load->helper('url');
	 	$this->load->model('customer_model');
	}	  

	// Get all record and display list view
	public function index()
	{
		$data['customers']=$this->customer_model->get_all_customers();
		$this->load->view('template/header', $data);
		$this->load->view('customer_view',$data);
		$this->load->view('template/footer', $data);
	}

	// Insert record in to database
	public function customer_add()
	{
		$post_data = $this->input->post(NULL, TRUE);
        $msg = $this->check_form_validation($post_data);   // serverside validation
        if($msg != '')
        {
			echo json_encode(array("status" => "Error", "msg" => $msg));
        }
        else
        {
			$data = array(
				'customer_name' => $this->input->post('customer_name'),
				'phone' => $this->input->post('phone'),
				'city' => $this->input->post('city'),
				'state' => $this->input->post('state'),
				'postal_code' => $this->input->post('postal_code'),
				'country' => $this->input->post('country'),
			);	
			if($this->customer_model->customer_add($data) === true)
				echo json_encode(array("status" => "Success", "msg" => "Data added successfully.")); 
			else
				echo json_encode(array("status" => "Error", "msg" => "Please try again"));  
		}
	}

	// Get one record
	public function ajax_edit($id)
	{
		$data = $this->customer_model->get_by_id($id);		
		echo json_encode($data);
	}

	// Update one record
	public function customer_update()
	{
		$post_data = $this->input->post(NULL, TRUE);
        $msg = $this->check_form_validation($post_data);	 // serverside validation
        if($msg != '')
        {
			echo json_encode(array("status" => "Error", "msg" => $msg)); 
        }
        else
        {
			$data = array(
					'customer_name' => $this->input->post('customer_name'),
					'phone' => $this->input->post('phone'),
					'city' => $this->input->post('city'),
					'state' => $this->input->post('state'),
					'postal_code' => $this->input->post('postal_code'),
					'country' => $this->input->post('country')
				);
			if($this->customer_model->customer_update(array('customer_id' => $this->input->post('customer_id')), $data) === true)
				echo json_encode(array("status" => "Success", "msg" => "Data updated successfully."));
			else
				echo json_encode(array("status" => "Error", "msg" => "Please try again")); 			 
		}		
	}

	// Delete one record
	public function customer_delete($id)
	{
		if($this->customer_model->delete_by_id($id) === true)
			echo json_encode(array("status" => "Success", "msg" => "Data deleted successfully."));
		else
			echo json_encode(array("status" => "Error", "msg" => "Please try again")); 
		
		
	}

	// serverside validation
	public function check_form_validation($data)
    {
        $msg = '';
        
        if(!isset($data['customer_name']) || (isset($data['customer_name']) && $data['customer_name']=='') )
        {
            $msg .= 'Enter Customer Name \n';
        }
        if(!isset($data['phone']) || (isset($data['phone']) && $data['phone']=='') )
        {
            $msg .= 'Enter Phone \n';
        } 
		if(!isset($data['city']) || (isset($data['city']) && $data['city']=='') )
        {
            $msg .= 'Enter City \n';
        } 
		if(!isset($data['state']) || (isset($data['state']) && $data['state']=='') )
        {
            $msg .= 'Enter State \n';
        } 
		if(!isset($data['postal_code']) || (isset($data['postal_code']) && $data['postal_code']=='') )
        {
            $msg .= 'Enter PostalCode \n';
        }  
		if(!isset($data['country']) || (isset($data['country']) && $data['country']=='') )
        {
            $msg .= 'Enter Country \n';
        }  
        return $msg;
    }
}
