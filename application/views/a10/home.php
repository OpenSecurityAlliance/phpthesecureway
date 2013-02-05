

<!-- Subhead
================================================== -->
<header class="jumbotron subhead" id="overview">
  <div class="container">
    <h1>A10 - Unvalidated Redirects and Forwards</h1>
    <p class="lead">
		Web applications frequently redirect and forward users to other pages and websites, and use untrusted data 
    to determine the destination pages. Without proper validation, attackers can redirect victims to phishing or 
    malware sites, or use forwards to access unauthorized pages.
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
          <img title="Exploit - A1 - Injection" src="/assets/images/owasp-headers/a10.png" />

        </section>

        <section id="description">

          <h2 id="">Description</h2>
          <p>
            ......
          </p>

        </section>

        <section id="explanation">

          <h2 id="">Explanation of Vulnerabilty</h2>
          <p>
            ......
          </p>
          <pre class="prettyprint linenums">
&#60;?php
// Exploit Code
          </pre>
          <p>
            Followup ...
          </p>

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