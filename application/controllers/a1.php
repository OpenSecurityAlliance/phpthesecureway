<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class a1 extends CI_Controller {

	function __construct(){

		parent::__construct();

		$this->viewer->page =  1;
		
	}

	
	function index(){

		$this->viewer->view('a1/home');
		
	}


	function example_1(){

		//$query  =  "SELECT id, name, date FROM products WHERE name LIKE '0'; UPDATE admins_secure SET pass = '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8' WHERE id = '2';";

		//$this->load->database();
		//mysql_query( $query);
		//echo mysql_error();
		//$this->db->query( $query );
		//die();

		if( $search = $this->input->post('s') ){

			$this->load->database();

			// Build Query
			$query  =  "SELECT id, name, date FROM products WHERE name LIKE '".$search."'; ";
			
			$q	=	$this->db->query( $query );
			if($q->num_rows() > 0 ){
				foreach($q->result() as $row){
					// Return Rows
					$results[]  =  $row;
				}
			}else{
				$results  =  false;
			}

			// SHown on page
			$disp_query  =  '<span style="color:blue;font-weight:bold;">SELECT id, name, date FROM products WHERE name LIKE \'<span style="color:red;font-weight:normal;">'.$search.'</span>\'; </span>';


		}else{
			$disp_query =  false;
			$search		=  'tea cups';
			$results  	=  false;
		}

			
		$data = array();
		$data['search']		=  $search;
		$data['query'] 		=  $disp_query;
		$data['results']    =  $results;

		$this->viewer->view('a1/example_1', $data);
		
	}

}

/* End of file controller */
/* Location: ./application/controllers/ */