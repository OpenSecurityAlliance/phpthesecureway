<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class A5 extends CI_Controller {

	function __construct(){

		parent::__construct();

		$this->viewer->page =  5;
		
	}

	
	function index(){

		$this->viewer->view('a5/home');
		
	}

	
	function example(){

		$this->viewer->view('a5/example');
		
	}

}

/* End of file controller */
/* Location: ./application/controllers/ */