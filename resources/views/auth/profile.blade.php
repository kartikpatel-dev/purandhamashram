@extends('layouts.app')

@section('content')
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Profile</h2>
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Profile</li>
                </ol>
            </div>
        </div>
    </section>

    <div class="container py-5 auth-section">
        <div class="row justify-content-center">
            <div class="col-12">@include('layouts.messages')</div>

            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            @if (!empty($RS_Row->avatar))
                                <img src="{{ config('app.url') . Storage::url('app/public/' . $RS_Row->avatar) }}"
                                    alt="{{ $RS_Row->first_name }}" class="profile-user-img img-fluid img-circle" />
                            @else
                                <div class="profile_person">
                                    <i class="bi bi-person-circle"></i>
                                </div>
                            @endif
                        </div>

                        <h4 class="profile-username text-center mt-2">{{ $RS_Row->first_name }}
                            {{ $RS_Row->last_name }}</h4>

                        <p class="text-muted text-center">{{ $RS_Row->occupation }}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>{{ $RS_Row->email }}</b>
                            </li>
                            <li class="list-group-item">
                                <b>({{ $RS_Row->dial_code ?? 91 }})
                                    {{ $RS_Row->mobile_number }}</b>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-body auth-card-body">
                        <div class="form-group row align-items-center">
                            <label class="col-sm-2 form-label">Gender</label>
                            <div class="col-sm-10">
                                <div>{{ $RS_Row->gender }}</div>
                            </div>
                        </div>

                        <div class="form-group row align-items-center">
                            <label class="col-sm-2 form-label">Birth Date</label>
                            <div class="col-sm-10">
                                <div>{{ $RS_Row->birth_date }}</div>
                            </div>
                        </div>

                        <div class="form-group row align-items-center">
                            <label class="col-sm-2 form-label">Address</label>
                            <div class="col-sm-10">
                                <div>{{ $RS_Row->address }}</div>
                            </div>
                        </div>

                        <div class="form-group row align-items-center">
                            <label class="col-sm-2 form-label">City</label>
                            <div class="col-sm-10">
                                <div>{{ $RS_Row->city }}</div>
                            </div>
                        </div>

                        <div class="form-group row align-items-center">
                            <label class="col-sm-2 form-label">Country</label>
                            <div class="col-sm-10">
                                <div>{{ $RS_Row->country }}</div>
                            </div>
                        </div>

                        <div class="form-group row align-items-center">
                            <label class="col-sm-2 form-label">Occupation</label>
                            <div class="col-sm-10">
                                <div>{{ $RS_Row->occupation }}</div>
                            </div>
                        </div>

                        <div class="form-group row align-items-center">
                            <label class="col-sm-2 form-label">Guru</label>
                            <div class="col-sm-10">
                                <div>{{ $RS_Row->guru }}</div>
                            </div>
                        </div>

                        <div class="form-group row align-items-center">
                            <label class="col-sm-2 form-label">Reference Person
                            </label>
                            <div class="col-sm-10">
                                <div>{{ $RS_Row->reference_person }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
