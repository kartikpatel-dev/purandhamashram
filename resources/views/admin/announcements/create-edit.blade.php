@extends('admin.layouts.app')

@section('Title', (!empty($RS_Row) ? 'Edit' : 'Add') . ' Announcement')

@section('content')

    <div class="row">
        <div class="col-md-12">
            @include('admin.layouts.messages')

            <div class="card card-info">
                <div class="card-header">
                    <h4 class="card-title">@yield('Title')</h4>
                </div>

                <div class="card-body">
                    @if (!empty($RS_Row))
                        @php $action = route('admin.announcements.update', $RS_Row->id); @endphp
                    @else
                        @php $action = route('admin.announcements.store'); @endphp
                    @endif
                    <form method="POST" action="{{ $action }}" enctype="multipart/form-data">
                        @csrf
                        @if (!empty($RS_Row))
                            {{ method_field('PUT') }}
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">{{ __('Title') }}</label>
                                    <input type="text" name="title" id="title"
                                        value="{{ old('title', $RS_Row->title ?? '') }}"
                                        class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Title') }}" autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">{{ __('Description') }}</label>
                                    <textarea name="description" id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Description') }}" rows="10">{{ old('description', $RS_Row->description ?? '') }}</textarea>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Date and Time:</label>
                                    <div class="input-group date" id="created_at_target" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input"
                                            data-target="#created_at_target" name="created_at" id="created_at" />
                                        <div class="input-group-append" data-target="#created_at_target"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="post"></div>
                        <button type="submit" class="btn btn-info btn-fill">Submit</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        $(function() {
            // Summernote
            $('#description').summernote();

            //Date and time picker
            var defDateVal = '<?php echo $RS_Row->created_at ?? ''; ?>';
            var defaultDateVal = new Date();
            if (defDateVal != '') {
                defaultDateVal = defDateVal;
            }
            $('#created_at_target').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                },
                format: 'DD-MM-YYYY',
                defaultDate: defaultDateVal,
            });
            // $('#created_at').attr('readonly', 'readonly');
        });
    </script>
@endsection
