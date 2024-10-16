<?php
session_start();
if (!$_SESSION['id']){
    header('location:../index.html');
    exit;
}
include 'connection.php';
$name = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="part time client">
    <meta name="author" content="part time client">
    <title>Diagnosing Breast and Prostate Cancer</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/home.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link id="css-preset" href="../css/presets/preset1.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <style>
        #navbar ul li.active a {
            background-color:white !important;
            color:black !important;
        }
        #navbar ul li a {
            color:black !important;
        }
        #navbar ul li a:hover {
            color:white !important;
        }
        input {
            border:1px solid black;
        }
    </style>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="images/favicon.icon">
</head>

<body>
<nav class="navbar navbar-inverse  normal" style="background-color:#5fa7e4 !important;margin:0px !important;border:none;" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php echo "<a class='navbar-brand' href='#' style='color:white'>WELCOME ".strtoupper($name)."</a>"; ?>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li id='home'><a href="homepage.php">Home</a></li>
                <li id="prof" class="active"><a href="diagnosis.php">Diagnosis</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
    <div class="container-fluid" style="background-color:#ffeffa !important;margin:0px !important;border:none;">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="text-center" style="color:black">AN EXPERT SYSTEM FOR DIAGNOSING BREAST AND PROSTATE CANCER</h3>
            </div>
        </div>
    </div>
</nav>

<div id="pagebodys" style="margin: 0px !important;">
    <div id="pagetransparency">
        <br><br>
        <div class="container-fluid" style="margin: 0px !important;">
            <div class="row">
                <div class="col-xs-12" style="background-image: url('../images/2.jpg');background-size: cover; background-attachment: fixed;height: 300px;">
                    <h3 style="color:black;padding-top: 6%;text-transform: capitalize;" class='text-center'>Diagnosis and Treatment</h3>
                </div>
            </div>
        </div>

        <div id="expert" style='margin-bottom: 100px !important'>
            <div class="container" id="experttest1">
                <br><br>
                <div class='col-xs-12 col-sm-6 col-md-4 well'>
                    <h4 class='text-center'>Selected symptoms</h4>
                    <?php
                    $select = "SELECT * FROM response WHERE id='$name'";
                    $query = mysqli_query($conn, $select);
                    if (mysqli_num_rows($query) > 0) {
                        echo "<div class='table-responsive'><table class='table'><thead><tr><th>Symptoms</th><th>Effects</th></thead></tr><tbody>";
                        while ($row = mysqli_fetch_assoc($query)) {
                            echo "<tr><td><input type='submit' id='symptoms' class='btn btn-mini' value='".$row['answers']."'></td>
                                  <td><input type='submit' id='symptoms' class='btn btn-mini' value='".$row['effect']."'></td></tr>";
                        }
                        echo "</tbody></table></div>";
                    } else {
                        echo "<p class='text-success'>You have not selected any symptoms yet. Please select your symptoms from the homepage for proper diagnosis.</p>";
                    }
                    ?>
                </div>

                <div class='col-xs-12 col-sm-6 col-md-4 well'>
                    <h4 class='text-center'>Diagnosis</h4>
                    <form method='post' action='diagnosis.php'>
                        <input type='submit' name="diagnize" class='btn btn-mini btn-success' value='View Result'/>
                    </form>

                    <?php
                    if (isset($_POST['diagnize'])) {
                        // Define the symptoms for breast and prostate cancer
                        $breastSymptoms = [
                            'Lump in the breast or underarm', 'Swelling of the breast', 'Irritated or dimpled skin',
                            'Pain in the breast or nipple area', 'Nipple discharge'
                        ];
                        $prostateSymptoms = [
                            'Frequent urination, especially at night', 'Weak or interrupted urine stream', 
                            'Trouble starting or stopping urination', 'Painful or burning sensation during urination or ejaculation', 
                            'Blood in urine or semen'
                        ];

                        // Count symptoms for breast cancer
                        $getBreastCancer = "SELECT * FROM response WHERE answers IN ('" . implode("','", $breastSymptoms) . "') AND id='$name'";
                        $breastValue = mysqli_num_rows(mysqli_query($conn, $getBreastCancer));

                        // Count symptoms for prostate cancer
                        $getProstateCancer = "SELECT * FROM response WHERE answers IN ('" . implode("','", $prostateSymptoms) . "') AND id='$name'";
                        $prostateValue = mysqli_num_rows(mysqli_query($conn, $getProstateCancer));

                        // Determine diagnosis and severity
                        if ($breastValue > 0) {
                            $severity = ($breastValue / count($breastSymptoms)) * 100;
                            echo "<p class='text-center text-danger'>Breast Cancer Detected. Severity: " . round($severity) . "%</p>";
                        } elseif ($prostateValue > 0) {
                            $severity = ($prostateValue / count($prostateSymptoms)) * 100;
                            echo "<p class='text-center text-danger'>Prostate Cancer Detected. Severity: " . round($severity) . "%</p>";
                        } else {
                            echo "<p class='text-center text-success'>No cancer symptoms detected. Please consult a physician for further evaluation.</p>";
                        }
                    }
                    ?>
                </div>

                <div class='col-xs-12 col-sm-6 col-md-4 well'>
                    <h4 class='text-center'>Drugs administered</h4>
                    <p class='text-center text-success'>
                        This progress chart indicates the degree of the diagnosed illness. Do not panic based on what you see.
                    </p>
                    <!-- Add progress bar and drug recommendation here if applicable -->
                </div>
            </div>
        </div>
    </div>
</div>

<footer class='navbar navbar-fixed-bottom' style="background-color:#5fa7e4 !important;margin:0px !important;border:none;">
    <div class="container">
        <div class="text-center">
            <p style='color:white !important'>Oyiwe Ajiri Jeffrey (U2014/5570272)</p>
        </div>
    </div>
</footer>

<script src='../js/jquery-1.11.3.min.js'></script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>

</body>
</html>
