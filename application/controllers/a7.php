<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class A7 extends CI_Controller {

	function __construct(){

		parent::__construct();

		$this->viewer->page =  7;
		
	}

	
	function index(){

		$this->viewer->view('a7/home');
		
	}

	
	function example(){

		$this->viewer->view('a7/example');
		
	}

}

/* End of file controller */
/* Location: ./application/controllers/ */