@extends('admin.layouts.app')

@section('Title', (!empty($RS_Row) ? 'Edit' : 'Add') . ' Gallery')

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
                        @php $action = route('admin.galleries.update', $RS_Row->id); @endphp
                    @else
                        @php $action = route('admin.galleries.store'); @endphp
                    @endif
                    <form id="createEditFrom" method="POST" action="{{ $action }}" enctype="multipart/form-data">
                        @csrf
                        @if (!empty($RS_Row))
                            {{ method_field('PUT') }}
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="gallery_image">{{ __('Gallery Image') }}</label>
                                    <div class="input-group{{ $errors->has('gallery_image') ? ' is-invalid' : '' }}">
                                        <div class="custom-file">
                                            <input type="file" name="gallery_image[]" multiple id="gallery_image"
                                                value="{{ old('gallery_image') }}" class="custom-file-input"
                                                placeholder="Gallery
                                                Image"
                                                accept="image/*">
                                            <label class="custom-file-label" for="gallery_image1">Choose gallery
                                                image</label>
                                        </div>
                                    </div>

                                    @if ($errors->has('gallery_image'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('gallery_image') }}</strong>
                                        </span>
                                    @endif
                                    <span class="text-danger d-none max-5-img"
                                        role="alert">{{ __('You can select maximum 5 images') }}</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group clearfix">
                                    <label>{{ __('Permission') }}</label>
                                    <div
                                        class="form-group-radio clearfix{{ $errors->has('permission') ? ' is-invalid' : '' }}">
                                        <div class="icheck-success d-inline mr-3">
                                            <input type="radio" id="permission_active" name="permission" value="1"
                                                {{ old('permission', $RS_Row->permission ?? '1') == '1' ? 'checked' : '' }}>
                                            <label for="permission_active">General</label>
                                        </div>
                                        <div class="icheck-danger d-inline">
                                            <input type="radio" id="permission_deactivate" name="permission"
                                                value="0"
                                                {{ old('permission', $RS_Row->permission ?? '') == '0' ? 'checked' : '' }}>
                                            <label for="permission_deactivate">Restrict</label>
                                        </div>
                                    </div>

                                    @if ($errors->has('permission'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('permission') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="post"></div>
                        <button type="submit" id="createEditBtn" class="btn btn-info btn-fill">Submit</button>
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
            $("#gallery_image").on("change", function() {
                $('.max-5-img').addClass('d-none');

                if ($("#gallery_image")[0].files.length > 5) {
                    $('#gallery_image-error').css('display', 'none');
                    $("#gallery_image").val('');
                    $('#gallery_image').next('label').html('Choose gallery image');
                    $('.max-5-img').removeClass('d-none');
                    return false;
                }
            });

            $("#createEditBtn").on("click", function() {
                $('.max-5-img').addClass('d-none');
            });

            $('#createEditFrom').validate({
                rules: {
                    'gallery_image[]': {
                        required: true,
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endsection
