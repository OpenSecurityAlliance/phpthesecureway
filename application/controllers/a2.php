<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class A2 extends CI_Controller {

	function __construct(){

		parent::__construct();

		$this->viewer->page =  2;
		
	}

	
	function index(){

		$this->viewer->view('a2/home');
		
	}

	
	function example(){

		$this->viewer->view('a2/example');
		
	}

}

/* End of file controller */
/* Location: ./application/controllers/ */