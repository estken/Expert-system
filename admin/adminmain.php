  <?php
  /**
   * Created by PhpStorm.
   * User: User
   * Date: 11/8/2017
   * Time: 2:42 AM
   */
  session_start();
  if (!$_SESSION['id']){
    header('location:index.php');
    exit;
  }
  include '../user/connection.php';
  $name=$_SESSION['id'];
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="part time client">
    <meta name="author" content="part time client">
    <title>Admin portal</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
      <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    <style>
      #navbar ul li.active a{
       background-color:white !important;
       color:black !important;
     }
     #navbar ul li.active a:hover{
       background-color:white !important;
       color:black !important;
     }

     #navbar ul li a{
       color:black !important;
     }
     #navbar ul li a:hover{
       color:white !important;
     }
     select{

     }
     input{
       border:1px solid black;
     }
   </style>
   <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
   <link rel="shortcut icon" href="images/favicon.icon">


 </head><!--/head-->

 <body>
  <nav class="navbar navbar-inverse  normal" style="background-color:#5fa7e4 !important;margin:0px !important;border:none;" role="navigation" style="border:none;margin-bottom: 0px">

    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <?php
        echo " <a class='navbar-brand' href='#' style='color:white'>WELCOME ".strtoupper($name)."</a>";
        ?>
      </div>
      <div id="navbar" class="collapse navbar-collapse">

        <ul class="nav navbar-nav navbar-right">
          <li id="prof" class="active"><a href="#">New symptom</a>
          </li>
          <li id="knowledge"><a href="#">Existing knowledge</a>
          </li>    
          <li><a href="logout.php">Logout</a>
          </li>

        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.contatiner -->
    <div class="container-fluid" style="background-color:#ffeffa !important;margin:0px !important;border:none;">
      <div class="row">
        <div class="col-sm-12">
          <h3 class="text-center" style="color:black">WELCOME ADMINISTRATOR</h3>
        </div>
      </div>

    </div>
  </nav>


  <div id="pagebodys">
    <div id="pagetransparency">
      <br><br>
      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div  id="expert">
        <div class="container" id="experttest1">
          <br><br>
          <div class="row">
            <h4 class="text-center" style="color:black">Enter New symptom to improve system diagnoses strength</h4>
            <div class="col-sm-12 col-md-offset-2 col-md-8 jumbotron form-horizontal" id="experttest2">
              <form  class="form-horizontal" method='post' action='adminmain.php'>
                <hr>
                <div class='form-group'>
                  <label class='col-sm-5 control-label'>Symptom:</label>
                  <div class="col-sm-7 col-xs-12">
                    <input name='symptom' type='text' id='matric' class="form-control" required>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-5 control-label'>Impact:</label>
                   <div class="col-sm-7">
                      <select class="form-control" name='effect' id="sel1">
                        <option>High</option>
                        <option>Medium</option>
                        <option>Low</option>
                      </select>
                    </div>
                </div>
                <div class='form-group'>                            
                            <div class="col-sm-offset-5 col-sm-7 col-xs-12" >
                                <input name='submitz' id="subs" value="Submit Symptom" type='submit' class="btn btn-info btn-mini btn-block">
                            </div>
                               
                        </div>
                      </form>
                        <?php
                        // submitting the symptoms and their impact into the database.
                        if (isset($_POST['submitz'])){
                        $symptom=$_POST['symptom'];
                        $impact=$_POST['effect'];

                        //checking if the symptom already exists in the knowledge base. Rejecting if it exists.
                        $select="SELECT * FROM symptoms WHERE symptom='$symptom'";
                        $query=mysqli_query($conn,$select);
                        if(mysqli_num_rows($query)){
                           echo "<p style='color:red' class='text-center'>Symptom already exists, enter another symptom</p>";
                        }
                        else{
                          $insert="INSERT into symptoms(symptom,impact) VALUES ('$symptom','$impact')";
                          mysqli_query($conn,$insert);
                          echo "<p class='text-center text-success'>Successfully added</p>";
                        }
                      }

                        ?>
        

            </div>
          </div>
        </div>
      </div>

      <div class="container" id="test2" style="display:none">
        <br>
        <div class="row"><br>
          <p style='color:white'>These are the symptoms entered into the knowledge base by the knowledge base Engineer.</p>
          <h4 class="text-center" style="color:white">Symptoms entered</h4><br><br>
          <div class="col-sm-12 col-md-offset-2 col-md-8 well form-horizontal"  >

            <?php
            $select1="SELECT * FROM symptoms";
            $query2=mysqli_query($conn,$select1);
            echo "<p class='text-center text-primary'><b> Symptoms as gotten from the Knowledge engineer and entered into the database (Knowledge base) are as follows:</b></p><br>";
            echo "<ol style='list-style-type:number'>";
            while($row=mysqli_fetch_array($query2)){
              echo"<li class='text-primary'>";
              echo $row['symptom'];
              echo "</li>";
              

            }
            echo "</ol>";
            ?>
          </div>
          <br><br><br><br>
        </div><br><br><br><br><br>
      </div>

    </div>
  </div>
  <!-- /container -->



  <footer class='navbar navbar-fixed-bottom' style="background-color:#5fa7e4 !important;margin:0px !important;border:none;">
    <div class="container">
      <div class="text-center" >
        <p style='color:white !important'>Oyiwe Ajiri Jeffrey (U2014/5570272)</p>
      </div>
    </footer> <!--/#footer-->




    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script src='../js/jquery-1.11.3.min.js'></script>
    <script type="text/javascript" src="../js/script.js"></script>



  </body>
  </html>
