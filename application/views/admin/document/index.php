<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Document
        <small>Company</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url(BACKEND_PATH. '/dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Document</li>
    </ol>
</section>

<section class="content">
	<div class="row">
        <div class="col-md-1"></div>
		<div class="col-md-10">

            <div class="box box-solid">
                 <div class="box-header">
                    <div style="position:relative;top:10px;left:10px;width:98%;">
                        <small>
                            <ol class="breadcrumb pull-left">
                                <?php if (is_null($current_folder)): ?>
                                <li><i class="fa fa-folder"></i> &nbsp;</li>
                                <?php else: ?>
                                <li><a href="<?php echo site_url('admin/document'); ?>"><i class="fa fa-folder"></i> &nbsp;</a></li>
                                <?php endif; ?>

                                <?php if (!is_null($parent_folder)): ?>
                                    <?php if (count($parent_folder) > 0): ?>
                                        <?php if (!is_null($parent_folder[0])): ?>
                                            <?php foreach ($parent_folder as $index => $fol): ?>
                                                <li><a href="<?php echo site_url('admin/document/open_folder/'.$fol['id']); ?>">
                                                    <?php echo $fol['name']; ?></a></li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <?php if (!is_null($current_folder)): ?>
                                <li class="active"><?php echo $current_folder->name; ?></li>
                                <?php endif; ?>
                            </ol>
                        </small>
                        
                        <?php $account_role = $this->session->userdata('logged_account_role'); ?>
                        <?php if ($account_role == 'HR Manager' || $account_role == 'Administrator') : ?>
                        <div class="pull-left">&nbsp;&nbsp;&nbsp;&nbsp;</div>

                        <!-- <a href="" class="btn btn-default btn-sm pull-left"><i class="fa fa-upload"></i> Upload Files...</a> -->
                        <span class="btn btn-default btn-sm fileinput-button pull-left">
                            <i class="fa fa-upload"></i>
                            <span>Upload files...</span>
                            <!-- The file input field used as target for the file upload widget -->
                            <input id="fileupload" type="file" name="userfile" multiple>
                            <input type="hidden" name="employee_id" id="employee_id" value="<?php echo $this->session->userdata('logged_id'); ?>"/>
                            <input type="hidden" name="folder_id" id="folder_id" value="<?php echo is_null($current_folder) ? '0' : $current_folder->id; ?>"/>
                        </span>

                        <div class="pull-left">&nbsp;</div>
                        <a href="" class="btn btn-default btn-sm pull-left" id="btn-new-folder"><i class="fa fa-plus"></i> New Folder</a>
                        <div class="pull-left">&nbsp;</div>
                        <a href="" class="btn btn-danger btn-sm pull-left" id="btn-new-folder-cancel" style="display:none;"><i class="fa fa-times"></i></a>
                        <div class="pull-left">&nbsp;</div>
                        <div class="pull-left" id="new-folder-text" style="display:none;">
                            <div class="input-group input-group-sm" style="width:240px;">
                                <input type="text" class="form-control" id="txFolderName" placeholder="Folder Name">
                                <input type="hidden" class="form-control" id="txFolderParentId" value="<?php echo $parent_id; ?>">
                                <span class="input-group-btn">
                                    <a href="" class="btn btn-default" id="btn-create-folder" type="button"><i class="fa fa-save"></i> Create Folder</a>
                                </span>
                            </div>
                        </div>

                        <!-- The global progress bar -->
                        <div id="progress" class="progress" style="display:none;position:relative;top:5px;">
                            <div class="progress-bar progress-bar-success"></div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div><!-- /. box -->

			<div class="nav-tabs-custom">
                
                <div class="tab-content">

                    
                    <?php if (count($folder) > 0 || count($documents) > 0): ?>                
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover" id="tbl_file">
                            <tr>
                                <th class="th-border-bottom-5" width="80%">Name</th>
                                <th class="th-border-bottom-5 text-right" width="10%">Size</th>
                                <th class="th-border-bottom-5 text-center" width="10%">Type</th>
                            </tr>
                            <?php foreach ($folder as $index => $f): ?>
                            <tr class="trfolder" id="folder_<?php echo $f->id; ?>">
                                <td>
                                    <a href="<?php echo site_url('admin/document/open_folder/'.$f->id); ?>" class="font-300">
                                        <big><big><i class="fa fa-folder"></i></big> 
                                        &nbsp;<?php echo $f->name; ?></big>
                                    </a>
                                    <input type="hidden" id="folder-hidden-<?php echo $f->id; ?>" value="<?php echo $f->name; ?>"/>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php endforeach; ?>

                            <?php foreach ($documents as $index => $doc): ?>
                            <tr class="trfile" id="file_<?php echo $doc->id; ?>">
                                <td>
                                    <a href="<?php echo site_url('admin/document/download/'.$doc->id); ?>" class="font-300">
                                        <big><?php echo $doc->name; ?></big>
                                    </a>
                                    <input type="hidden" id="file-hidden-<?php echo $doc->id; ?>" value="<?php echo $doc->name; ?>"/>
                                </td>
                                <td class="text-right"><small><?php echo $doc->file_size; ?> KB</small></td>
                                <td class="text-center"><small><?php echo $doc->file_ext; ?></small></td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div><!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            <?php //echo $this->pagination->create_links(); ?>
                        </ul>
                    </div>
                    <?php else: ?>
                    <div class="callout callout-info">
                        <h4>No files / folder</h4>
                        <?php if ($account_role == 'HR Manager' || $account_role == 'Administrator') : ?>
                        <p>Add files by press "Upload Files" button</p>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>

			</div>                  
        </div>
        <div class="col-md-1"></div>
    </div>
</section>

<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="<?php echo base_url(); ?>assets/themes/js/plugins/blueimp/js/vendor/jquery.ui.widget.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?php echo base_url(); ?>assets/themes/js/plugins/blueimp/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?php echo base_url(); ?>assets/themes/js/plugins/blueimp/js/jquery.fileupload.js"></script>
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/js/plugins/blueimp/css/jquery.fileupload.css">

<!-- Modal Share Document -->
<div class="modal fade" id="modal_share_doc" tabindex="-1" role="dialog" aria-labelledby="modal_share_doc_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="form-share" action="<?php echo site_url('admin/document/share_hr'); ?>">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="modal_share_doc_label">Share</h4>
                </div>
                <div class="modal-body">
                <div class="form-horizontal">
                    <h4 id="doc-name" class="padding-bottom-10 text-light-blue text-center margin-bottom-10">Document Very Long Name . extension</h4>
                    <input type="hidden" name="folder_id" id="inputFolderId"/>
                    <input type="hidden" name="document_id" id="inputDocumentId"/>
                    <div class="form-group">
                        <label for="inputEmployeeId" class="col-sm-3 control-label">Share to</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="radio" name="radio_share_to" value="everyone" id="share-everyone" checked="true">
                                </span>
                                <label class="form-control">Everyone</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmployeeId" class="col-sm-3 control-label"></label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="radio" name="radio_share_to" value="employee" id="share-employee">
                                </span>
                                <input type="text" class="form-control" id="inputEmployeeId" name="employee_ids[]">
                            </div>
                        </div>
                    </div>
                </div>   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="btn_share_doc_close">Close</button>
                    <input type="submit" class="btn btn-primary" value="Share" name="btn_submit"/>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- Modal File Delete -->
<div class="modal fade" id="modal-file-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
      </div>
      <div class="modal-body" id="modal-body-delete">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <a type="button" class="btn btn-danger" id="btn-file-delete">Delete</a>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){

    <?php if ( $this->session->flashdata('new_folder') !== NULL) : ?>
    setTimeout(function() {
        generateNoty('success', 'Folder "<?php echo $this->session->flashdata('new_folder'); ?>" created.');
    }, 100);
    <?php endif; ?>

    <?php if ( $this->session->flashdata('delete_folder') !== NULL) : ?>
    setTimeout(function() {
        generateNoty('success', 'Folder "<?php echo $this->session->flashdata('delete_folder'); ?>" deleted.');
    }, 100);
    <?php endif; ?>

    <?php if ( $this->session->flashdata('deleted_doc') !== NULL) : ?>
    setTimeout(function() {
        generateNoty('success', 'Document "<?php echo $this->session->flashdata('deleted_doc'); ?>" deleted.');
    }, 100);
    <?php endif; ?>

    <?php if ( $this->session->flashdata('shared_folder') !== NULL) : ?>
    setTimeout(function() {
        generateNoty('success', 'Folder "<?php echo $this->session->flashdata('shared_folder'); ?>" shared.');
    }, 100);
    <?php endif; ?>

    <?php if ( $this->session->flashdata('shared_doc') !== NULL) : ?>
    setTimeout(function() {
        generateNoty('success', 'Document "<?php echo $this->session->flashdata('shared_doc'); ?>" shared.');
    }, 100);
    <?php endif; ?>

    context.init({preventDoubleContext: false});

    context.attach('.trfile, .trfolder', [
        {text: 'Share', id: 'dd-menu-share', href: '#', target: '', icon: 'glyphicon glyphicon-share-alt'},
        {text: 'Download', id: 'dd-menu-download', href: '#', target: '', icon: 'glyphicon glyphicon-cloud-download'},
        //{text: 'Copy To', id: 'dd-menu-copy', href: '#', target: '', icon: 'glyphicon glyphicon-link'},
        //{text: 'Move To', id: 'dd-menu-move', href: '#', target: '', icon: 'glyphicon glyphicon-new-window'},
        {text: 'Delete', id: 'dd-menu-delete', href: '#', target: '', icon: 'glyphicon-trash' },
        {divider: true},
        {text: 'Properties', id: 'dd-menu-delete', href: '#', target: '', icon: 'glyphicon glyphicon-info-sign' }
    ]);

    $("#dd-menu-share").attr("data-toggle", "modal");
    $("#dd-menu-share").attr("data-target", "#modal_share_doc");

    $(".trfolder").bind("contextmenu", function(e) {
        var fol_id = $(this).attr("id").replace("folder_", "");

        $("#inputFolderId").val(fol_id);
        $("#inputDocumentId").val("");
        $("#doc-name").text("Folder: " + $("#folder-hidden-" + fol_id).val());

        $("#btn-file-delete").attr("href", "<?php echo site_url('admin/document/delete_hr_folder'); ?>/" + fol_id);
        $("#modal-body-delete").html("<h4 class=\"text-center\">Delete folder \"" + $("#folder-hidden-" + fol_id).val() + "\" (all folder and files will be deleted)?</h4>");
        return false;
    });

    $(".trfile").bind("contextmenu", function(e) {
        var doc_id = $(this).attr("id").replace("file_", "");

        $("#inputDocumentId").val(doc_id);
        $("#inputFolderId").val("");
        $("#doc-name").text("File: " + $("#file-hidden-" + doc_id).val());

        $("#dd-menu-download").attr("href", "<?php echo site_url('admin/document/download_hr_doc'); ?>/" + doc_id);

        $("#btn-file-delete").attr("href", "<?php echo site_url('admin/document/delete_hr_doc'); ?>/" + doc_id);
        $("#modal-body-delete").html("<h4 class=\"text-center\">Delete file \"" + $("#file-hidden-" + doc_id).val() + "\" ?</h4>");
        return false;
    });

    $("#dd-menu-delete").click(function(e) {
        e.preventDefault();
        $("#modal-file-delete").modal("show");
    });

    'use strict';

    var ms = $('#inputEmployeeId').magicSuggest({
        data: '<?php echo site_url('admin/employee/ajax_search'); ?>',
        valueField: 'id',
        displayField: 'name',
        placeholder: 'Type name or nick name',
        allowFreeEntries: false,
        expanded: true,
        mode: 'remote',
        renderer: function(data){
            return '<div class="country">' +
                    //'<img src="img/flags/' + data.countryCode.toLowerCase() + '.png" />' +
                    '<div class="name">' + data.name + '</div>' +
                    '<div style="clear:both;"></div>' +
                    '<div class="prop">' +
                        '<div class="lbl">Emp Number : </div>' +
                        '<div class="val">' + data.emp_number + '</div>' +
                    '</div>' +
                    '<div class="prop">' +
                        '<div class="lbl">Nick Name : </div>' +
                        '<div class="val">' + data.nick_name + '</div>' +
                    '</div>' +
                    '<div style="clear:both;"></div>' +
                '</div>';
        },
        resultAsString: true,
        selectionRenderer: function(data){
            return '<div class="name">' + data.nick_name + '</div>';
        }
    });

    $(ms).on('beforeload', function(){
        var selected_emp = JSON.parse(JSON.stringify(this.getSelection()));
        var not_in_id = '';
        for (var i = 0; i < selected_emp.length; i++) {
            not_in_id += selected_emp[i].id + ',';
        }

        ms.setDataUrlParams({not_in_id:not_in_id});
    });

    ms.collapse();
});

$(function() {

    var url = '<?php echo site_url('admin/document/upload_hr'); ?>/';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        maxChunkSize: 50000000,
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                //$('<p/>').text(file.name).appendTo('#files');
                console.log(index, file);
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
            if (progress == 100) {
                setTimeout(function() {
                    window.location = document.URL;
                }, 1000);
            }
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');

    $('#fileupload').bind('fileuploadsubmit', function (e, data) {
        data.formData = {
            employee_id: $('#employee_id').val(),
            folder_id: $('#folder_id').val()
        };
        $("#progress").show();
    });

    $("#btn-new-folder").click(function(e) {
        $("#new-folder-text").show();
        $(this).hide();
        $("#btn-new-folder-cancel").show();
        e.preventDefault();
    });

    $("#btn-new-folder-cancel").click(function(e) {
        $("#new-folder-text").hide();
        $(this).hide();
        $("#btn-new-folder").show();
        e.preventDefault();
    });

    $("#btn-create-folder").click(function(e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('admin/document/ajax_create_folder'); ?>",
            data: { 
                name : $("#txFolderName").val(), 
                parent_id: $("#txFolderParentId").val() 
            },
            success: function(callback) {
                window.location = document.URL;
            }
        });
    });
});

</script>