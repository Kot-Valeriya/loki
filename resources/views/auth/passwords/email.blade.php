@extends('auth.partials.form')

@section('content-form')

<span class="contact2-form-title">
        {{ __('form-profile.reset') }}
    </span>

  @if (session('status'))
       <div class="success-msg" role="alert">
       <i class="fa fa-check"></i>
        {{ session('status') }}
    </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

<div class="wrap-input2 validate-input" data-validate="Valid email is required: ex@abc.xyz">
    <input autocomplete="email" class="input2 form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" value="{{ old('email') }}">
        <span class="focus-input2" data-placeholder="  {{ __('form-profile.e-mail') }}"
        required autofocus>
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

    <div class="container-contact2-form-btn">
    <div class="wrap-contact2-form-btn">
        <div class="contact2-form-bgbtn">
        </div>
        <button class="contact2-form-btn" type="submit">
           {{ __('form-profile.sendResetLink') }}
        </button>
    </div>
</div>
</form>
@endsection
