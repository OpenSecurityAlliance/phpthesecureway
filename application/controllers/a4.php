<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class A4 extends CI_Controller {

	function __construct(){

		parent::__construct();

		$this->viewer->page =  4;
		
	}

	
	function index(){

		$this->viewer->view('a4/home');
		
	}

	
	function example(){

		$this->viewer->view('a4/example');
		
	}

}

/* End of file controller */
/* Location: ./application/controllers/ */