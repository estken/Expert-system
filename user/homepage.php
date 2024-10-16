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
include 'connection.php';
$name=$_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="part time client">
    <meta name="author" content="part time client">
    <title>Diagnosing Breast and Postrate Cancer</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/home.css" rel="stylesheet">


    <link href="css/main.css" rel="stylesheet">
    <link id="css-preset" href="../css/presets/preset1.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

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
                <li id='home' class="active"><a href="#">Home</a>
                </li>
                <li id="prof"><a href="diagnosis.php">Diagnosis</a>
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
                <h3 class="text-center" style="color:black">AN EXPERT SYSTEM FOR DIAGNOSING BREAST AND PROSTATE CANCER</h3>
            </div>
        </div>

    </div>
</nav>


<div id="pagebodys" style="margin: 0px !important;margin-top: : 0px !important">
    <div id="pagetransparency">
        <br><br>
    <div class="container-fluid" style="margin: 0px !important;">
    <div class="row">
    <div class="col-xs-12" style="background-image: url('../images/3.jpg');background-size: cover; background-attachment: fixed;height: 300px;margin: 0px !important;margin-top: : 0px !important">
      <h3 style="color:black;padding-top: 6%;text-transform: capitalize;" class='text-center'>Verify your Health status now!!!</h3>
    </div>
</div>
<!-- Main jumbotron for a primary marketing message or call to action -->
<div  id="expert" style='margin-bottom: 100px !important'>
    <div class="container" id="experttest1">
        <br><br>
        <div class="row">
            <h4 class="text-center" style="color:black">Please respond correctly to the questions to enable us give accurate and complete diagnosis</h4>
            <div class="text-center" style="margin-top: 20px;">
                <a href="postrate-cancer.php" class="btn btn-primary">Diagnosed for Postrate Cancer</a>
            </div>
            <h3>Breast Cancer</h3>
            <div class="col-sm-12 col-md-offset-2 col-md-8 jumbotron form-horizontal" id="experttest2">
            <?php
                include 'connection.php';
                $b = $_POST['f'];
                $b = $b * 5;
                $c = $b + 4;
                $select = "SELECT * FROM symptoms WHERE id > $b AND id <= ($c + 1)"; // Change from symptoms to postrate_cancer
                $query = mysqli_query($conn, $select);

                echo "<div class='table-responsive'><table class='table'><thead><tr><th>Symptoms</th><th>Response</th></thead></tr><tbody>";
                $val = (int)mysqli_num_rows($query);

                while ($row = mysqli_fetch_array($query)) {
                    echo "<tr>
                            <td><input type='submit' id='symptoms' class='btn btn-mini' value='" . $row['symptom'] . "'></td>
                            <td>
                                <select class='form-control form-horizontal' id='opt'>
                                    <option>High</option>
                                    <option>Moderate</option>
                                    <option>Low</option>
                                    <option>None</option>
                                </select>
                            </td>
                        </tr>";
                }

                if (($b - 1) >= $val) {
                    echo "</tbody></table></div><div class='form-group'>
                            <div class='col-sm-12'>
                                <ul class='pager'>
                                    <li class='previous btn btn-mini' id='previous'><a href='#'>Previous</a></li>
                                    <li class='next btn btn-mini' id='process'><a href='#'>Submit</a></li>
                                </ul>
                            </div>
                        </div>";
                } else {
                    echo "</tbody></table></div><div class='form-group'>
                            <div class='col-sm-12'>
                                <ul class='pager'>
                                    <li class='previous btn btn-mini' id='previous'><a href='#'>Previous</a></li>
                                    <li class='next btn btn-mini' id='regss'><a href='#'>Next</a></li>
                                </ul>
                            </div>
                        </div>";
                }
                ?>


            </div>
        
        
        </div>
    </div>
</div>

<footer class='navbar navbar-fixed-bottom' style="background-color:#5fa7e4 !important;margin:0px !important;border:none;">
    <div class="container">
        <div class="text-center" >
<p style='color:white !important'>Oyiwe Ajiri Jeffrey (U2014/5570272)</p>
    </div>
</footer> /#footer

<script src='../js/jquery-1.11.3.min.js'></script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>



</body>
</html>
