<script>
$(function() {
$("#btn_search").click(function() {
        var term = $("#search_term").val();
        window.location = "<?php echo site_url("/admin/employee/search"); ?>/" + term;
    });

    $("#search_term").keypress(function(e) {
        if(e.which == 13) {
            var term = $("#search_term").val();
            window.location = "<?php echo site_url("/admin/employee/search"); ?>/" + term;
        }
    });
});
</script>


<section class="content-header">
    <h1>
        <?php echo $emp->name; ?>
        <small>
            <?php echo $emp->emp_number; ?>
            <span class="text-red"><?php if ($emp->status == 'resign') : ?>(resign)<?php endif; ?></span>
        </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(BACKEND_PATH. '/dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo site_url(BACKEND_PATH. '/employee') ?>">Employee</a></li>
        <li class="active">Overview</li>
    </ol>
</section>

<?php 
    $account_role = $this->session->userdata('logged_account_role');
    $emp_number = $this->session->userdata('logged_emp_number');
?>

<section class="content">
	<div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="box box-solid">
                 <div class="box-header">
                    <div class="row">
                        <div class="col-md-4">
                            <h3 class="box-title">
                                <?php if (!is_null($prev_emp)) : ?>
                                <a title="<?php echo $prev_emp->name; ?>" href="<?php echo site_url('admin/employee/overview/'.$prev_emp->emp_number); ?>" class="btn btn-sm btn-default" id="btn_search"><i class="fa fa-chevron-left"></i> &nbsp;Prev</a>
                                <?php endif; ?>
                            </h3>
                        </div>

                        <div class="col-md-4">
                            <h3 class="box-title pull-right">
                                <div class="input-group pull-left">
                                    <input type="text" name="table_search" value="<?php if (isset($search_term)) echo $search_term; ?>" id="search_term" class="form-control input-sm pull-left" style="width: 150px;" placeholder="Search"/>
                                    <div class="input-group-btn pull-left">
                                        <button class="btn btn-sm btn-default pull-left" id="btn_search"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </h3>
                        </div>

                        <div class="col-md-4 pull-right">
                            <h3 class="box-title pull-right">
                                <?php if (!is_null($next_emp)) : ?>
                                <a title="<?php echo $next_emp->name; ?>" href="<?php echo site_url('admin/employee/overview/'.$next_emp->emp_number); ?>" class="btn btn-sm btn-default" id="btn_search">Next&nbsp; <i class="fa fa-chevron-right"></i></a>
                                <?php endif; ?>
                            </h3>
                        </div>
                    </div>
                </div>
            </div><!-- /. box -->

            <div class="box box-solid">
                <div class="box-header margin-bottom-10"></div>
                <div class="box-body" style="background: #f9f9f9;">
                    
                    <div class="row">

                        <?php if ($emp_number == $emp->emp_number || ($account_role == "HR Manager" || $account_role == "Administrator")) : ?>
                        <div class="col-md-12">
                            <a href="<?php echo site_url('admin/employee/employment/'.$emp->emp_number); ?>" class="btn btn-default btn-xs pull-right"><i class="fa fa-pencil"></i> &nbsp;Edit</a>
                        </div>
                        <?php endif; ?>

                    	<div class="col-md-4">
                            <div class="text-center">
                                <?php if ($emp->photo == ''): ?>
                                <img class="img-profile img-emp-round" src="<?php echo base_url() ?>assets/themes/img/no-picture.png"/>
                                <?php else: ?>
                                <img class="img-profile img-emp-round" src="<?php echo base_url().$emp->photo ?>"/>
                                <?php endif; ?>
                                <div ><strong><?php echo $emp->name; ?></strong></div>
                                <div class="text-light-blue"><strong><?php echo $emp->position; ?></strong></div>
                                <div class="text-muted"><small><strong><?php echo $emp->account_role; ?></strong></small></div>
                                <div>&nbsp;</div>
                            </div><!-- /.tab-pane -->
                        </div>
                        <div class="col-md-4 padding-bottom-5 font-300">
                            <div class="margin-bottom-10 lead">About Me</div>
                            
                            <div id="about-me-1">
                            <?php
                                $string = strip_tags($emp->about_me);

                                if (strlen($string) > 350) {

                                    // truncate string
                                    $stringCut = substr($string, 0, 350);

                                    // make sure it ends in a word so assassinate doesn't become ass...
                                    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a href="javascript:void(0);" id="link-read-more">Read More</a>'; 
                                }
                                echo $string;
                            ?>
                            </div>

                            <script>
                            $(function() {
                                $("#link-read-more").click(function() {
                                    $("#about-me-1").slideUp();
                                    $("#about-me-2").slideDown();
                                });
                                $("#link-read-less").click(function() {
                                    $("#about-me-2").slideUp();
                                    $("#about-me-1").slideDown();
                                });
                            });
                            </script>

                            <div id="about-me-2" class="display-none">
                                <?php echo $emp->about_me; ?> <a href="javascript:void(0);" id="link-read-less">...Less</a>
                            </div>
                            
                        </div>
                    	<div class="col-md-4 font-300">
                            <div class="margin-bottom-10 lead">Contact Info</div>
                            <div class="text-light-blue margin-bottom-5" style="letter-spacing: 0.5px;">
                                <a href="mailto:<?php echo $emp->work_email; ?>"><i class="fa fa-envelope"></i> &nbsp;&nbsp;<?php echo $emp->work_email; ?></a>
                            </div>

                            <?php if (!empty($emp->work_phone)) : ?>
                            <div class="text-light-blue margin-bottom-5" style="letter-spacing: 0.5px;">
                                <a href="tel:<?php echo $emp->work_phone; ?>"><i class="fa fa-phone"></i> &nbsp;&nbsp;&nbsp;<?php echo $emp->work_phone; ?></a>
                            </div>
                            <?php endif; ?>

                            <?php if (!empty($emp->mobile_phone)) : ?>
                            <div class="text-light-blue margin-bottom-5" style="letter-spacing: 0.5px;">
                                &nbsp;<i class="fa fa-mobile-phone"></i> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $emp->mobile_phone; ?>
                            </div>
                            <?php endif; ?>

                            <?php if (!empty($emp->skype)) : ?>
                            <div class="text-light-blue margin-bottom-5" style="letter-spacing: 0.5px;">
                                <i class="fa fa-skype"></i> &nbsp;&nbsp;&nbsp;<?php echo $emp->skype; ?>
                            </div>
                            <?php endif; ?>

                            <?php if (!empty($emp->websites)) : ?>
                            <div class="text-light-blue margin-bottom-5" style="letter-spacing: 0.5px;"><i class="fa fa-external-link"></i>
                                <?php if (strlen($emp->websites) > 25) : ?>
                                <a href="<?php echo $emp->websites; ?>" title="<?php echo $emp->websites; ?>" target="_blank"></i> &nbsp;&nbsp;<?php echo substr($emp->websites, 0, 25); ?> ...</a>
                                <?php else: ?>
                                <a href="<?php echo $emp->websites; ?>" title="<?php echo $emp->websites; ?>" target="_blank"></i> &nbsp;&nbsp;<?php echo $emp->websites; ?></a>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div><!-- /.box-body -->

                <div class="margin-bottom-5" style="line-height:10px;">&nbsp;</div>
            </div><!-- /. box -->
        </div><!-- /.col -->
        <div class="col-md-2"></div>
    </div> <!-- /.row -->
</section>