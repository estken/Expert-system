<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/mims.css">
        <script src='js/bootstrap.min.js'></script>
  <script src='../js/jquery-1.9.1.min.js'></script>
 <script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>


    </head>
    <body>
        <header class='row'>
            <nav class="navbar navbar-inverse navbar-fixed-top">
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
                <h3 style=" text-align: center;">AN EXPERT SYSTEM FOR DIAGNOSING BREAST AND PROSTATE CANCER</h3>

        <div class="container">
            <div class="row" id='center'>
                <div class="col-sm-7 col-md-7 col-sm-offset-3 well">
                    <h3><span class="glyphicon glyphicon-user"></span> Patient Registration Form</h3>
                    <form   method='POST' action='register.php' class="form-horizontal">
                        <hr>
                        <div class='form-group'>
                            <label class='col-sm-5 control-label'>Full Name:</label>
                            <div class="col-sm-7">
                                <input name='name' type='text' id='name' class="form-control" required>
                            </div>
                        </div>
                        <div class='form-group'>
                            <label class='col-sm-5 control-label'>Username:</label>
                            <div class="col-sm-7">
                                <input name='username' type='text' id='username' class="form-control" required>
                            </div>
                        </div>
                    <div class="form-group">
                    <label class="control-label col-sm-5">Gender</label>
                    <div class="col-sm-7">
                      <select class="form-control" name='gender' id="sel1">
                        <option>Male</option>
                        <option>Female</option>
                        <option>Others</option>
                      </select>
                    </div>
                  </div> <!-- /.form-group -->
                        <div class='form-group'>
                            <label class='col-sm-5 control-label'>Password:</label>
                            

                            <div class="col-sm-7">
                                <input name='password' id="password" type='Password' class="form-control" required>
                            </div>
                        </div>
                        
                        <div class='form-group'>
                            <label class='col-sm-5 control-label'>Confirm Password:</label>
                            <div class="col-sm-7">
                                <input name='cpassword' id="confirm" type='password' class="form-control" required>
                            </div>
                        </div>
                        <div class='form-group'>                            
                            <div class="col-sm-offset-5 col-sm-7">
                                <input name='submit' id="sub" value="Register" type='submit' class="btn btn-info btn-block">
                            </div>
                        </div>
                        <div class='form-group'>
                        <div class="col-sm-12 criteria">
                            </div>
                        </div>
                        <p>Already have an account? <a href='login.php' class='text-danger'>Login</a></p> 
                    </form>
                    <div id='response'></div>
                     <?php
                       if (isset($_POST['submit'])){
                        $name=$_POST['name'];
                        $password=$_POST['password'];
                        $password=sha1($password);
                        $username=$_POST['username'];
                        $gender=$_POST['gender'];
                        $conn=mysqli_connect('localhost','root','','expert');
                        $select="SELECT * FROM user WHERE username='$username'";
                        $query=mysqli_query($conn,$select);
                        if (mysqli_num_rows($query)>0){
                            echo "<p style='color:red'> Username already exists</p>";
                        }
                        else{
                         $insert="INSERT INTO user (fullname,username,password,gender) Values ('$name','$username','$password','$gender')";
                         mysqli_query($conn,$insert);
                         echo "<p style='color:blue'>registration successful</p>";
                        }
                      }
                     ?>

                </div>
            </div>

        </div>
        <footer id="footers"> 
                 <div class="container"> 
                  <div class="text-center"> 
                   <p>Oyiwe Ajiri Jeffrey (U2014/5570272)</p> 
                  </div> 
                 </div> 
                </footer> <!--/#footer-->
                <script src='../js/bootstrap.min.js'></script>
  <script src='../js/jquery-1.11.3.min.js'></script>
 <script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
             <script src='../js/script.js'></script>

    </body>
</html>