<?php

$dbhost = (isset($_SESSION['dbhost'])) ? $_SESSION['dbhost'] : '';
$dbname = (isset($_SESSION['dbname'])) ? $_SESSION['dbname'] : '';
$dbuser = (isset($_SESSION['dbuser'])) ? $_SESSION['dbuser'] : '';
$dbpass = (isset($_SESSION['dbpass'])) ? $_SESSION['dbpass'] : '';
$weburl = (isset($_SESSION['weburl'])) ? $_SESSION['weburl'] : '';
$error  = (isset($_SESSION['error'])) ? $_SESSION['error'] : '';

unset($_SESSION['error']);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <title>DOHR Installation</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Enhance Required Form Fields with CSS3" />
        <meta name="keywords" content="form, html5, css3, animated, transition, required, filter" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style2.css" />
		<script type="text/javascript" src="js/modernizr.custom.04022.js"></script>
		<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="codrops-top">
                <a href="#">
                    <strong>DOHR </strong>Installation
                </a>
                <span class="right">
                    <a href="#">
                        <strong>Database & Website URL</strong>
                    </a>
                </span>
                <div class="clr"></div>
            </div>
			
			<br/>
			
			<section class="af-wrapper">

				<form class="af-form" method="post" action="validate.php">
					
					<?php if (!$error == '') : ?>
					<div style="text-align:center;color:red;padding-bottom:10px;">
						<?php echo $error; ?>
					</div>
					<?php endif; ?>
					
					<div class="af-outer">
						<div class="af-inner">
							<label for="input-title">Database Host</label>
							<input type="text" name="dbhost" value="<?php echo $dbhost; ?>">
						</div>
					</div>
				
					<div class="af-outer af-required">
						<div class="af-inner">
							<label for="input-name">Database Name</label>
							<input type="text" name="dbname" value="<?php echo $dbname; ?>">
						</div>
					</div>
					
					<div class="af-outer af-required">
						<div class="af-inner">
						  <label for="input-country">Database User</label>
						  <input type="text" name="dbuser" value="<?php echo $dbuser; ?>">
						</div>
					</div>
					
					<div class="af-outer">
						<div class="af-inner">
						  <label for="input-catname">Database Password</label>
						  <input type="text" name="dbpass" value="<?php echo $dbpass; ?>">
						</div>
					</div>
					
					<div class="af-outer">
						<div class="af-inner">
						  <label for="input-catname">Website URL</label>
						  <input type="text" name="weburl" value="<?php echo $weburl; ?>">
						</div>
					</div>
					
					<div style="text-align:right;">
                        <input type="hidden" name="step" value="2"/>
						<button id="btnBack">Back</button> 
				        <input type="submit" value="Next" /> 
					</div>
					
				</form>
			</section>
        </div>
		
		<script>
		$(function() {
			$("#btnBack").click(function(e) {
				e.preventDefault();
				var urlRedirect = document.location.origin + document.location.pathname + "?step=1";
				window.location = urlRedirect;
			});
		});
		</script>
    </body>
</html>