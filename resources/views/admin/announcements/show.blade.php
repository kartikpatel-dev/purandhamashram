@extends('admin.layouts.app')

@section('Title', 'Single Announcement')

@section('content')

    <div class="row">
        <div class="col-md-12">
            @include('admin.layouts.messages')

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"></h4>
                                    {{ $RS_Row->title }}
                                    <a href="{{ route('admin.announcements.edit', $RS_Row->id) }}"
                                        class="btn btn-sm btn-primary float-right"><i
                                            class="fas fa-edit"></i>&nbsp;&nbsp;Edit Announcement</a>
                                </div>

                                <div class="card-body">
                                    <div class="form-group row align-items-center">
                                        <div class="col-sm-12">
                                            <div><b>Date:</b> {{ $RS_Row->created_at }}</div>
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center">
                                        <div class="col-sm-12">
                                            <div>{!! $RS_Row->description !!}</div>
                                        </div>
                                    </div>
                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    </div>

@endsection
