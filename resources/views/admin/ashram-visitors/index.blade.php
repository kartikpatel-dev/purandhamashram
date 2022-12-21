@extends('admin.layouts.app')

@section('Title', 'Visitor History')

@php
    $qryString = explode('?', Request::fullUrl());
    $qryString = !empty($qryString[1]) ? '?' . $qryString[1] : null;
@endphp

@section('content')

    <div class="row">
        <div class="col-md-12">
            @include('admin.layouts.messages')

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6 align-self-center">
                            <h4 class="card-title">Search By</h4>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form method="GET" action="">

                        <div class="row align-items-end">
                            <div class="col-md-4 form-group">
                                <label for="search_keryword">{{ __('Search by') }}</label>
                                <input type="text" name="search_keryword" id="search_keryword"
                                    value="{{ old('search_keryword', request()->get('search_keryword')) }}"
                                    class="form-control{{ $errors->has('search_keryword') ? ' is-invalid' : '' }}"
                                    placeholder="Search..." autocomplete="off">
                            </div>

                            <div class="col-md-2 form-group">
                                <label for="check_in_date">{{ __('Check In Date') }}</label>
                                <div class="input-group check_in_date" id="check_in_date_target"
                                    data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                        data-target="#check_in_date_target" name="check_in_date" id="check_in_date"
                                        value="{{ old('check_in_date', request()->get('check_in_date')) }}"
                                        placeholder="DD-MM-YYYY" />
                                    <div class="input-group-append" data-target="#check_in_date_target"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2 form-group">
                                <label for="check_out_date">{{ __('Check Out Date') }}</label>
                                <div class="input-group check_out_date" id="check_out_date_target"
                                    data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                        data-target="#check_out_date_target" name="check_out_date" id="check_out_date"
                                        value="{{ old('check_out_date', request()->get('check_out_date')) }}"
                                        placeholder="DD-MM-YYYY" />
                                    <div class="input-group-append" data-target="#check_out_date_target"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 form-group">
                                <button type="submit" class="btn btn-success btn-fill">Search</button>

                                <a href="{{ route('admin.visitors.index') }}" class="btn btn-info">Reset Search</a>

                                <a href="{{ route('admin.visitors.pdf') . $qryString }}" target="_blank" class="btn btn-dark">{{ __('Print') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6 align-self-center">
                            <h4 class="card-title">@yield('Title')</h4>
                        </div>
                        <div class="col-md-6 align-self-center">
                            <h4 class="card-title float-right text-info">
                                {{ __('Expected Next 24 hours ' . $RS_Visitor_Count . ' visitor') }}</h4>
                        </div>
                    </div>
                </div>

                <div class="card-body">
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
                const page = jQuery(this).attr('href').split('page=')[1];

                fetch_data(page);
            });

            function fetch_data(page) {
                const search_keryword = jQuery('#search_keryword').val();
                const check_in_date = jQuery('#check_in_date').val();
                const check_out_date = jQuery('#check_out_date').val();

                const urlUri = '&search_keryword=' + search_keryword + '&check_in_date=' + check_in_date +
                    '&check_out_date=' + check_out_date;

                jQuery.ajax({
                    url: "<?php echo route('admin.visitors.index'); ?>?page=" + page + urlUri,
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
                    },
                    complete: function(data) {
                        // Hide image container
                        jQuery("#loader").hide();
                    }
                });
            }
            // pagination end

            $('#check_in_date_target').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                },
                format: 'DD-MM-YYYY',
            });

            $('#check_out_date_target').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                },
                format: 'DD-MM-YYYY',
            });
        });
    </script>
@endsection
