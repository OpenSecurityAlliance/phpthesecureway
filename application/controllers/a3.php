<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class A3 extends CI_Controller {

	function __construct(){

		parent::__construct();

		$this->viewer->page =  3;
		
	}

	
	function index(){

		$this->viewer->view('a3/home');
		
	}

	
	function example(){

		$this->viewer->view('a3/example');
		
	}

}

/* End of file controller */
/* Location: ./application/controllers/ */