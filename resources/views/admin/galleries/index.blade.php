@extends('admin.layouts.app')

@section('Title', 'Gallery List')

@section('content')

    <div class="row">
        <div class="col-md-12">
            @include('admin.layouts.messages')

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6 align-self-center">
                            <h4 class="card-title">@yield('Title')</h4>
                        </div>
                        @if (\App\Models\Gallery::count() < 200)
                            <div class="col-md-6">
                                <a href="{{ route('admin.galleries.create') }}" class="btn btn-sm btn-info float-right">Add
                                    Gallery</a>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card-body">
                    <input type="hidden" name="sort_field" id="sort_field" class="form-control" placeholder="Sort field">
                    <input type="hidden" name="sort_value" id="sort_value" class="form-control" placeholder="Sort value">

                    <div id="data_list" class="table-full-width table-responsive"></div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.layouts.delete_modal')
@endsection

@section('js')
    <script src="{{ asset('admin/js/crud.js') }}"></script>

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
                const sort_field = jQuery('#sort_field').val();
                const sort_value = jQuery('#sort_value').val();

                const urlUri = '&sort_field=' + sort_field + '&sort_value=' + sort_value;

                jQuery.ajax({
                    url: "<?php echo route('admin.galleries.index'); ?>?page=" + page + urlUri,
                    cache: false,
                    beforeSend: function() {
                        // Show image container
                        jQuery("#loader").show();
                    },
                    success: function(response) {
                        jQuery('#data_list').html(response.RS_Results);
                        jQuery('html, body').animate({
                            scrollTop: 0
                        }, 'slow');

                        jQuery('#sort-' + sort_field).data('sort-value', sort_value == "ASC" ? 'DESC' :
                            "ASC");
                    },
                    complete: function(data) {
                        // Hide image container
                        jQuery("#loader").hide();
                    }
                });
            }
            // pagination end

            // sort start
            jQuery(document).on('click', '.custom-sorting', function(e) {
                e.preventDefault();

                const sort_field = jQuery(this).data('sort-field');
                const sort_value = jQuery(this).data('sort-value');

                jQuery('#sort_field').val(sort_field);
                jQuery('#sort_value').val(sort_value);

                fetch_data(0);
            });
            // sort end
        });
    </script>
@endsection
