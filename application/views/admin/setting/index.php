<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Setting
        <small>Administrator</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(BACKEND_PATH. '/dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Setting</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Find Used Tabs -->
            <?php $tab = $this->session->flashdata('tab'); ?>
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="<?php if ($tab == 'country'): ?>active<?php endif; ?>"><a href="#tab_countries" data-toggle="tab">Countries</a></li>
                    <li class="<?php if ($tab == 'setting' || is_null($tab)): ?>active<?php endif; ?>"><a href="#tab_setting" data-toggle="tab">Setting</a></li>
                    <li class="<?php if ($tab == 'databackup'): ?>active<?php endif; ?>"><a href="#tab_databackup" data-toggle="tab">Data Backup</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane <?php if ($tab == 'country'): ?>active<?php endif; ?>" id="tab_countries">
                    	<?php $this->load->view('admin/setting/tabs/countries'); ?>
                    </div>
                    <div class="tab-pane <?php if ($tab == 'setting' || is_null($tab)): ?>active<?php endif; ?>" id="tab_setting">
                        <?php $this->load->view('admin/setting/tabs/setting'); ?>
                    </div>
                    <div class="tab-pane <?php if ($tab == 'databackup'): ?>active<?php endif; ?>" id="tab_databackup">
                        <?php $this->load->view('admin/setting/tabs/databackup'); ?>
                    </div>
                </div><!-- /.tab-content -->
            </div><!-- nav-tabs-custom -->
        </div><!-- /.col -->

    </div> <!-- /.row -->
</section>