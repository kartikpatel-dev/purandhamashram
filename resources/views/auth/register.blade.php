@extends('layouts.app')

@section('content')
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Register</h2>
                <ol>
                    <li><a href="{{ route('front.home') }}">Home</a></li>
                    <li>Register</li>
                </ol>
            </div>
        </div>
    </section>

    <div class="container py-5 auth-section">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="first_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text"
                                        class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                        value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

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
                                        value="{{ old('last_name') }}" required autocomplete="last_name">

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
                                        value="{{ old('email') }}" required autocomplete="email">

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
                                            class="form-select select-dial-code @error('dial_code') is-invalid @enderror">
                                            @forelse($dialCodes as $dialCode)
                                                <option value="{{ $dialCode }}">
                                                    {{ '+' . $dialCode }}</option>
                                            @empty
                                                <option value="">Code</option>
                                            @endforelse
                                        </select>

                                        <div class="w-100">
                                            <input id="mobile_number" type="text"
                                                class="form-control @error('mobile_number') is-invalid @enderror"
                                                name="mobile_number" value="{{ old('mobile_number') }}" required
                                                autocomplete="mobile_number">

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
                                                value="Male" {{ old('gender') == 'Male' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="gender_male">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="Female"
                                                value="Female" {{ old('gender') == 'Female' ? 'checked' : '' }}>
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
                                <label for="age"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Birth Date') }}</label>

                                <div class="col-md-6">
                                    <input id="birth_date" type="date"
                                        class="form-control @error('birth_date') is-invalid @enderror" name="birth_date"
                                        value="{{ old('birth_date') }}" autocomplete="birth_date">

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
                                        value="{{ old('address') }}" autocomplete="address">

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
                                        value="{{ old('city') }}" autocomplete="city">

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
                                        value="{{ old('country') }}" autocomplete="country">

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
                                        value="{{ old('occupation') }}" autocomplete="occupation">

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
                                    <select id="guru" name="guru"
                                        class="form-select @error('guru') is-invalid @enderror">
                                        <option value="">{{ __('-- Guru --') }}</option>
                                        @forelse($guruLists as $guru)
                                            <option value="{{ $guru }}"
                                                {{ $guru == old('guru') ? 'selected' : '' }}>
                                                {{ $guru }}</option>
                                        @empty
                                        @endforelse
                                    </select>

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
                                        class="form-control @error('reference_person') is-invalid @enderror" name="reference_person"
                                        value="{{ old('reference_person') }}" autocomplete="reference_person">

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
                                    <input type="file" class="form-control @error('avatar') is-invalid @enderror"
                                        id="avatar" name="avatar" />

                                    @error('avatar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-dark">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    @if (Route::has('login'))
                        <div class="card-footer d-flex justify-content-center">
                            {{ __('Already on ') . config('app.name', 'Laravel') . __('?') }} <a class="card-footer-link"
                                href="{{ route('login') }}">{{ __('Login') }}</a></div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
