@extends('auth.partials.form')
@section('content-form')
<form action="{{ route('register') }}" class="contact2-form validate-form" method="POST">
    @csrf
    <span class="contact2-form-title">
        {{ __('form-profile.register') }}
    </span>

    <div class="wrap-input2 validate-input" data-validate="Name is required">
        <input autocomplete="name" autofocus="" class=" input2 form-control @error('name') is-invalid @enderror" id="name" name="name" required="" type="text" value="{{ old('name') }}">
            <span class="focus-input2" data-placeholder="{{ __('form-profile.name') }}">
            </span>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>
                    {{ $message }}
                </strong>
            </span>
            @enderror
        </input>
    </div>

<div class="wrap-input2 validate-input" data-validate="Valid email is required: ex@abc.xyz">
    <input autocomplete="email" class="input2 form-control @error('email') is-invalid @enderror" id="email" name="email" required="" type="email" value="{{ old('email') }}">
        <span class="focus-input2" data-placeholder="  {{ __('form-profile.e-mail') }}">
        </span>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>
                {{ $message }}
            </strong>
        </span>
        @enderror
    </input>
</div>
<div class="wrap-input2 validate-input">
    <div class="col-md-6">
        <input autocomplete="new-password" class=" input2 form-control @error('password') is-invalid @enderror" id="password" name="password" required="" type="password">
             <span class="focus-input2" data-placeholder="
            {{ __('form-profile.password') }}">
            </span>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>
                    {{ $message }}
                </strong>
            </span>
            @enderror
        </input>
    </div>
</div>
<div class="wrap-input2 validate-input">
    <div class="col-md-6">
        <input autocomplete="new-password" class="input2 form-control" id="password-confirm" name="password_confirmation" required="" type="password">
         <span class="focus-input2" data-placeholder="
           {{ __('form-profile.confirmPassword') }}">
            </span>
        </input>
    </div>
</div>

<div class="container-contact2-form-btn">
    <div class="wrap-contact2-form-btn">
        <div class="contact2-form-bgbtn">
        </div>
        <button class="contact2-form-btn" type="submit">
            {{ __('form-profile.register') }}
        </button>
    </div>
</div>
</form>
@endsection
