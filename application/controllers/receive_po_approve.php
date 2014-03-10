<?php if(!defined('BASEPATH')) exit('No direct script access allowd');

class Receive_approve extends CI_Controller {

private $limit=10;

	function __construct()
	{
		parent::__construct();
 		$this->load->helper(array('url','form'));
		$this->load->library('template');
		$this->load->library('form_validation');
		//$this->load->model('receive_approve_model');
	}
	function index()
	{	
		$data['message']='';
		$this->template->display_form_input('receive_approve',$data);
	}
	 
	function process(){
		$this->db->select('shipment_id,date_received');
		$record=$this->db->get('inventory_card_header')->result();
	   
		foreach ($record as $row){	
			$cek=$this->input->post($row->shipment_id);
			if($row->shipment_id==$cek){
				$this->db->query("update inventory_products set approved=1 
					where shipment_id='".$row->shipment_id."'");
				$this->db->query("update inventory_card_header set approved=1 
					where shipment_id='".$row->shipment_id."'");
			}
		}
		$data['message']='Success';
		$this->template->display_form_input('receive_approve',$data);

	}
	 
}