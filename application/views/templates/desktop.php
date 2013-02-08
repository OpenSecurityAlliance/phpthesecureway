<!DOCTYPE html>
<html lang="en">
    <head>
	
	<!-- Le Title -->
	    <title>PHP The Secure Way - Demo</title>
	
	<!-- Le Meta -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="description" content="">
	    <meta name="author" content="Noah Spirakus - Securio">
	
	
	<!-- Le styles -->
	    <link href="/assets/css/bootstrap.css" rel="stylesheet">
	    <link href="/assets/css/bootstrap-responsive.css" rel="stylesheet">
	    <link href="/assets/css/docs.css" rel="stylesheet">
	    <link href="/assets/js/google-code-prettify/prettify.css" rel="stylesheet">
	

		<style>
		  .exploit-tabs a{
		    color: white;
		  }
		  .exploit-tabs li:hover a{
		    color: black;
		  }
		  .exploit-tabs{
		    margin-top:-38px;
		  }
		  .jumbotron{
		  	z-index: -1;
		  }
		</style>
	
	
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	    <!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	    <![endif]-->
	
	
	
	<!-- Le fav and touch icons -->
	    <link rel="shortcut icon"    href="/favicon.ico">
	    <link rel="apple-touch-icon" href="/assets/ico/apple-touch-icon.png">
	    <link rel="apple-touch-icon" href="/assets/ico/apple-touch-icon-72x72.png"   sizes="72x72" >
	    <link rel="apple-touch-icon" href="/assets/ico/apple-touch-icon-114x114.png" sizes="114x114" >
	    
	
    </head>
  
    <body data-spy="scroll" data-target=".bs-docs-sidebar">
	
	<!-- Navbar -->
	    
	    <?php $this->load->view('templates/desktop_header', $data);?>
	    
	<!-- End Navbar -->
	
	    <!-- Load Content -->
			<?php $this->load->view($this->viewer->body, $data); ?>
	    <!-- End Load Content -->
	    
	    <!-- Footer -->
			<?php $this->load->view('templates/desktop_footer', $data);?>
	    <!-- End Footer -->
	    
	
	
	<!-- Le javascript-->
	    <script src="/assets/js/jquery.js"></script>

	    <script src="/assets/js/google-code-prettify/prettify.js"></script>
	    <script src="/assets/js/bootstrap-transition.js"></script>
	    <script src="/assets/js/bootstrap-alert.js"></script>
	    <script src="/assets/js/bootstrap-modal.js"></script>
	    <script src="/assets/js/bootstrap-dropdown.js"></script>
	    <script src="/assets/js/bootstrap-scrollspy.js"></script>
	    <script src="/assets/js/bootstrap-tab.js"></script>
	    <script src="/assets/js/bootstrap-tooltip.js"></script>
	    <script src="/assets/js/bootstrap-popover.js"></script>
	    <script src="/assets/js/bootstrap-button.js"></script>
	    <script src="/assets/js/bootstrap-collapse.js"></script>
	    <script src="/assets/js/bootstrap-carousel.js"></script>
	    <script src="/assets/js/bootstrap-typeahead.js"></script>
		<script src="/assets/js/bootstrap-affix.js"></script>
		
		<script>
			$(function(){

				var $window = $(window)

				// side bar
				$('.bs-docs-sidenav').affix({
					offset: {
						top: function () { 
							return $window.width() <= 980 ? 290 : 250 }, bottom: 270
						}
				})
			});
			
			// make code pretty
			window.prettyPrint && prettyPrint()
    </script>    
	
    </body>
    
</html>