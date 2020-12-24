@extends('auth.partials.form')
@section('content-form')

 <form action="{{ route('login') }}" class="contact2-form validate-form" method="POST">
                        @csrf
<span class="contact2-form-title">
    {{ __('Login') }}
</span>

<div class="wrap-input2 validate-input" data-validate="Valid email is required: ex@abc.xyz">
    <input autocomplete="email" autofocus="" class="input2 form-control @error('email') is-invalid @enderror" id="email" name="email" required="" type="email" value="{{ old('email') }}">
        <span class="focus-input2" data-placeholder="  {{ __('E-Mail Address') }}">
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
        <input autocomplete="current-password" class="input2 form-control @error('password') is-invalid @enderror" id="password" name="password" required="" type="password">
            <span class="focus-input2" data-placeholder="
            {{ __('Password') }}">
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

<div class="form-group row">
    <div class="boxes">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">
                {{ ('Remember Me') }}
            </label>
        </input>
    </div>
</div>

<div class="container-contact2-form-btn">
    <div class="wrap-contact2-form-btn">
        <div class="contact2-form-bgbtn">
        </div>
        <button class="contact2-form-btn" type="submit">
            {{ __('Login') }}
        </button>
    </div>
</div>
{{--@if (Route::has('password.request'))
<a class="btn btn-link" href="{{route('password.request') }}">
    {{ __('Forgot Your Password?') }}
</a>
@endif--}}
</form>
@endsection
