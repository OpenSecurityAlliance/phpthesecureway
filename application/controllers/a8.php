<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class A8 extends CI_Controller {

	function __construct(){

		parent::__construct();

		$this->viewer->page =  8;
		
	}

	
	function index(){

		$this->viewer->view('a8/home');
		
	}

	
	function example(){

		$this->viewer->view('a8/example');
		
	}

}

/* End of file controller */
/* Location: ./application/controllers/ */