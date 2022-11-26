(function ($) {
    'use strict'

    // delete start
    jQuery(document).on('click', '.delete', function (e) {
        e.preventDefault();
        const title = jQuery(this).data('title');
        const id = jQuery(this).data('id');
        const url = jQuery(this).data('url');

        jQuery('#deleteMsg').html('');
        jQuery('#delete_data').show();

        jQuery('#delete_data').data('id', id);
        jQuery('.frmAjaxDelete').attr('action', url);
        jQuery('.data-title').html(title);
        jQuery('#ajaxModelDelete').modal('show');
    });

    jQuery(document).on('click', '#delete_data', function (e) {
        e.preventDefault();

        const id = jQuery(this).data('id');
        const url = jQuery('.frmAjaxDelete').attr('action');
        let _token = $('meta[name="csrf-token"]').attr('content');

        jQuery.ajax({
            url: url,
            type: 'DELETE',
            data: {
                _token: _token,
            },
            cache: false,
            beforeSend: function () {
                // Show image container
                // jQuery("#loader").show();
            },
            success: function (response) {
                if (response.messageType == 'success') {
                    jQuery('#deleteMsg').html('<lable class="text-success">' + response
                        .message + '</label>');
                    jQuery('.delete-' + id).hide();
                    jQuery('#delete_data').hide();
                } else {
                    jQuery('#deleteMsg').html('<lable class="text-danger">' + response
                        .message + '</label>');
                }
            },
            complete: function (data) {
                // Hide image container
                // jQuery("#loader").hide();
            }
        });
    });
    // delete end

    // status change start
    jQuery(document).on('click', '.status', function (e) {

        const status = jQuery(this).is(':checked') == true ? 1 : 0;
        const id = jQuery(this).data('id');
        const url = jQuery(this).data('url');
        let _token = $('meta[name="csrf-token"]').attr('content');

        jQuery.ajax({
            url: url,
            type: 'POST',
            cache: false,
            data: {
                _token: _token,
                id: id,
                status: status
            },
            success: function (response) {
                if (response.messageType == 'success') {
                    jQuery('.status-msg-' + id).html('<lable class="text-success">' + response.message +
                        '</label>');
                } else {
                    jQuery('.status-msg-' + id).html('<lable class="text-danger">' + response.message +
                        '</label>');
                }

                setTimeout(
                    function () {
                        jQuery('.status-msg-' + id).html('');
                    }
                        .bind(this), 1000);
            }
        });
    });

    /* function changeStatus(_this, id) {
        const status = $(_this).prop('checked') == true ? 1 : 0;
        let _token = $('meta[name="csrf-token"]').attr('content');

        jQuery.ajax({
            url: "<?php echo route('admin.users.change.status'); ?>",
            type: 'POST',
            cache: false,
            data: {
                _token: _token,
                id: id,
                status: status
            },
            success: function (response) {
                if (response.messageType == 'success') {
                    jQuery('.status-msg-' + id).html('<lable class="text-success">' + response.message +
                        '</label>');
                } else {
                    jQuery('.status-msg-' + id).html('<lable class="text-danger">' + response.message +
                        '</label>');
                }

                setTimeout(
                    function () {
                        jQuery('.status-msg-' + id).html('');
                    }
                        .bind(this), 1000);
            }
        });
    } */
    // status change end

    // permission change start
    jQuery(document).on('click', '.permission', function (e) {

        const permission = jQuery(this).val();
        const id = jQuery(this).data('id');
        const url = jQuery(this).data('url');
        let _token = $('meta[name="csrf-token"]').attr('content');

        jQuery.ajax({
            url: url,
            type: 'POST',
            cache: false,
            data: {
                _token: _token,
                id: id,
                permission: permission
            },
            success: function (response) {
                if (response.messageType == 'success') {
                    jQuery('.permission-msg-' + id).html('<lable class="text-success">' + response.message +
                        '</label>');
                } else {
                    jQuery('.permission-msg-' + id).html('<lable class="text-danger">' + response.message +
                        '</label>');
                }

                setTimeout(
                    function () {
                        jQuery('.permission-msg-' + id).html('');
                    }
                        .bind(this), 1000);
            }
        });
    });
    // permission change end
})(jQuery)