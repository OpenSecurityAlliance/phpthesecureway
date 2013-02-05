<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class a1 extends CI_Controller {

	function __construct(){

		parent::__construct();

		$this->viewer->page =  1;
		
	}

	
	function index(){

		$this->viewer->view('a1/home');
		
	}

	
	function example(){

		$this->viewer->view('a1/example');
		
	}

}

/* End of file controller */
/* Location: ./application/controllers/ */