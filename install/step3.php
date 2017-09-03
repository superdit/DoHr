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
                        <strong>Administrator Setup</strong>
                    </a>
                </span>
                <div class="clr"></div>
            </div>
			
			<br/>
			
			<section class="af-wrapper">

				<form class="af-form" method="post" action="validate.php">
								
					<div class="af-outer af-required">
						<div class="af-inner">
							<label for="input-name">Administrator Email</label>
							<input type="text" name="adminemail">
						</div>
					</div>
					
					<div class="af-outer af-required">
						<div class="af-inner">
						  <label for="input-country">Administrator Password</label>
						  <input type="text" name="dbuser">
						</div>
					</div>
					
					<div style="text-align:right;">
                        <input type="hidden" name="step" value="2"/>
						<button id="btnBack">Back</button> 
				        <input type="submit" value="Install" /> 
					</div>
					
				</form>
			</section>
        </div>
		
		<script>
		$(function() {
			$("#btnBack").click(function(e) {
				e.preventDefault();
				var urlRedirect = document.location.origin + document.location.pathname + "?step=2";
				window.location = urlRedirect;
			});
		});
		</script>
    </body>
</html>