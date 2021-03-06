<?php
include 'config.php';

$config = include 'config.php';

if ($config['username'] == '' && $config['password'] == '') {
    echo '<meta http-equiv="refresh" content="0; url=install" />';
    exit();
}

session_start();

if (isset($_SESSION['sec-username'])) {
    $uname = $_SESSION['sec-username'];
    if ($uname != $config['username']) {
        echo '<meta http-equiv="refresh" content="0; url=index.php" />';
        exit;
    }
} else {
    echo '<meta http-equiv="refresh" content="0; url=index.php" />';
    exit;
}

$_GET  = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

function head()
{
    include 'config.php';
    
	$config = include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <title>Malware Scanner &rsaquo; Admin Panel</title>


    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Bootstrap Stylesheet-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/purple-skin.min.css">

	<!--Font Awesome-->
    <link href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" rel="stylesheet">
	
    <!--Switchery-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css" rel="stylesheet">
	
	<!--Stylesheet-->
    <link href="assets/css/admin.min.css" rel="stylesheet">

    <!--DataTables-->
    <link href="https://cdn.datatables.net/v/bs/dt-1.10.21/r-2.2.5/datatables.min.css" rel="stylesheet">
	
	<!--DatePicker-->
    <link href="assets/plugins/datepicker/datepicker.min.css" rel="stylesheet">
	
    <!--SCRIPT-->
    <!--=================================================-->

    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    
</head>

<body class="hold-transition skin-purple sidebar-mini <?php
    if ($config['fixed_layout'] == 'Yes') {
        echo 'fixed';
    }
?> <?php
    if ($config['boxed_layout'] == 'Yes') {
        echo 'layout-boxed';
    }
?> <?php
    if ($config['sidebar_collapsed'] == 'Yes') {
        echo 'sidebar-collapse';
    }
?>" onload="startTime()">
<div class="wrapper">

  <header class="main-header">

    <a href="dashboard.php" class="logo">
      <span class="logo-mini">Malware<strong>Scanner</strong></span>
      <span class="logo-lg">Malware <strong>Scanner</strong></span>
    </a>

    <nav class="navbar navbar-static-top">

      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li>
             <a href="settings.php"><span><i class="fa fa-cogs"></i>&nbsp;&nbsp;Settings</span></a>
          </li>
<?php
    $uname = $_SESSION['sec-username'];
?>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="assets/img/avatar.png" class="user-image" alt="Admin Image">
              <span class="hidden-xs"><?php
        echo $_SESSION['sec-username'];
?></span>
            </a>
            <ul class="dropdown-menu">

              <li class="user-header">
                <img src="assets/img/avatar.png" class="img-circle" alt="Admin Image">

                <p>
                  <?php
        echo $_SESSION['sec-username'];
?>
                </p>
              </li>

              <li class="user-footer">
                <div class="pull-left">
                  <a href="account.php" class="btn btn-default btn-flat"><i class="fa fa-user fa-fw fa-lg"></i> Edit Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar">

    <section class="sidebar">

      <div class="user-panel">
        <div class="pull-left image">
          <img src="assets/img/avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <br /><p><?php
        echo $_SESSION['sec-username'];
?></p>
        </div>
      </div>

      <ul class="sidebar-menu">
        <li class="header">NAVIGATION</li>
        
        <li <?php
    if (basename($_SERVER['SCRIPT_NAME']) == 'dashboard.php') {
        echo 'class="active"';
    }
?>>
           <a href="dashboard.php">
              <i class="fa fa-home"></i> <span>Dashboard</span>
           </a>
        </li>

        <li <?php
        if (basename($_SERVER['SCRIPT_NAME']) == 'account.php') {
            echo 'class="active"';
        }
?>>
           <a href="account.php">
              <i class="fa fa-user"></i> <span>Account</span>
           </a>
        </li>

        <li class="header">SECURITY</li>
          
        <li <?php
        if (basename($_SERVER['SCRIPT_NAME']) == 'malware-scanner.php') {
            echo 'class="active"';
        }
?>>
           <a href="malware-scanner.php">
              <i class="fa fa-search"></i> <span>Malware Scanner</span>
           </a>
        </li>
		
		<li class="header">TOOLS</li>
		
		<li <?php
        if (basename($_SERVER['SCRIPT_NAME']) == 'security-check.php') {
            echo 'class="active"';
        }
?>>
           <a href="security-check.php">
              <i class="fa fa-check"></i> <span>Security Check</span>
           </a>
        </li>
          
      </ul>
    </section>

  </aside>
<?php
}

function footer()
{
    include 'config.php';
    
    $config = include 'config.php';
?>
<footer class="main-footer">
    <strong>&copy; <?php
    echo date("Y");
?> <a href="https://codecanyon.net/item/shell-scanner/5609275?ref=Antonov_WEB" target="_blank">Malware Scanner</a></strong>
    
</footer>

</div>

    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--Bootstrap-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<?php
    if ($config['sidebar_hover'] == 'Yes') {
        echo '
	<script>
        var ThemeOptions = {
          sidebarExpandOnHover: true
        };
    </script>';
    }
?>
	
	<!--Admin-->
    <script src="assets/js/admin.min.js"></script>

<?php
    if ($config['fixed_layout'] == 'Yes') {
        echo '
	<!--SlimScroll-->
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>';
    }
?>

    <!--Switchery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
    
    <!--DataTables-->
    <script src="https://cdn.datatables.net/v/bs/dt-1.10.21/r-2.2.5/datatables.min.js"></script>
	
	<!--DatePicker-->
	<script src="assets/plugins/datepicker/datepicker.min.js"></script>
    <script src="assets/plugins/datepicker/datepicker.en.js"></script>

</body>
</html>
<?php
}
?>