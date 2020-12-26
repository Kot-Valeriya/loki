@extends('auth.partials.form')
@section('content-form')
<form action="{{ route('users.update',['user'=>$user->id]) }}" class="contact2-form validate-form" method="POST">
    @csrf
    @method('PATCH')
    <span class="contact2-form-title">
         {!!__('form-profile.title')!!}
    </span>

    <div class="wrap-input2 validate-input" data-validate="Name is required">
         <br/>
        <input autocomplete="name" autofocus="" class=" input2 form-control @error('name') is-invalid @enderror" id="name" name="name" required="" type="text" value="{{ $user->name ?? old('name') }}">
            <span class="focus-input2" data-placeholder=" {!!__('form-profile.name')!!}">
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
    <br/>
    <input autocomplete="email" class="input2 form-control @error('email') is-invalid @enderror" id="email" name="email" required="" type="email" value="{{ $user->email ?? old('email') }}">
        <span class="focus-input2" data-placeholder="{!!__('form-profile.e-mail')!!}">
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
            {!!__('form-profile.save')!!}
        </button>
    </div>
</div>
</form>
@endsection
