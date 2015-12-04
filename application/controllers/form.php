<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Form extends CI_Controller {

	 function __construct(){
			parent::__construct();
			$this->load->helper(array('url','date','form'));
			$this->load->library('form_validation');
			$this->load->model('get_db');
		}
	public function index()
	{
		$this->form_menu();
	}
	
	public function form_menu()
	{
		
		$data['results']=$this->get_db->get_all_form();
		$this->load->view('form_menu',$data);
	}

	public function create_form()
	{
		$this->form_validation->set_rules('data_1', 'Data 1', 'required');
		$this->form_validation->set_rules('data_2', 'Data 2', 'required');	

		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
		//$data['year']=$this->student_info("year");
		if (!$this->form_validation->run()) // validation hasn't been passed
		{	
			$this->load->view('create_form');
		}
		else // passed validation proceed to post success logic
		{		
	 	
				$form_data = array(
								'data1' => set_value('data_1'),
								'data2' => set_value('data_2'),
						);			
						
				if ($this->get_db->insert_form($form_data) == TRUE) // the information has therefore been successfully saved in the db
				{
						redirect('form/form_menu');
				}
				else //!!!if failed to update DB 
				{
						echo 'An error occurred saving your information. Please try again later';print_r($form_data);
				}  	
		}
	}

	public function edit_form()
	{
		//print_r($_POST); //can check posted data
		$form_id=$_POST['id'];
		if(!$form_id)//if form_id data is empty
		{
			//redirect('/form/restricted');
		}
		$this->form_validation->set_rules('data_1', 'Data 1', 'required');
		$this->form_validation->set_rules('data_2', 'Data 2', 'required');			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

		if (!$this->form_validation->run()) // validation hasn't been passed
		{	$data['form_row']=$this->get_db->get_form_row($form_id);
			$this->load->view('edit_form',$data);
		}
		else // passed validation proceed to post success logic
		{
	 			//!!!pass all data into data to DB	
			$form_data = array(
						'data1' => set_value('data_1'),
						'data2' => set_value('data_2'),
					);			
					
			if ($this->get_db->update_form($form_id,$form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('form/form_menu');
			}
			else //!!!if failed to update DB 
			{
				echo 'An error occurred saving your information. Please try again later';print_r($form_data);
			}  		
		}
	}
	public function delete_form()
	{
		$deleted = $_POST["id"];
		$this->get_db->delete_form($deleted);
	}
}
