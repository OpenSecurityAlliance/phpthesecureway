

<!-- Subhead
================================================== -->
<header class="jumbotron subhead" id="overview">
  <div class="container">
    <h1>A2 - Cross-Site Scripting (XSS)</h1>
    <p class="lead">
		XSS flaws occur whenever an application takes untrusted data and sends it to a web browser without 
    proper validation and escaping. XSS allows attackers to execute scripts in the victim’s browser which 
    can hijack user sessions, deface web sites, or redirect the user to malicious sites.
    </p>
  </div>
</header>


<div class="container exploit-tabs">
  <ul class="nav nav-tabs">
    <li class="active"><a href="/a2/">Exploit Details</a></li>
    <li><a href="/a2/example_1">"Stored XSS" Playground</a></li>
  </ul>
</div>



<div class="container">

    <!-- Exploit Nav
    ================================================== -->
    <div class="row">
      <div class="span3 bs-docs-sidebar">
        <ul class="nav nav-list bs-docs-sidenav">
          <li class="active"><a href="#owasp-overview"><i class="icon-chevron-right"></i> OWASP overview</a></li>
          <li><a href="#description"><i class="icon-chevron-right"></i> Description</a></li>
          <li><a href="#explanation"><i class="icon-chevron-right"></i> Explanation</a></li>
          <li><a href="#protection_from_exploit"><i class="icon-chevron-right"></i> Protection from Exploit</a></li>
          <li><a href="#results"><i class="icon-chevron-right"></i> Vulnerability Results</a></li>
          <li><a href="#example"><i class="icon-chevron-right"></i> Example Vulnerability</a></li>
          <li><a href="#resources"><i class="icon-chevron-right"></i> Resources</a></li>
        </ul>
      </div>
      <div class="span9">



        <!-- OVERVIEW
        ================================================== -->
        <section>
          <div class="page-header">
            <h1>An Overview of the Exploit</h1>
          </div>

        </section>

        <section id="owasp-overview">

          <h2 id="">OWASP Summary</h2>
          <img title="Exploit - A2 - Cross-Site Scripting (XSS)" src="/assets/images/owasp-headers/a2.png" />

        </section>

        <section id="description">

          <h2 id="">Description</h2>
          <p>
            Cross-Site Scripting (XSS) attacks are a type of injection problem, in which malicious scripts are injected into the otherwise 
            benign and trusted web sites. Cross-site scripting attacks occur when an attacker uses a web application to send 
            malicious code, generally in the form of a browser side script, to a different end user. Flaws that allow these attacks to 
            succeed are quite widespread and occur anywhere a web application uses input from a user in the output it generates without 
            validating or encoding it. 
            <br /><br />
            An attacker can use XSS to send a malicious script to an unsuspecting user. The end user’s 
            browser has no way to know that the script should not be trusted, and will execute the script. Because it thinks the script 
            came from a trusted source, the malicious script can access any cookies, session tokens, or other sensitive information 
            retained by your browser and used with that site. These scripts can even rewrite the content of the HTML page.
          </p>

        </section>

        <section id="explanation">

          <h2 id="">Explanation of Vulnerabilty</h2>
          <p>
            An attacker finds a field that is vulnerable. A vulnerable field allows them to enter Javascript code, like the following:
          </p>
          <pre class="prettyprint">&#60;script>alert(43);&#60;/script></pre>
          <p>
            Now that particular attack isnt particularly useful to a hacker, but the idea would be to place that code in a field that is seen in as many
            places as possible, maybe a field that returns in a Search result or a field that displays in an Admin interface.
          </p>
          <h3>Two types of XSS attacks</h3>
          <ul>
            <li>Stored XSS Attacks</li>
            <li>Reflected XSS Attacks</li>
          </ul>
          <p>
            Stored XSS attacks are attacks in which the javascript has been entered into a field that gets "stored" in the database and replayed.
          </p>
          <p>
            Reflected XSS attacks on the other hand are attacks in which the field then gets pushed to other browsers as opposed or in addition to being stored. 
            The perfect example of an attack like this would be a chat application, where a chat message containing an XSS payload gets passed to all other
            participants in chat room.
          </p>
          <p>
            The idea is the attacker is able to execute Javascript in other browsers enabling them to do bad things.
          </p>
          <p>
            <h4>Important Note</h4>
            These attacks come from <b>un-sanitized output</b>, not because of lack of escaping input etc. 
            <br />
            In most cases once exploited your Application's database actually delivers this attack to all the potential victims.
            <br /><br />
            Tell-tale signs of a Vulnerability come from un sanitzed input and output that looks all to commonly just like:
          </p>
          <pre class="prettyprint">&#60;?php echo $user->name;?></pre>

        </section>

        <section id="protection_from_exploit">

          <h2>Protection from the Exploit</h2>
          <p>
            So how should we have .....
          </p>
          <pre class="prettyprint linenums">&#60;?php
