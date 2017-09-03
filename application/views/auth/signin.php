<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>DoHRM &mdash; Sign In</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="<?php echo base_url(); ?>assets/themes/online_files/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/themes/font-awesome-4.1/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>assets/themes/css/Fonts.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/themes/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/themes/css/form.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <style>
        html,body {
            background-image: url("<?php echo base_url(); ?>assets/themes/img/dark_geometric.png");
            background-color: #cccccc;
            background-repeat: repeat;
            height: 100%;
            min-height: 100%;
        }
        </style>
    </head>
    <body class="bg-black">
        <br/><br/>
        <div class="form-box" id="login-box">
            <div class="header"><span class="signin-logo">DoHRM - Sign In</span></div>
            <form action="<?php echo site_url('auth/signin'); ?>" method="post">
                <div class="body bg-gray">
                	<?php if (isset($signin_error) && $signin_error): ?>
					<div class="alert alert-danger alert-dismissable margin-top-20">
                        <i class="fa fa-ban"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Error!</b> user not found.
                    </div>
                	<?php endif; ?>

                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Work Email"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password"/>
                    </div>          
                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Remember me
                    </div>
                </div>
                <div class="footer">                                                               
                    <input type="submit" class="btn bg-olive btn-block" name="btn_signin" value="Sign In"/>  
                </div>
            </form>
        </div>

        <script src="<?php echo base_url(); ?>assets/themes/online_files/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/themes/online_files/bootstrap.min.js" type="text/javascript"></script>

    </body>
</html>