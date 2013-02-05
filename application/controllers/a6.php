<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class A6 extends CI_Controller {

	function __construct(){

		parent::__construct();

		$this->viewer->page =  6;
		
	}

	
	function index(){

		$this->viewer->view('a6/home');
		
	}

	
	function example(){

		$this->viewer->view('a6/example');
		
	}

}

/* End of file controller */
/* Location: ./application/controllers/ */