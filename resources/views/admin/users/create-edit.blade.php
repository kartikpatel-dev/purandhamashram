@extends('layouts.app')

@section('Title', (!empty($post) ? 'Edit' : 'Add').' Blog')

@section('content')

	<div class="row">
        <div class="col-md-12">
            @include('layouts.messages')
            
            <div class="card card-info">
                <div class="card-header">
                    <h4 class="card-title">@yield('Title')</h4>
                </div>

                <div class="card-body">
                    @if( !empty($post) )
                        @php $action = route('posts.update', $post->id); @endphp
                    @else
                        @php $action = route('posts.store'); @endphp
                    @endif
                    <form method="POST" action="{{ $action }}" enctype="multipart/form-data">
                        @csrf
                        @if( !empty($post) ) {{ method_field('PUT') }} @endif
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="post_title">{{ __('Post Title') }}</label>
                                    <input type="text" name="post_title" id="post_title" value="{{ old('post_title', $post->post_title ?? '') }}" class="form-control{{ $errors->has('post_title') ? ' is-invalid' : '' }}" placeholder="{{ __('Post Title') }}" autofocus>

                                    @if ($errors->has('post_title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('post_title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="post_slug">{{ __('Post Slug') }}</label>
                                    <input type="text" name="post_slug" id="post_slug" value="{{ old('post_slug', $post->post_slug ?? '') }}" class="form-control{{ $errors->has('post_slug') ? ' is-invalid' : '' }}" placeholder="{{ __('Post Slug') }}" autofocus>

                                    @if ($errors->has('post_slug'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('post_slug') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="categories_id">{{ __('Category') }}</label>
                                    <div class="select2-info">
                                        <select name="categories_id[]" id="categories_id" class="select2 form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" data-placeholder="{{ __('-- Select Category --') }}" data-dropdown-css-class="select2-info">
                                            <option value="0">{{ __('-- Select Category --') }}</option>
                                            @forelse( $categories as $Key=>$Val )
                                                <option value="{{ $Key }}" @if( !empty($post_categories_id) && in_array($Key, $post_categories_id) ) selected @endif>{{ $Val }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>

                                    @if ($errors->has('categories_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('categories_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div id="subcategories_list">
                                    <div class="form-group">
                                        <label for="subcategories_id">{{ __('SubCategory') }}</label>
                                        <div class="select2-purple">
                                            <select name="subcategories_id[]" id="subcategories_id" multiple="multiple" class="select2 form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" data-placeholder="{{ __('-- Select Category --') }}" data-dropdown-css-class="select2-purple">
                                            </select>
                                        </div>

                                        @if ($errors->has('subcategories_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('subcategories_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="post_short_description">{{ __('Short Description') }}</label>
                                    <textarea name="post_short_description" id="post_short_description" class="form-control{{ $errors->has('post_short_description') ? ' is-invalid' : '' }}" placeholder="{{ __('Short Description') }}">{{ old('post_short_description', $post->post_short_description ?? '') }}</textarea>

                                    @if ($errors->has('post_short_description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('post_short_description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group mb-0">
                                    <label for="list_item">{{ __('List Items') }}</label>
                                </div>
                                @if( !empty($post) && $post->listItems->count() > 0 )
                                    @foreach( $post->listItems as $item )
                                        <div class="form-group post-list-item">
                                            <input type="text" name="list_item[]" class="form-control" value="{{ $item->list_item }}" placeholder="{{ __('Item') }}">
                                            <button id="removeItem" type="button" class="btn btn-danger">X</button>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="form-group post-list-item">
                                        <input type="text" name="list_item[]" class="form-control" placeholder="{{ __('Item') }}">
                                    </div>
                                @endif

                                <div id="addNewItem"></div>

                                <div class="form-group mb-4">
                                    <button id="addItem" type="button" class="btn btn-info btn-sm">Add Item</button>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="post_description">{{ __('Description') }}</label>
                                    <textarea name="post_description" id="post_description" class="form-control{{ $errors->has('post_description') ? ' is-invalid' : '' }}" placeholder="{{ __('Description') }}" rows="10">{{ old('post_description', $post->post_description ?? '') }}</textarea>

                                    @if ($errors->has('post_description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('post_description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="meta_title">{{ __('Meta Title (Page Title)') }}</label>
                                    <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $post->meta_title ?? '') }}" class="form-control{{ $errors->has('meta_title') ? ' is-invalid' : '' }}" placeholder="{{ __('Meta Title (Page Title)') }}">

                                    @if ($errors->has('meta_title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('meta_title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="meta_keywords">{{ __('Meta Keywords') }}</label>
                                    <input type="text" name="meta_keywords" id="meta_keywords" value="{{ old('meta_keywords', $post->meta_keywords ?? '') }}" class="form-control{{ $errors->has('meta_keywords') ? ' is-invalid' : '' }}" placeholder="{{ __('Meta Keywords') }}">

                                    @if ($errors->has('meta_keywords'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('meta_keywords') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="meta_description">{{ __('Meta Description') }}</label>
                                    <textarea name="meta_description" id="meta_description" class="form-control{{ $errors->has('meta_description') ? ' is-invalid' : '' }}" placeholder="{{ __('Meta Description') }}">{{ old('meta_description', $post->meta_description ?? '') }}</textarea>

                                    @if ($errors->has('meta_description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('meta_description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Publish Date and time:</label>
                                    <div class="input-group date" id="created_at_target" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#created_at_target" name="created_at" id="created_at" />
                                        <div class="input-group-append" data-target="#created_at_target" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="post_image">{{ __('Post Image') }}</label>
                                    <div class="input-group{{ $errors->has('post_image') ? ' is-invalid' : '' }}">
                                        <div class="custom-file">
                                            <input type="file" name="post_image" id="post_image" value="{{ old('post_image') }}" class="custom-file-input" placeholder="Post Name" accept="image/*">
                                            <label class="custom-file-label" for="post_image">Choose post image</label>
                                        </div>
                                    </div>

                                    @if ($errors->has('post_image'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('post_image') }}</strong>
                                        </span>
                                    @endif

                                    @if( !empty($post->post_image) )
                                        <img src="{{ url('uploads/'.$post->post_image) }}" alt="{{ $post->post_title }}" class="max-height-150 mt-3">
                                    @endif
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info btn-fill">Submit</button>
                        <a href="{{ route('posts.index') }}" class="btn btn-default float-right">Back</a>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- Page specific script -->
<script>
$(function () {
    // Summernote
    $('#post_description').summernote();

    //Initialize Select2 Elements
    $('.select2').select2();

    //Date and time picker
    var defDateVal = '<?php echo $post->created_at ?? ''; ?>';
    var defaultDateVal = new Date();
    if( defDateVal!='' )
    {
        defaultDateVal = defDateVal;
    }
    $('#created_at_target').datetimepicker({
        icons: { time: 'far fa-clock' },
        format: 'yyyy-MM-DD HH:mm',
        defaultDate: defaultDateVal,
    });
    // $('#created_at').attr('readonly', 'readonly');

    <?php
    if( empty($post) )
    {
    ?>
        $("#post_title").on('blur', function (e) {
            e.preventDefault();

            var post_title = $(this).val();
            // let _token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url:"<?php echo route('posts.slug'); ?>",
                cache: false,
                data: {
                    // _token: _token,
                    post_title: post_title,
                },
                beforeSend: function(){
                    // Show image container
                    // jQuery("#loader").show();
                },
                success: function(response){
                    // console.log(response);
                    $('#post_slug').val(response);
                },
                complete:function(data){
                    // Hide image container
                    // jQuery("#loader").hide();
                }
            });
        });
    <?php
    }
    ?>

    // subcategories start
    $(document).on('change', "#categories_id", function (e) {
        e.preventDefault();

        var category_id = $(this).val();
        // console.log(category_id);

        subcategories_data(category_id);
    });

    subcategories_data('@php echo !empty($post_categories_id[0]) ? $post_categories_id[0] : 0; @endphp', "@php echo $post_subcategories_id @endphp");

    function subcategories_data(category_id, post_subcategories_id='')
    {
        // console.log(post_subcategories_id); return false;
        $.ajax({
            url:"<?php echo route('categories.subcategories'); ?>",
            cache: false,
            data: {
                category_id: category_id,
                post_subcategories_id: post_subcategories_id,
            },
            beforeSend: function() {
                // Show image container
                // jQuery("#loader").show();
            },
            success: function(response) {
                jQuery('#subcategories_list').html(response.subcategories);
            },
            complete:function(data) {
                // Hide image container
                // jQuery("#loader").hide();
            }
        });
    }
    // subcategories end

    // add item start
    $("#addItem").click(function () {
        var html = '';

        html += '<div class="form-group post-list-item">';
            html += '<input type="text" name="list_item[]" class="form-control" placeholder="Item">';
            html += '<button id="removeItem" type="button" class="btn btn-danger">X</button>';
        html += '</div>';

        $('#addNewItem').append(html);
    });
    // add item end

    // remove item start
    $(document).on('click', '#removeItem', function () {
        $(this).closest('.form-group').remove();
    });
    // remove item end
})
</script>
@endsection