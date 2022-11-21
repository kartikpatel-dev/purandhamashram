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
            <div class="col-md-8">
                @include('layouts.messages')

                <div class="card">
                    <div class="card-header">{{ __('Profile') }}</div>

                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}

                            <div class="row mb-3">
                                <label for="first_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text"
                                        class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                        value="{{ Auth::user()->first_name }}" required autocomplete="first_name" autofocus
                                        disabled>

                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="last_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text"
                                        class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                        value="{{ Auth::user()->last_name }}" required autocomplete="last_name" disabled>

                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ Auth::user()->email }}" required autocomplete="email" disabled>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="last_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Mobile Number') }}</label>

                                <div class="col-md-6">
                                    <div class="d-flex align-items-start">
                                        <select id="dial_code" name="dial_code"
                                            class="form-select @error('dial_code') is-invalid @enderror"
                                            style="margin-right: 10px;width: 100px;" disabled>
                                            @forelse($dialCodes as $dialCode)
                                                <option value="{{ $dialCode }}"
                                                    {{ $dialCode == Auth::user()->dial_code ? 'selected' : '' }}>
                                                    {{ '+' . $dialCode }}</option>
                                            @empty
                                                <option value="">Code</option>
                                            @endforelse
                                        </select>

                                        <div>
                                            <input id="mobile_number" type="text"
                                                class="form-control @error('mobile_number') is-invalid @enderror"
                                                name="mobile_number" value="{{ Auth::user()->mobile_number }}" required
                                                autocomplete="mobile_number" disabled>

                                            @error('mobile_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>

                                <div class="col-md-6">
                                    <div class=" @error('gender') is-invalid @enderror">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="gender_male"
                                                value="Male" {{ Auth::user()->gender == 'Male' ? 'checked' : '' }}
                                                disabled>
                                            <label class="form-check-label" for="gender_male">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="Female"
                                                value="Female" {{ Auth::user()->gender == 'Female' ? 'checked' : '' }}
                                                disabled>
                                            <label class="form-check-label" for="Female">Female</label>
                                        </div>
                                    </div>

                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="birth_date"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Birth Date') }}</label>

                                <div class="col-md-6">
                                    <input id="birth_date" type="date"
                                        class="form-control @error('birth_date') is-invalid @enderror" name="birth_date"
                                        value="{{ old('birth_date', Auth::user()->birth_date) }}"
                                        autocomplete="birth_date" disabled>

                                    @error('birth_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address', Auth::user()->address) }}" autocomplete="address"
                                        disabled>

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="city"
                                    class="col-md-4 col-form-label text-md-end">{{ __('City') }}</label>

                                <div class="col-md-6">
                                    <input id="city" type="text"
                                        class="form-control @error('city') is-invalid @enderror" name="city"
                                        value="{{ old('city', Auth::user()->city) }}" autocomplete="city" disabled>

                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="country"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>

                                <div class="col-md-6">
                                    <input id="country" type="text"
                                        class="form-control @error('country') is-invalid @enderror" name="country"
                                        value="{{ old('country', Auth::user()->country) }}" autocomplete="country"
                                        disabled>

                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="occupation"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Occupation') }}</label>

                                <div class="col-md-6">
                                    <input id="occupation" type="text"
                                        class="form-control @error('occupation') is-invalid @enderror" name="occupation"
                                        value="{{ old('occupation', Auth::user()->occupation) }}"
                                        autocomplete="occupation" disabled>

                                    @error('occupation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="guru"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Guru') }}</label>

                                <div class="col-md-6">
                                    <input id="guru" type="text"
                                        class="form-control @error('guru') is-invalid @enderror" name="guru"
                                        value="{{ old('guru', Auth::user()->guru) }}" autocomplete="guru" disabled>

                                    @error('guru')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="reference_person"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Reference Person') }}</label>

                                <div class="col-md-6">
                                    <input id="reference_person" type="text"
                                        class="form-control @error('reference_person') is-invalid @enderror"
                                        name="reference_person"
                                        value="{{ old('reference_person', Auth::user()->reference_person) }}"
                                        autocomplete="reference_person" disabled>

                                    @error('reference_person')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="avatar"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Photo') }}</label>

                                <div class="col-md-6">
                                    @if (!empty(Auth::user()->avatar))
                                        <img src="{{ env('APP_URL') . Storage::url('app/public/' . Auth::user()->avatar) }}"
                                            alt="{{ Auth::user()->first_name }}" class="mw-100" />
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
