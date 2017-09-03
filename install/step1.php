<?php

$phpver      = phpversion();
$extPdo      = extension_loaded('pdo');
$extMysql    = extension_loaded('mysql');
$extMysqli   = extension_loaded('mysqli');
$extPdoMysql = extension_loaded('pdo_mysql');
$folUploads  = is_writable('../assets/uploads');
$filConf     = is_writable('../application/config/config.php');
$filDb       = is_writable('../application/config/database.php');

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
        <meta name="author" content="Codrops modified by aditia" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
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
                        <strong>PHP Libray, Folder, File Check</strong>
                    </a>
                </span>
                <div class="clr"></div>
            </div>
			
			<br/>
			
			<section class="af-wrapper">
				
				<form class="af-form" id="af-form" novalidate method="post" action="validate.php">
					
					<div class="af-outer">
						<div class="af-inner">
							<label for="input-title">PHP Version</label>
							<div>5.6.11</div>
						</div>
					</div>
					
					<div class="af-outer">
						<div class="af-inner">
							<label for="input-title">PDO</label>
							<div><?php echo ($extPdo) ? '<span style="color:green">OK</span>' : 'NOT INSTALLED'; ?></div>
						</div>
					</div>
					
					<div class="af-outer">
						<div class="af-inner">
							<label for="input-title">MySQL</label>
							<div><?php echo ($extMysql) ? '<span style="color:green">OK</span>' : 'NOT INSTALLED'; ?></div>
						</div>
					</div>
					
					<div class="af-outer">
						<div class="af-inner">
							<label for="input-title">MySQLi</label>
							<div><?php echo ($extMysql) ? '<span style="color:green">OK</span>' : 'NOT INSTALLED'; ?></div>
						</div>
					</div>
					
					<div class="af-outer">
						<div class="af-inner">
							<label for="input-title">PDO MySQL</label>
							<div><?php echo ($extMysql) ? '<span style="color:green">OK</span>' : 'NOT INSTALLED'; ?></div>
						</div>
					</div>
					
					<div class="af-outer">
						<div class="af-inner">
							<label for="input-title">Folder upload assets / uploads</label>
							<div><?php echo ($extMysql) ? '<span style="color:green">Writable</span>' : 'NOT INSTALLED'; ?></div>
						</div>
					</div>
					
					<div class="af-outer">
						<div class="af-inner">
							<label for="input-title">File application / config / config.php</label>
							<div><?php echo ($extMysql) ? '<span style="color:green">Writable</span>' : 'NOT INSTALLED'; ?></div>
						</div>
					</div>
					
					<div class="af-outer">
						<div class="af-inner">
							<label for="input-title">File application / config / database.php</label>
							<div><?php echo ($extMysql) ? '<span style="color:green">Writable</span>' : 'NOT INSTALLED'; ?></div>
						</div>
					</div>
					
					<div style="text-align:right;">
                        <input type="hidden" name="step" value="1"/>
				        <input type="submit" value="Next" /> 
					</div>
					
				</form>
			</section>
        </div>
    </body>
</html>