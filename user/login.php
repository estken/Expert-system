<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/mims.css">
        
    </head>
    <body>
        <header class='row'>
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mims">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span> 
                        <span class="icon-bar"></span> 
                        <span class="icon-bar"></span>
                </button>
                </div>
                <div class="collapse navbar-collapse" id="mims">
                    <ul class="nav navbar-nav">
                        <li><a href="../index.html">Home</a></li>                      
                    </ul> 
                </div>
            </nav> 
        </header>
                <br><br>
                <h3 style=" text-align: center;"> AN EXPERT SYSTEM FOR DIAGNOSING BREAST AND PROSTATE CANCER</h3>

        <div class="container">
            <div class="row" id='center'>
                <div class="col-sm-7 col-md-7 col-sm-offset-3 col-xs-12 well">
                    <h3><span class="glyphicon glyphicon-user"></span>Patient Login Form</h3>
                    <form  class="form-horizontal" method='post' action='login.php'>
                        <hr>
                        <div class='form-group'>
                            <label class='col-sm-5 control-label'>Username:</label>
                            <div class="col-sm-7 col-xs-12">
                                <input name='username' type='text' id='matric' class="form-control" required>
                            </div>
                        </div>
                        <div class='form-group'>
                            <label class='col-sm-5 control-label'>Password:</label>
                            <div class="col-sm-7 col-xs-12">
                                <input name='password' id="password" type='Password' class="form-control" required>
                            </div>
                        </div>
                        <div class='form-group'>
                            <div id="error" class="col-sm-offset-5 col-sm-5">
                            </div>
                        </div>
                        <div class='form-group'>                            
                            <div class="col-sm-offset-5 col-sm-7 col-xs-12" >
                                <input name='submit' id="sub" value="Login" type='submit' class="btn btn-info btn-mini btn-block">
                            </div>
                               <p class='text-center'>Not registered? <a href='Register.php' class="text-danger">Click to register</a>
                            </p>
                        </div>
                    </form>
                    <?php
                    session_start();
                       if (isset($_POST['submit'])){
                        $password=$_POST['password'];
                        $password=sha1($password);
                        $username=$_POST['username'];
                       $conn=mysqli_connect('localhost','root','','expert');
                        $select="SELECT * FROM user WHERE username='$username' AND password='$password'";
                        $query=mysqli_query($conn,$select);
                        if (mysqli_num_rows($query)>0){
                           $_SESSION['id']=$username;
                           header("location:homepage.php");
                        }
                        else{
                           echo "<p style='color:red'>Username or password incorrect </p>";
                        }
                       }                      
                     ?>

                </div>
            </div>
            <br>
                            

        </div>
        <footer id="footer"> 
                 <div class="container"> 
                  <div class="text-center"> 
                   <p style='font-size:1em !important'>Oyiwe Ajiri Jeffrey (U2014/5570272)</p> 
                  </div> 
                 </div> 
                </footer> <!--/#footer-->
 <script src='../js/bootstrap.min.js'></script>
  <script src='../js/jquery-1.11.3.min.js'></script>
 <script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>

    </body>
</html>