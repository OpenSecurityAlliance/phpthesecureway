

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
            So A. <b>dont store your password in plaintext</b>, if you are at this site I am assuming you are beyond that step.
            <br /><br />
            So with hashing (<i>not encrypting 2 totally different things</i>), the problem that needs to be overcome when using hashing to save your passwords is that hashing
            was created to be quick, the point of a hash is to validate the contents of an entire file/string etc. quickly.
            <br /><br />
            Well validating quickly is not what we want when we are trying to prevent someone from trying to crack a password hash they found in a database. What we want
            is something slllooww, because 1-2 seconds during login processs may not be alot but when an attacker can only guess 1 guess per second on your password hash we can
            be quite sure they are not going to guess it, at least using brutefore.
            <br /><br />
            The second problem we have is something called <b>Rainbow Tables.</b> So lets look a an example.
            <br /><br />
            If an attacker knows you use the sha1() function to save your passwords in the database, say they also think that you will findout you got hacked within 7 days.
            This means he needs to crack the/as many passwords as he can in that time.
            <br /><br />
            Well he already know that you used sha1 to store it, so instead of beinging to hash and guess over and over After he breaks in maybe he precomputes all sha1 hashes betweem
            0000000000 to zzzzzzzzzz now if your password is under 10 char all he has to do is search the database for the hash he found and Bam he has the cleartext password.
            <br /><br />
            He can also use this rainbox table for multiple attacks, infact there are now many online resources that save them for you, making it even easier.
            <br /><br />

            <h5>So what to do?</h5>
            
            Two things, first if we add a <a href="http://en.wikipedia.org/wiki/Salt_(cryptography)" target="_blank">Salt</a> then they cant precompute a rainbow and use it for 
            multiple people they would have to create on specifically for us. Of we have a different salt Per hash even better they have to start over for every single hash.
            <br /><br />
            Second we want to slow down there ability to guess at the hash. Enter BCrypt and/or PBKDF2. With Bcrypt it slow because of the overhead involved in the key 
            setup algorythm and PBKDF2 is slow because of number of iterations usually around 5,000 that the hash entails.
          </p>
          <p>
            <h5>This is all great info but what should I actually do?</h5>
            Good question and the answer is <a href="http://php.net/manual/en/function.crypt.php" target="_blank">crypt</a>, crypt is a PHP function that emulates unix's native crypt 
            function and handles the salting and strngthing (rounds) of the hash function.
            <br /><br />
            When saving the password, save the output of the following function in that database. 
            <pre class="prettyprint">$salted_hashed_password  =  run_crypt( $plaintext_password );</pre>
            Here is an example function on <a href="https://gist.github.com/noahjs/4831685" target="_blank">how to implement crypt.</a> The one difference that may be 
            new is instead of searching for the hash in the DB like you may have done before. You need to find the user based of the username and then pass the saved user's password-hash 
            and the plaintext password from the login page into the crypt-verify function and it will pass back true or false.
            <pre class="prettyprint">&lt;?php
$admin  =  $this->find_admin_in_db( $username );
if( $admin ){
  // Validate the Admin's password is the same
  if ( verify_crypt($password, $admin->password) ){
    // Login Success
  }else{
    // Login Failed
  }
}
            </pre>
            
          </p>

        </section>




        <section>

          <div class="page-header">
            <h1>User Input</h1>
          </div>


          <h3 id="database">Database Queries</h3>
          <p>
            Please, please, please, please esacpe your database queries.
            <br /><br />
            <a href="/a1" class="btn btn-primary" style="margin-left:100px;">Go to SQL Injection Section &rarr;</a>
            <br /><br />
            This following is not acceptable anymore, you will be exploited
            <pre class="prettyprint">$query  =  "SELECT * FROM users WHERE username = '".$_POST['username']."'; ";
mysql_query( $query );</pre>
            Attacks are all automated now, there are easy ways to see if you are doing it, and easy wasys to take advantage.
            It doesnt matter if you just have a greeting card site, you dont want to cleanup after your site get comprimised.
          </p>

          <h3 id="escaping">Displaying Information on the Page</h3>
          <p>
            XSS is a very tricky subject and there are alot of specifics thats why we have this awesome section on it!
            <br /><br />
            <a href="/a2" class="btn btn-primary" style="margin-left:100px;">Go to XSS Section &rarr;</a>
            <br /><br />
            The short part about it is this. If you are allowing users to submit information and save it in a DB, then that input gets displayed somewhere else 
            you should click the link above. 
            <br /><br />
            The usual vulnerailbity looks as simple as this:

            <pre class="prettyprint">Hello: &#60;?php echo $user->name;?>,</pre>

            Which when exploited looks like:

            <pre class="prettyprint">Hello: &lt;script&gt;evilcode();&lt;/script&gt;,</pre>

          </p>

        </section>

        <section>

          <div class="page-header">
            <h1>Forms</h1>
          </div>


          <h3 id="csrf">CSRF - Cross Site Request Forgery</h3>
          <p>
            Please, please, please, please esacpe your database queries.
            <br /><br />
            <a href="/a1" class="btn btn-primary" style="margin-left:100px;">Go to SQL Injection Section &rarr;</a>
            <br /><br />
            This following is not acceptable anymore, you will be exploited
            <pre class="prettyprint">$query  =  "SELECT * FROM users WHERE username = '".$_POST['username']."'; ";
mysql_query( $query );</pre>
            Attacks are all automated now, there are easy ways to see if you are doing it, and easy wasys to take advantage.
            It doesnt matter if you just have a greeting card site, you dont want to cleanup after your site get comprimised.
            <br /><br />
            If you use a PHP framework, chances are the 
          </p>

          <h3 id="escaping">Displaying Information on the Page</h3>
          <p>
            XSS is a very tricky subject and there are alot of specifics thats why we have this awesome section on it!
            <br /><br />
            <a href="/a2" class="btn btn-primary" style="margin-left:100px;">Go to XSS Section &rarr;</a>
            <br /><br />
            The short part about it is this. If you are allowing users to submit information and save it in a DB, then that input gets displayed somewhere else 
            you should click the link above. 
            <br /><br />
            The usual vulnerailbity looks as simple as this:

            <pre class="prettyprint">Hello: &#60;?php echo $user->name;?>,</pre>

            Which when exploited looks like:

            <pre class="prettyprint">Hello: &lt;script&gt;evilcode();&lt;/script&gt;,</pre>

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