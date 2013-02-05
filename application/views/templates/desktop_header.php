<?php
	
	$pri	=	$this->uri->segment(1);
	$sec	=	$this->uri->segment(2);

?>

    <!-- Navbar
    ================================================== -->
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="brand" href="./index.html">PHP The Secure Way</a>
			<div class="nav-collapse collapse">
				<ul class="nav">

					<li class="<?= ( !$pri || ( $pri=='go' && $sec=='index' ) )?'active':'';?>">
						<a href="/">Home</a>
					</li>
					<li class="<?= ($pri=='go' && $sec=='howto_secure_web_app')?'active':'';?>">
						<a href="/go/howto_secure_web_app">How to Code a Secure Web App</a>
					</li>
					<li class="<?= ($pri=='go' && $sec=='php_owasp_top_10_exploits')?'active':'';?>">
						<a href="/go/php_owasp_top_10_exploits">PHP & OWASP Top 10 Exploits</a>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							View the Exploits <b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li><a href="/a1" >A1 - Injection</a></li>
							<li><a href="/a2" >A2 - Cross-Site Scripting (XSS)</a></li>
							<li><a href="/a3" >A3 - Broken Authentication and Session Management</a></li>
							<li><a href="/a4" >A4 - Insecure Direct Object References</a></li>
							<li><a href="/a5" >A5 - Cross-Site Request Forgery (CSRF)</a></li>
							<li><a href="/a6" >A6 - Security Misconfiguration</a></li>
							<li><a href="/a7" >A7 - Insecure Cryptographic Storage</a></li>
							<li><a href="/a8" >A8 - Failure to Restrict URL Access</a></li>
							<li><a href="/a9" >A9 - Insufficient Transport Layer Protection</a></li>
							<li><a href="/a10">A10 - Unvalidated Redirects and Forwards</a></li>
						</ul>
					</li>
					<li class="">
						<a href="./customize.html">Contribute, Please</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>