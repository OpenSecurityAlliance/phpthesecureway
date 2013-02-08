

<!-- Subhead
================================================== -->
<header class="jumbotron subhead" id="overview">
  <div class="container">
    <h1>Playgound</h1>
    <h1></h1>
    <p class="lead">
      A1 - Injection
    </p>
  </div>
</header>


<div class="container exploit-tabs">
  <ul class="nav nav-tabs">
    <li><a href="/a2/">Exploit Details</a></li>
    <li class="active"><a href="/a2/example_1">"Stored XSS" Playground</a></li>
  </ul>
</div>


<div class="container">

<section>
  <h4>Stored XSS Attack walk through</h4>
  <style>
    .example td{
      vertical-align:middle
    }
  </style>
  <table class="table example" style="width:100%">
    <tr>
      <td><a href="/a2/example_1_a" target="_blank" class="btn" style="width:100px;">Form Page</a></td>
      <td >
        First they find a field that they can exploit. 
        <br /><br /><br />
        They then save the XSS payload in the field.
      </td>
      <td><img src="/assets/images/a2/xss_how.png" style="width:500px;" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">The XSS payload is then saved in the database</td>
    </tr>
    <tr>
      <td><a href="/a2/example_1_b" target="_blank" class="btn" style="width:100px;">Display Page</a></td>
      <td>
        They payload is then "echoed" on the page every place that that particular field is shown.
        <br /><br /><br />
        This then infects any browser viewing this page.
      </td>
      <td>
        <pre class="prettyprint">&#60;?php echo s( $user->name );?></pre>
        <img src="/assets/images/a2/xss_what.png" style="width:500px;" />
      </td>
    </tr>
    <tr>
      <td><a href="/a2/example_1_c" target="_blank" class="btn" style="width:100px;">Payload Page</a></td>
      <td>
        Why would they do this?
        <br /><br />
        Now all they need to do is copy and paste this session cookie and they gain all the rights and permissions you have.
      </td>
      <td>
        <img src="/assets/images/a2/xss_why.png" style="width:500px;" />
        <pre class="prettyprint">wordpress_logged_in_cef0b81c097b1bbcab03e88c1affb967=administrator%7C1360474428%7C8db583006988ef318d72d416d149682f;</pre>
      </td>
    </tr>
  </table>
</section>
  

</section>


</div>