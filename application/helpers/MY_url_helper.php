<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------

/**
 * CDN URL
 * 
 * Create a local URL based on your basepath.
 * Segments can be passed in as a string or an array, same as site_url
 * or a URL to a file can be passed in, e.g. to an image file.
 *
 * @access	public
 * @param string
 * @return	string
 */
if ( ! function_exists('cdn_url'))
{
	function cdn_url($uri = '')
	{
		$CI =& get_instance();
		return $CI->config->item('cdn_url');
	}
}


/* End of file url_helper.php */
/* Location: ./helpers/url_helper.php */