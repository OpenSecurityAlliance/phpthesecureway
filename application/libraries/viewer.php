<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * CodeIgniter Controller Class
 *
 * Viewer library used to load template
 *
 * @version     base site v1
 * @level1      libraries
 * 
 * @category    Library
 * @author      Noah Spirakus
 * @Create      2011/11/09
 * @Modify      2011/11/09
 * @Project     NoahJS.com
 */
class viewer
{
    
	var $CI;
	var $body;
	var $meta 	  = array('title'=>'','description'=>'','keywords'=>'');
	var $mobile 	  = false;
	var $mobile_pages = array('');
	var $uri_array 	  = array();
    
    
	function __construct()
	{
		
		$this->CI =& get_instance();
		log_message('debug', 'Viewer class initalized');
		
		$this->page  =  'none';

	}
	
	
	function meta($key, $value){
		
		$this->meta[$key]  =  $value;
		
	}
	
	
	function view($body_view, $data=array(), $meta=false){
	    
		$this->body     = $body_view;
		
		if($meta){
			foreach($meta as $key => $value){
				$this->meta[$key]  =  $value;
			}
		}
		
		$data['meta']   = $this->meta;
		
		$temp		= $data;
		$data['data']	= $temp;
		
		if($this->CI->input->get('ajax_content') == 1){
			
			$this->CI->load->view($this->body, $data);
			
		}else{
			$this->CI->load->view('templates/desktop.php', $data);
		}
	    
	}

    
}

