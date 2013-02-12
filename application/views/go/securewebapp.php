

<!-- Subhead
================================================== -->
<header class="jumbotron subhead" id="overview">
  <div class="container">
    <h1>Coding a Secure Web Application</h1>
    <p class="lead">
		Follow these steps to ensure you are coding secure web applications.
    </p>
  </div>
</header>


<div class="bs-docs-social">
  <div class="container">
  </div>
</div>


<div class="container">

    <!-- Docs nav
    ================================================== -->
    <div class="row">
      <div class="span3 bs-docs-sidebar">
        <ul class="nav nav-list bs-docs-sidenav">
          <li><a href="#Authentication"><i class="icon-chevron-right"></i> Authentication</a></li>
          <li><a href="#user-input"><i class="icon-chevron-right"></i> User Input</a></li>
          <li><a href="#encryption"><i class="icon-chevron-right"></i> Exncryption</a></li>
          <li><a href="#misc"><i class="icon-chevron-right"></i> Misc</a></li>
        </ul>
      </div>
      <div class="span9">



        <!-- OVERVIEW
        ================================================== -->
        <section>
          <div class="page-header">
            <h1>How to code Web Applications Securely</h1>
          </div>
          <p>
            We have tried to compile a list of important things you can do in your web application to help make it more secure. 
            <br />
            For more information on each one click read-more or look into the OWASP top 10 pages which include additional reading material.
          </p>
        </section>




        <section id="auth-login">

          <div id="Authentication" class="page-header">
            <h1>Authentication</h1>
          </div>

          <p>
            Your login page is the front door to your entire application so how do we make sure its secure?
          </p>


          <h3>Login Page Error Messages</h3>
          <p>
            Error messages are an attackers best friend. If I can find a username like "superadmin" or "administrator" that gives the following error message I now know that the username is valid because of 
<div class="alert alert-error" style="width:300px;">
  <strong>Error:</strong> Your password is invalid.
</div>
            Bam! now I just need to break the password.
            I also know the level of access Im probably going to get.
            <br /><br />
            You would never have an error message that says your password was <i>close, just change first letter</i> for the same reason the less information we give the attacker the better.
            <br /><br />
            Make your message more generic like:      
<div class="alert alert-error" style="width:300px;">
  <strong>Error:</strong> Invalid Username/Password.
</div>
          </p>


          <h3>Brute Force</h3>
          <p>
            Brute force protection takes a little work, and unfortantely that leaves most applications vulnerable, so heres some pointers.
            <br />
            For brute force protection we utilize 2 tables
          </p>
          <ul>
            <li>Login Attempts table <i>which you should already have ;-)</i></li>
            <li>Login Bans table</li>
          </ul>
          <p>
            Assuming everytime a login attempt happens the information including IP should be saved in the login_attempts table, if not add this first. (Do NOT include the pasword in this table)
            <br />
            Add logic <b>before</b> you process the request to check the login_bans table for the IP of the remote host where the expires_at column is greater than current time().
            <br />
            If a row is found show login page with error message that they have been throttled for too many failed attempts and to try again in an hour or call support...
            <br /><br />
            So how does an IP get banned?
            <br />
            Assuming we didnt find a ban and the login has failed, we add 2 more steps.
          </p>
          <ol>
            <li>Log the failed login attempt with IP (which we were already doing)</li>
            <li>Count the number of failed attempts in previous 30 min, if greater than 6 than insert a ban for 30 min.</li>
          </ol>
          <p>
            Thats it, now attackers cant use your system to try and break your passwords.
          </p>
          <p>
            Note: <i> This is the simplest form once you have mastered this it is reccomended that you have tiered levels of bans. ie. if someone has been banned 3 times in a few hours ban then for a full day etc.</i>
          </p>

          
          <h3>Password Storage</h3>
          <p>
            Ohhh passwords.. The 
            <br /><br />
            You would never have an error message that says your password was <i>close, just change first letter</i> for the same reason the less information we give the attacker the better.
          </p>

        </section>



        <section id="user-input">
          <div class="page-header">
            <h1>User Input</h1>
          </div>
        </section>

        <section id="database">

          <h2>Database Queries</h2>
          <p>
            .......
          </p>

        </section>

        <section id="escaping">

          <h2>Displaying Information on the Page</h2>
          <p>
            .......
          </p>

        </section>

        <section id="csrf">

          <h2>Form Submissinos</h2>
          <p>
            .......
          </p>

        </section>



        <section id="encryption">
          <div class="page-header">
            <h1>Encryption</h1>
          </div>
          <img src="/assets/images/securewebapp/encryption_meme.jpg" />
        </section>

        <section id="database">

          <h2>The Basics</h2>
          <p>
            .......
          </p>

        </section>



        <section>
          <div class="page-header">
            <h1>Resources to Learn More</h1>
          </div>
        </section>

        <section id="misc">

          <h2>Misc. Resources</h2>
          <p>
            .......
          </p>

        </section>


      </div>
    </div>

  </div>