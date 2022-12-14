@extends('layouts.app')

@section('content')
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Ashram Visitor</h2>
                <ol>
                    <li><a href="{{ route('front.home') }}">Home</a></li>
                    <li>Ashram Visitor</li>
                </ol>
            </div>
        </div>
    </section>

    <div class="container py-5 auth-section">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Ashram Visitor') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('Ashram.Visitor') }}" enctype="multipart/form-data">
                            @csrf
                            @if (!empty(Auth::user()->visitor_status))
                                {{ method_field('PUT') }}
                                <input type="hidden" name="ashram_visitor_id" value="{{ $RS_Result->visitorCheckIn->id }}">
                            @endif

                            @include('layouts.messages')

                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="mb-3">Check In</h4>
                                </div>

                                <div class="col-md-5 mb-3">
                                    <label for="check_in_date" class="form-label">{{ __('Date') }}</label>

                                    <input id="check_in_date" type="text"
                                        class="form-control check_in_out_date @error('check_in_date') is-invalid @enderror"
                                        name="check_in_date"
                                        value="{{ old('check_in_date', !empty($RS_Result->visitorCheckIn->checkin_date) ? $RS_Result->visitorCheckIn->checkin_date : date('d-m-Y')) }}"
                                        autocomplete="check_in_date"
                                        {{ !empty(Auth::user()->visitor_status) ? 'disabled' : '' }}>

                                    @error('check_in_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="check_in_time" class="form-label">{{ __('Time') }}</label>

                                    <input id="check_in_time" type="text"
                                        class="form-control check_in_out_time @error('check_in_time') is-invalid @enderror"
                                        name="check_in_time"
                                        value="{{ old('check_in_time', !empty($RS_Result->visitorCheckIn->checkin_time) ? $RS_Result->visitorCheckIn->checkin_time : '') }}"
                                        autocomplete="check_in_time"
                                        {{ !empty(Auth::user()->visitor_status) ? 'disabled' : '' }}>

                                    @error('check_in_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="number_of_person"
                                        class="form-label text-md-end">{{ __('Number of Person') }}</label>

                                    <input id="number_of_person" type="text"
                                        class="form-control @error('number_of_person') is-invalid @enderror"
                                        name="number_of_person"
                                        value="{{ old('number_of_person', !empty($RS_Result->visitorCheckIn->number_of_person) ? $RS_Result->visitorCheckIn->number_of_person : '') }}"
                                        {{ !empty(Auth::user()->visitor_status) ? 'disabled' : '' }}
                                        onkeypress="return isNumber(event)">

                                    @error('number_of_person')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="mb-3">Check Out</h4>
                                </div>

                                <div class="col-md-5 mb-3">
                                    <label for="check_out_date" class="form-label">{{ __('Date') }}</label>

                                    <input id="check_out_date" type="text"
                                        class="form-control check_in_out_date @error('check_out_date') is-invalid @enderror"
                                        name="check_out_date"
                                        value="{{ old('check_out_date', !empty($RS_Result->visitorCheckIn->checkout_date) ? $RS_Result->visitorCheckIn->checkout_date : date('d-m-Y')) }}"
                                        autocomplete="check_out_date">

                                    @error('check_out_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="check_out_time" class="form-label">{{ __('Time') }}</label>

                                    <input id="check_out_time" type="text"
                                        class="form-control check_in_out_time @error('check_out_time') is-invalid @enderror"
                                        name="check_out_time"
                                        value="{{ old('check_out_time', !empty($RS_Result->visitorCheckIn->checkout_time) ? $RS_Result->visitorCheckIn->checkout_time : '') }}"
                                        autocomplete="check_out_time">

                                    @error('check_out_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-dark">
                                        {{ !empty(Auth::user()->visitor_status) ? __('Check Out') : __('Check In') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        jQuery(document).ready(function() {
            jQuery('#check_in_date').datepicker({
                dateFormat: "dd-mm-yy",
                showOtherMonths: true,
                selectOtherMonths: true,
                changeMonth: true,
                changeYear: true,
                yearRange: '-200:+50',
                // maxDate: "today"
            });

            jQuery('#check_out_date').datepicker({
                dateFormat: "dd-mm-yy",
                showOtherMonths: true,
                selectOtherMonths: true,
                changeMonth: true,
                changeYear: true,
                yearRange: '-200:+50',
                // minDate: "today"
            });

            jQuery('.check_in_out_time').timepicker({
                minuteStep: 1,
                // secondStep: 5,
                // showInputs: false,
                // template: 'modal',
                // modalBackdrop: true,
                // showSeconds: true,
                // showMeridian: false
            });
        });
    </script>
@endsection
