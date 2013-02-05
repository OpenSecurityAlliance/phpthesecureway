

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
          <img title="Exploit - A1 - Injection" src="/assets/images/owasp-headers/a2.png" />

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
            Now that attack isnt particularly useful to a hacker, but the idea would be to place that code in a field that is seen in as many
            places as possible, maybe a field that returns in a Search result or a field that displays in an Admin interface.
          </p>
          <p>
            The idea is the attacker is able to execute Javascript in <b>your</b> browser enabling them to change things on page manipulate links or 
            steal your session by sending your cookies elsewhere.
          </p>
          <p>
            <h3>Important Note</h3>
            These attacks come from <b>un-sanitized output</b>, not because of lack of escaping input etc. 
            <br />
            In most cases once exploited your Application's database
            actually delivers this attack to all the potential victims.
            <br /><br />
            Tell-tale signs of a Vulnerability look all to commonly like:
          </p>
          <pre class="prettyprint">&#60;?php echo $user->name;?></pre>

        </section>

        <section id="protection_from_exploit">

          <h2>Protection from the Exploit</h2>
          <p>
            So how should we have .....
          </p>
          <pre class="prettyprint linenums">$query = "SELECT * FROM products_table WHERE id = '".mysql_real_escape_string( $id )."' ";</pre>
          </p>

        </section>

        <section id="results">
        
          <h2>Vulnerability Results</h2>
          <p>
            So how bad is it?
          </p>

        </section>

        <section id="example">
        
          <h2>Example Vulnerability</h2>
          <p>
            The following example that you can play with would normally (hopefully) be a POST query but in this case we set it up as a GET to make it easier
            It would be used to login a User
            <br />
            The query is:
          </p>
          <pre class="prettyprint">SELECT * FROM admins WHERE username = '".$_GET['u']." AND password = '".$_GET['p']."';</pre>
          <p>
            <a href="/a1/exploit" class="btn btn-large btn-primary">Go to Exploit Example</a>
          </p>
          <p>
            See if you are able to figure out the username of the main administrator.
          </p>
          <p>
            <table style="width:100%">
              <tr>
                <td><img src="/assets/images/a2/xss_how.png" style="width:100%" /></td>
                <td>What is the exploited vulnerability?</td>
              </tr>
              <tr>
                <td><img src="/assets/images/a2/xss_what.png" style="width:100%" /></td>
                <td>How does the attack happen</td>
              </tr>
              <tr>
                <td><img src="/assets/images/a2/xss_why.png" style="width:100%" /></td>
                <td>Why would they do this?</td>
              </tr>
            </table>
          </p>

        </section>

        <section id="resources">
        
          <h2>Resources</h2>
          <p>
            To learn more about Injection attacks feel free to use any of the following resources:
          </p>
          <table class="table table-striped">
            <tr>
              <td>OWASP SQL Injection Presentation</td>
              <td><a href="http://www.slideshare.net/inquis/sql-injection-not-only-and-11">http://www.slideshare.net/inquis/sql-injection-not-only-and-11</a></td>
            </tr>
          </table>

        </section>


      </div>
    </div>

  </div>