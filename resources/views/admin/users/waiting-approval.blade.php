@extends('admin.layouts.app')

@section('Title', 'User Waiting Approval')

@section('content')

    <div class="row">
        <div class="col-md-12">
            @include('layouts.messages')

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6 align-self-center">
                            <h4 class="card-title">@yield('Title')</h4>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div id="data_list" class="table-full-width table-responsive"></div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.users.delete_modal')
@endsection

@section('js')
    <script>
        jQuery(document).ready(function() {

            // first time page load fetch data
            fetch_data(0);

            // pagination start
            jQuery(document).on('click', '.pagination a', function(e) {
                e.preventDefault();
                var page = jQuery(this).attr('href').split('page=')[1];

                fetch_data(page);
            });

            function fetch_data(page) {
                // var searchKeryword = jQuery('#search_keryword').val();
                // var role = jQuery('#role').val();
                // var status = jQuery('input[name="status"]:radio:checked').val();

                // var urlUri = '&searchKeryword='+searchKeryword+'&role='+role+'&status='+status;

                jQuery.ajax({
                    url: "<?php echo route('admin.users.waiting.approval'); ?>?page=" + page,
                    cache: false,
                    beforeSend: function() {
                        // Show image container
                        jQuery("#loader").show();
                    },
                    success: function(response) {
                        jQuery('#data_list').html(response.users);
                        jQuery('html, body').animate({
                            scrollTop: 0
                        }, 'slow');
                    },
                    complete: function(data) {
                        // Hide image container
                        jQuery("#loader").hide();
                    }
                });
            }
            // pagination end

            // single user detail start
            /* jQuery(document).on('click', '.view', function(e) {
                    e.preventDefault();
                    var id = jQuery(this).data('id');
                    var url = jQuery(this).data('url');
            
                    viewUserByID(id, url);
                    
                    jQuery('#ajaxModelView').modal('show');
                });
            
                // delete user start
                /* jQuery(document).on('click', '.delete', function(e) {
                    e.preventDefault();
                    var id = jQuery(this).data('id');
                    var url = jQuery(this).data('url');
            
                    jQuery('#deleteMsg').html('');
                    jQuery('#delete_data').show();
            
                    jQuery('#delete_data').data('id', id);
                    jQuery('#delete_data').data('url', url);
                    jQuery('#ajaxModelDelete').modal('show');
                });
            
                jQuery(document).on('click', '#delete_data', function(e) {
                    // e.preventDefault();
                    var id = jQuery(this).data('id');
                    var url = jQuery(this).data('url');
                    let _token = $('meta[name="csrf-token"]').attr('content');
            
                    jQuery.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            _token: _token,
                        },
                        cache: false,
                        beforeSend: function()
                        {
                            // Show image container
                            // jQuery("#loader").show();
                        },
                        success: function(response)
                        {
                            if( response.messageType == 'success' )
                            {
                                jQuery('#deleteMsg').html('<lable class="text-success">'+response.message+'</label>');
                                jQuery('.delete-'+id).hide();
                                jQuery('#delete_data').hide();
                            }
                            else
                            {
                                jQuery('#deleteMsg').html('<lable class="text-danger">'+response.message+'</label>');
                            }
                        },
                        complete:function(data)
                        {
                            // Hide image container
                            // jQuery("#loader").hide();
                        }
                    });
                }); */
            // delete user end

            // search start
            /* jQuery(document).on('keyup', '#search_keryword', function(e) {
                    e.preventDefault();
            
                    search_data();
                });
            
                jQuery("#role").change(function() {
                    search_data();
                });
            
                jQuery("input[name='status']:radio").change(function() {
                    search_data();
                }); */

            /* function search_data()
                {
                    var searchKeryword = jQuery('#search_keryword').val();
                    var role = jQuery('#role').val();
                    var status = jQuery('input[name="status"]:radio:checked').val();
                    // if( status==undefined) { status = ''; }
            
                    var urlUri = 'searchKeryword='+searchKeryword+'&role='+role+'&status='+status;
                    jQuery.ajax({
                        url: "<?php //echo route('admin.users.index');
                        ?>?"+urlUri,
                        cache: false,
                        beforeSend: function(){
                            // Show image container
                            jQuery("#loader").show();
                        },
                        success: function(response){
                            jQuery('#data_list').html(response.users);
                            // jQuery('html, body').animate({ scrollTop: 0 }, 'slow');
                        },
                        complete:function(data){
                            // Hide image container
                            jQuery("#loader").hide();
                        }
                    });
                } */
            // search end
        });

        // status change start
        function changeStatus(_this, id) {
            var status = $(_this).prop('checked') == true ? 1 : 0;
            let _token = $('meta[name="csrf-token"]').attr('content');

            jQuery.ajax({
                url: "<?php echo route('admin.users.change.status'); ?>",
                type: 'post',
                cache: false,
                data: {
                    _token: _token,
                    id: id,
                    status: status
                },
                success: function(response) {
                    if (response.messageType == 'success') {
                        jQuery('.status-msg-' + id).html('<lable class="text-success">' + response.message +
                            '</label>');
                    } else {
                        jQuery('.status-msg-' + id).html('<lable class="text-danger">' + response.message +
                            '</label>');
                    }

                    setTimeout(
                        function() {
                            jQuery('.status-msg-' + id).html('');
                        }
                        .bind(this), 1000);
                }
            });
        }
        // status change end
    </script>
@endsection
