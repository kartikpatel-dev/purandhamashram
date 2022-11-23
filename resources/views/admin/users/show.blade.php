@extends('admin.layouts.app')

@section('Title', 'Profile')

@section('content')

    <div class="row">
        <div class="col-md-12">
            @include('admin.layouts.messages')

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">

                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        @if (!empty($RS_Row->avatar))
                                            <img src="{{ env('APP_URL') . Storage::url('app/public/' . $RS_Row->avatar) }}"
                                                alt="{{ $RS_Row->first_name }}"
                                                class="profile-user-img img-fluid img-circle" />
                                        @endif
                                    </div>

                                    <h3 class="profile-username text-center">{{ $RS_Row->first_name }}
                                        {{ $RS_Row->last_name }}</h3>

                                    <p class="text-muted text-center">{{ $RS_Row->occupation }}</p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Email:</b> <a>{{ $RS_Row->email }}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Mobile:</b> <a>({{ $RS_Row->dial_code ?? 91 }})
                                                {{ $RS_Row->mobile_number }}</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group row align-items-center">
                                        <label for="inputName" class="col-sm-2 form-label">Name</label>
                                        <div class="col-sm-10">
                                            <div class="" id="inputName">Name</div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputName2" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputSkills"
                                                placeholder="Skills">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> I agree to the <a href="#">terms
                                                        and conditions</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
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
