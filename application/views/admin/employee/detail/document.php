<!-- Modal Share Document -->
<div class="modal fade" id="modal_share_doc" tabindex="-1" role="dialog" aria-labelledby="modal_share_doc_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="<?php echo site_url('admin/document/share'); ?>">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="modal_share_doc_label">Share</h4>
                </div>
                <div class="modal-body">
                <div class="form-horizontal">
                    <h4 id="doc-name" class="padding-bottom-10 text-light-blue text-center margin-bottom-10">Document Very Long Name . extension</h4>
                    <div class="form-group">
                        <label for="inputEmployeeId" class="col-sm-3 control-label">Share to</label>
                        <input type="hidden" name="document_id" id="inputDocumentId"/>
                        <input type="hidden" name="employee_id" value="<?php echo $emp->id; ?>"/>
                        <input type="hidden" name="emp_number" value="<?php echo $emp->emp_number; ?>"/>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputEmployeeId" name="employee_ids[]">
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

<!-- Modal Delete Document -->
<div class="modal fade" id="modal_delete_document" tabindex="-1" role="dialog" aria-labelledby="modal_delete_document_label" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="modal_delete_document_label">Confirmation</h4>
            </div>
            <div class="modal-body text-center">
                <h4>Delete <span id="document_to_delete"><span> </h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="" id="link_delete_document" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>

<div class="nav-tabs-custom">
    <ul class="nav nav-tabs pull-right">                    
        <li class="pull-left header"><i class="fa fa-file"></i> Personal Document</li>
    </ul>
    <div class="tab-content">
        <?php if ($this->session->flashdata('doc_delete')): ?>
        <div class="alert alert-success alert-dismissable margin-top-20">
            <i class="fa fa-check"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <b>Success!</b> document deleted.
        </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('doc_shared')): ?>
        <div class="alert alert-success alert-dismissable margin-top-20">
            <i class="fa fa-check"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <b>Success!</b> document shared.
        </div>
        <?php endif; ?>
		<!-- The fileinput-button span is used to style the file input field as button -->
	    <span class="btn btn-default btn-sm fileinput-button">
	        <i class="glyphicon glyphicon-plus"></i>
	        <span>Select files...</span>
	        <!-- The file input field used as target for the file upload widget -->
	        <input id="fileupload" type="file" name="userfile" multiple>
            <input type="hidden" name="employee_id" id="employee_id" value="<?php echo $this->session->userdata('logged_id'); ?>"/>
	    </span>
	    <br>
	    <br>
	    <!-- The global progress bar -->
	    <div id="progress" class="progress" style="display:none;">
	        <div class="progress-bar progress-bar-success"></div>
	    </div>

        <?php foreach ($documents as $doc): ?>
        <div class="callout callout-info">
            <h4><?php echo $doc->title; ?></h4>
            <p>
                <a href="" id="doc_share_<?php echo $doc->id; ?>" data-toggle="modal" data-target="#modal_share_doc" class="btn btn-xs btn-default btn-share-doc"><i class="fa fa-share"></i> share</a>&nbsp;
                <a href="<?php echo base_url() . $doc->path; ?>" class="btn btn-xs btn-default"><i class="fa fa-download"></i> download</a>&nbsp;
                <input type="hidden" id="doc_name_<?php echo $doc->id; ?>" value="<?php echo $doc->title; ?>"/>
                <a href="" data-toggle="modal" id="doc_delete_<?php echo $doc->id; ?>" data-target="#modal_delete_document" class="btn btn-xs btn-danger btn-delete-doc"><i class="fa fa-trash-o"></i></a>
            </p>
        </div>
        <?php endforeach; ?>

        <div class="pagination pagination-sm no-margin">
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div><!-- /.tab-content -->
</div><!-- nav-tabs-custom -->

<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="<?php echo base_url(); ?>assets/themes/js/plugins/blueimp/js/vendor/jquery.ui.widget.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?php echo base_url(); ?>assets/themes/js/plugins/blueimp/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?php echo base_url(); ?>assets/themes/js/plugins/blueimp/js/jquery.fileupload.js"></script>
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/js/plugins/blueimp/css/jquery.fileupload.css">

<script>
$(function () {
    'use strict';

    var ms = $('#inputEmployeeId').magicSuggest({
        data: '<?php echo site_url('admin/employee/ajax_search'); ?>',
        valueField: 'id',
        displayField: 'name',
        //groupBy: 'continentName',
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


    $(".btn-share-doc").click(function() {
        var doc_id = $(this).attr("id").replace("doc_share_", "");
        var doc_name = $("#doc_name_" + doc_id).val();
        $("#inputDocumentId").val(doc_id);
        $("#doc-name").text(doc_name);
    });

    $(".btn-delete-doc").click(function() {
        var doc_id = $(this).attr("id").replace("doc_delete_", "");
        var doc_name = $("#doc_name_" + doc_id).val();
        $("#document_to_delete").html("\"" + doc_name + "\" ?");
        $("#link_delete_document").attr("href", "<?php echo site_url('admin/document/delete'); ?>/" + doc_id);
    });

    var url = '<?php echo site_url('admin/document/upload'); ?>/';
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
                    window.location = '<?php site_url('admin/employee/document/'.$emp->emp_number); ?>';
                }, 1000);
            }
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');

    $('#fileupload').bind('fileuploadsubmit', function (e, data) {
        var input = $('#employee_id');
        data.formData = {employee_id: input.val()};
        $("#progress").show();
    });
});
</script>