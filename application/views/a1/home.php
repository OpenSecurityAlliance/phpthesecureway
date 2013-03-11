

<!-- Subhead
================================================== -->
<header class="jumbotron subhead" id="overview">
  <div class="container">
    <h1>A1 - Injection</h1>
    <p class="lead">
		Injection flaws, such as SQL, OS, and LDAP injection, occur when untrusted data is sent to an 
		interpreter as part of a command or query. The attacker’s hostile data can trick the interpreter 
		into executing unintended commands or accessing unauthorized data.
    </p>
  </div>
</header>


<div class="container exploit-tabs">
  <ul class="nav nav-tabs">
    <li class="active"><a href="/a1/">Exploit Details</a></li>
    <li><a href="/a1/example_1">Playground</a></li>
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
          <img title="Exploit - A1 - Injection" src="/assets/images/owasp-headers/a1.png" />
        </section>

        <section id="description">

          <h2 id="">Description</h2>
          <p>
            We will talk about SQL Injection as an example but this applies to other forms of injection like LDAP and OS.
            <br />
            Injection exploits happen when user input is not escaped before the input is passed to another service to be rand as a command.
            <br />
            This means that the User can run any command they want, and not just the command you expected them to run.
            <div style="margin-top:10px;width:600px;">
              <img src="http://imgs.xkcd.com/comics/exploits_of_a_mom.png" />
              <br />
              <span style="float:right;"><a href="http://xkcd.com/327/">XKCD</a></span>
            </div>
          </p>

        </section>

        <section id="explanation">

          <h2 id="">Explanation of Vulnerabilty</h2>
          <p>
            Below is an example of a SQL injection attack.
            <br /><br />
            Originally the URL string was expected to include ?id=1234 where 1234 was expected to be the product ID, probably the primary ID of the products table.
            <br />
            The problem arises when the input is <b>assumened</b> to be the integer ID of the column but this is never verified or protected against. Meaning 
            that the user could enter anything they wanted.
            
          </p>
          <pre class="prettyprint linenums">
&#60;?php
// Get var
$id  =  $_GET['id'];

// Make query
$query = "SELECT * FROM products_table WHERE id = '".$id."' ";

// Run query
  
  mysql_query( $query );

  // -- OR --

  $this->db->query( $query );
          </pre>
          <p>
            The expected query that would be passed into the "mysql_query" would be expected to be similar to the following.
          </p>
          <pre class="prettyprint">SELECT * FROM products_table WHERE id = '1234';</pre>
          <p>
            Since the $_GET['id'] is being passed directly into the SQL query the URL instead of ?id=1234 could have been
          </p>
          <pre class="prettyprint">SELECT * FROM products_table WHERE id = '1234';</pre>
          <p>
            which would produce the following query
          </p>
          <pre class="prettyprint">SELECT * FROM products_table WHERE id = '1'; / 
    INSERT INTO administrators ('email','password') VALUES ('email@domain.com','Password1');</pre>
          <p>
            And now they have their own administrator User. Likewise they could have found <b>ANY</b> information that is stored in your database.
          </p>

        </section>

        <section id="protection_from_exploit">

          <h2>Protection from the Exploit</h2>
          <p>
            So how should we have run that query you ask?
            <br />
            We will assume everything else is the same and will focus on correcting the creation of the SQL string.
          </p>
          <pre class="prettyprint linenums">$query = "SELECT * FROM products_table WHERE id = '".mysql_real_escape_string( $id )."' ";</pre>
          <pre class="prettyprint linenums">
// If you use a PHP framework their DB Class probably has something like 
$query = "SELECT * FROM products_table WHERE id = '".$this->db->escape( $_GET['id'] )."' ";
// This is taken from CodeIgniter

// OR Even Better!
$query = "SELECT * FROM products_table WHERE id = ? ";
$this->db->query( $query, array($_GET['id']) );
// Also from CodeIgniter

// Here is an example using PDO
$query = $db_conn->prepare("SELECT * FROM products_table WHERE id = :id ");
$query->bindParam( ':id', $_GET['id'] );</pre>
          <p>
            <h4>REMEMBER:</h4>Escape <b>everything</b> including simple things like <b> Pagination queries! </b>
          </p>

        </section>

        <section id="results">
        
          <h2>Vulnerability Results</h2>
          <p>
            So how bad is it?
            <br />
            Well this one is pretty obvious and really involved the unraveling of your entire Web Application
            <br />
            Imagine this scenario (*cough* WordPress), you have everything correct Password hashed time limited nonces for password resets, ACLs controlling user actions etc
            but you are running a plugin that forgot to escape the <b>?pg=2</b> in listing out some results. Well...
            <br />
            Now: 
            <ol>
              <li>The hacker can find your Admin username. </li>
              <li>Initiate a password reset from normal password reset page. </li>
              <li>Then use vulnerability to find the password reset "token". </li>
              <li>Reset your Admin password and now has full control of your application.</li>
            </ol>
          </p>
          <p>
            It is really this easy, even with such a tiny whole
            <br /><br />
            This is probably the Most detrimental Vulnerability as it opens up your Application wide open.</b>
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
          <pre class="prettyprint">$query = " SELECT * FROM products WHERE product_name LIKE '".$_GET['name']."' ";</pre>
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
              <td>Practical Identification of SQL Injection Vulnerabilities</td>
              <td><a href="https://www.us-cert.gov/reading_room/Practical-SQLi-Identification.pdf">https://www.us-cert.gov/reading_room/Practical-SQLi-Identification.pdf</a></td>
            </tr>
            <tr>
              <td>OWASP SQL Injection Presentation</td>
              <td><a href="http://www.slideshare.net/inquis/sql-injection-not-only-and-11">http://www.slideshare.net/inquis/sql-injection-not-only-and-11</a></td>
            </tr>
            <tr>
              <td>SQL Injection Attacks by Example</td>
              <td><a href="http://www.unixwiz.net/techtips/sql-injection.html">http://www.unixwiz.net/techtips/sql-injection.html</a></td>
            </tr>
            <tr>
              <td>Wikipedia</td>
              <td><a href="http://en.wikipedia.org/wiki/SQL_injection">http://en.wikipedia.org/wiki/SQL_injection</a></td>
            </tr>
            <tr>
              <td>Pentestlab - Further Exploit Examples</td>
              <td><a href="http://pentestlab.wordpress.com/2012/09/18/sql-injection-exploitation-dvwa/">http://pentestlab.wordpress.com/2012/09/18/sql-injection-exploitation-dvwa/</a></td>
            </tr>
          </table>

        </section>


      </div>
    </div>

  </div>