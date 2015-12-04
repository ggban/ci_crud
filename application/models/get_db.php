<?php
class Get_db extends CI_Model{

	function __construct()
	{
 		parent::__construct();
		$this->load->database();
	}


	function get_all_form()
	{	
		$this->db->trans_start();
		$this->db->from('form_table');
		$this->db->order_by('created_time desc'); 
		$query = $this->db->get();
		$this->db->trans_complete();
		if($query->num_rows()>0)return  $query;
		else return false;
	}

	function get_form_row($form_id)
	{
		$this->db->trans_start();
		$this->db->from('form_table');
		$this->db->where('form_id', $form_id);  
		$query = $this->db->get();
		$this->db->trans_complete();
		if($query->num_rows()>0)
			return  $query;
		return null;
	}
	function insert_form($data)
	{
		$this->db->trans_start();
		$this->db->insert('form_table', $data); 
		$index=$this->db->insert_id();
		$this->db->trans_complete();
		return $index;
	}

	function update_form($id,$data)
	{
		
		$this->db->trans_start();
		$this->db->where('form_id', $id);	
		$this->db->update('form_table', $data); 
		$this->db->trans_complete();
		return true;
	}
	function delete_form($id)
	{
	
		$this->db->trans_start();
		$this->db->delete('form_table', array('form_id' => $id)); 
		$this->db->trans_complete();
	}
}