<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Go extends CI_Controller {

	
	function index(){

		$data  =  array();

		$this->viewer->view('go/homepage', $data);

	}
	
	function howto_secure_web_app(){

		$data  =  array();

		$this->viewer->view('go/securewebapp', $data);

	}

	
	function php_owasp_top_10_exploits(){

		$data  =  array();

		$this->viewer->view('go/exploits', $data);

	}

}

/* End of file controller */
/* Location: ./application/controllers/ */