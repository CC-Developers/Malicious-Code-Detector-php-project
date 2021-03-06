<?php
require("core.php");
head();

if (isset($_POST['save'])) {
    
    if (isset($_POST['fixed_layout'])) {
        $fixed_layout = 'Yes';
    } else {
        $fixed_layout = 'No';
    }
    
    if (isset($_POST['boxed_layout'])) {
        $boxed_layout = 'Yes';
    } else {
        $boxed_layout = 'No';
    }
    
    if (isset($_POST['sidebar_collapsed'])) {
        $sidebar_collapsed = 'Yes';
    } else {
        $sidebar_collapsed = 'No';
    }
    
    if (isset($_POST['sidebar_hover'])) {
        $sidebar_hover = 'Yes';
    } else {
        $sidebar_hover = 'No';
    }
    
    $config['fixed_layout']      = $fixed_layout;
    $config['boxed_layout']      = $boxed_layout;
    $config['sidebar_collapsed'] = $sidebar_collapsed;
    $config['sidebar_hover']     = $sidebar_hover;
    file_put_contents('config.php', '<?php return ' . var_export($config, true) . '; ?>');
    
    echo '<meta http-equiv="refresh" content="0; url=settings.php" />';
    
}
?>
<div class="content-wrapper">

			<!--CONTENT CONTAINER-->
			<!--===================================================-->
			<div id="content-container">
				
				<section class="content-header">
    			  <h1><i class="fa fa-cogs"></i> Settings</h1>
    			  <ol class="breadcrumb">
   			         <li><a href="dashboard.php"><i class="fa fa-home"></i> Admin Panel</a></li>
    			     <li class="active">Settings</li>
    			  </ol>
    			</section>


				<!--Page content-->
				<!--===================================================-->
				<section class="content">

                <div class="row">
                    
				<div class="col-md-12">
<form class="form-horizontal" method="post">
				    <div class="box">
						<div class="box-header">
							<h3 class="box-title"><i class="fa fa-cog"></i> Settings</h3>
						</div>
						<div class="box-body">
											
											<br /><h4 class="box-title"><i class="fa fa-desktop"></i> Interface Options</h4>
											
											<div class="form-group">
												<label class="control-label col-md-3">Fixed Layout</label>
												<div class="col-md-9">
                                                    <div class="switch switch-success">
                                                        <div class="switch switch-sm switch-success">
														      <input type="checkbox" name="fixed_layout" id="ios-switch" <?php
if ($config['fixed_layout'] == 'Yes') {
    echo 'checked="checked" checked';
}
?> />
												        </div> Activates the fixed layout. Fixed and boxed layouts can't work together<br />
												    </div>
												</div>
											</div><hr>
											<div class="form-group">
												<label class="control-label col-md-3">Boxed Layout</label>
												<div class="col-md-9">
                                                    <div class="switch switch-success">
                                                        <div class="switch switch-sm switch-success">
														      <input type="checkbox" name="boxed_layout" id="ios-switch2" <?php
if ($config['boxed_layout'] == 'Yes') {
    echo 'checked="checked" checked';
}
?> />
												        </div> Activates the boxed layout<br />
												    </div>
												</div>
											</div><hr>
											<div class="form-group">
												<label class="control-label col-md-3">Collapsed sidebar</label>
												<div class="col-md-9">
                                                    <div class="switch switch-success">
                                                        <div class="switch switch-sm switch-success">
														      <input type="checkbox" name="sidebar_collapsed" id="ios-switch3" <?php
if ($config['sidebar_collapsed'] == 'Yes') {
    echo 'checked="checked" checked';
}
?> />
												        </div> Activates the compact sidebar navigation<br />
												    </div>
												</div>
											</div><hr>
											<div class="form-group">
												<label class="control-label col-md-3">Sidebar Expand on Hover</label>
												<div class="col-md-9">
                                                    <div class="switch switch-success">
                                                        <div class="switch switch-sm switch-success">
														      <input type="checkbox" name="sidebar_hover" id="ios-switch4" <?php
if ($config['sidebar_hover'] == 'Yes') {
    echo 'checked="checked" checked';
}
?> />
												        </div> Lets the sidebar navigation expand on hover<br />
												    </div>
												</div>
											</div>
                        </div>
                        <div class="panel-footer text-left">
							<button class="btn btn-flat btn-primary" name="save" type="submit">Save</button>
				            <button type="reset" class="btn btn-flat btn-default">Reset</button>
				        </div>
                     </div>
</form>
                </div>
				</div>
                    
				</div>
				<!--===================================================-->
				<!--End page content-->


			</div>
			<!--===================================================-->
			<!--END CONTENT CONTAINER-->

<script>
$(document).ready(function() {
    new Switchery(document.getElementById('ios-switch'), { size: 'large' });
    new Switchery(document.getElementById('ios-switch2'), { size: 'large' });
	new Switchery(document.getElementById('ios-switch3'), { size: 'large' });
	new Switchery(document.getElementById('ios-switch4'), { size: 'large' });
});
</script>    
<?php
footer();
?>