/* XSS Sanitize function */
function s( $input ) {
  return htmlspecialchars( $input ); 
}</pre>
          <p>
            Now instead of a simple echo we run it through our sanitize function.
            <pre class="prettyprint">&#60;div>Hello: &#60;?php echo s( $user->name );?>&#60;/div></pre>
          </p>
          <p>
            Now the ouput looks like:
            <pre class="prettyprint">&#60;div>Hello: &amp;lt;script&amp;gt;alert( 'Hi' );&amp;lt;/script&amp;gt;&#60;/div></pre>
            Instead of our vulnerable code:
            <pre class="prettyprint">&#60;div>Hello: &lt;script&gt;alert( 'Hi' );&lt;/script&gt;&#60;/div></pre>
          </p>

        </section>

        <section id="results">
        
          <h2>Vulnerability Results</h2>
          
          <h5>So how bad is it?</h5>

          <p>
            The consequence of an XSS attack is the same regardless of whether it is stored or reflected (or DOM Based). 
            The difference is in how the payload arrives at the server. 
          </p>
          <p>
            The most severe XSS attacks involve disclosure of the user’s session cookie allowing an attacker to 
            hijack the user’s session and take over the account. 
          </p>
          <p>
            Other attacks include the disclosure of end user files, installation of Trojan horse programs, and 
            redirection the user to some other page or site, or modify presentation of content. 
          </p>
          <p>
            An XSS vulnerability allowing an attacker to modify a press release or news item could affect a 
            company’s stock price or lessen consumer confidence.
          </p>
          <p>
            An XSS vulnerability on a pharmaceutical site could allow an attacker to modify dosage information 
            resulting in an overdose.
          </p>

        </section>

        <section id="example">
        
          <h2>Example Vulnerability</h2>
          <p>
            ...
          </p>
          <p>

          </p>

        </section>

        <section id="resources">
        
          <h2>Resources</h2>
          <p>
            To learn more about Injection attacks feel free to use any of the following resources:
          </p>
          <table class="table table-striped">
            <tr>
              <td>OWASP - Cross Site Scripting (XSS)</td>
              <td><a href="https://www.owasp.org/index.php/Cross-site_Scripting_(XSS)">https://www.owasp.org/index.php/Cross-site_Scripting_(XSS)</a></td>
            </tr>
            <tr>
              <td>Acunetix Web Application Security</td>
              <td><a href="http://www.acunetix.com/websitesecurity/cross-site-scripting/">http://www.acunetix.com/websitesecurity/cross-site-scripting/</a></td>
            </tr>
            <tr>
              <td>Wikipedia</td>
              <td><a href="http://en.wikipedia.org/wiki/Cross-site_scripting">http://en.wikipedia.org/wiki/Cross-site_scripting</a></td>
            </tr>
            <tr>
              <td>Cross-Site Scripting Vulnerabilities - CERT</td>
              <td><a href="http://www.cert.org/archive/pdf/cross_site_scripting.pdf">http://www.cert.org/archive/pdf/cross_site_scripting.pdf</a></td>
            </tr>
            <tr>
              <td>IBM Guide</td>
              <td><a href="http://www.ibm.com/developerworks/tivoli/library/s-csscript/">http://www.ibm.com/developerworks/tivoli/library/s-csscript/</a></td>
            </tr>
            <tr>
              <td>Imperva - Youtube Video</td>
              <td><a href="http://www.youtube.com/watch?v=r79ozjCL7DA">http://www.youtube.com/watch?v=r79ozjCL7DA</a></td>
            </tr>
          </table>

        </section>


      </div>
    </div>

  </div>