<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class A9 extends CI_Controller {

	function __construct(){

		parent::__construct();

		$this->viewer->page =  9;
		
	}

	
	function index(){

		$this->viewer->view('a9/home');
		
	}

	
	function example(){

		$this->viewer->view('a9/example');
		
	}

}

/* End of file controller */
/* Location: ./application/controllers/ */