<?php
@session_start();

include_once "settings.inc.php";
include_once "functions.inc.php";
include_once "languages.inc.php";

function head()
{
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Malware Scanner - <?php
    echo lang_key("installation_wizard");
?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/img/favicon.png">
    <meta charset="utf-8">
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" media="screen">
    <link type="text/css" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" rel="stylesheet">  
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-12">
                    <br /><center><h3><i class="fa fa-search"></i> Malware Scanner - <?php
    echo lang_key("installation_wizard");
?></h3></center><br />
                    <div class="bs-example">
                        <div class="jumbotron">
<?php
}

function footer()
{
?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
<?php
}
?>