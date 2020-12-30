@extends('auth.partials.form')

@section('content-form')

<form
action="{{ route('users.update',['user'=>$user->id]) }}"
class="contact2-form validate-form"
id="updateProfile"
method="POST">
    @csrf
    @method('PATCH')
</form>

<form
action="{{ route('users.profile_picture.update',['user'=>$user->id]) }}"
enctype="multipart/form-data"
id="updatePicture"
method="POST">
    {{ csrf_field() }}
 @method('PATCH')
</form>

<span class="contact2-form-title">
    {!!__('form-profile.title')!!}
</span>

<div class="circle">
    <img class="profile-pic" src="
    {{$user->profile_picture ? "/uploads/profile_pictures/".Auth::user()->profile_picture : url('/images/user-picture.png')}}">
    </img>
</div>

<input form="updatePicture" hidden="" id="uploadBtn" name="profile_picture" type="file"/>
<label for="uploadBtn">
    <div class="p-image">
        <i class="fa fa-camera upload-button">
        </i>
    </div>
</label>

<input form="updatePicture" hidden="" id="submitBtn" type="submit"/>
<label for="submitBtn" hidden="" id="submitButton">
    <div class="submit">
        <i class="fa fa-check fa-lg upload-button">
        </i>
    </div>
</label>

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
        <button class="contact2-form-btn" form="updateProfile" type="submit">
            {!!__('form-profile.save')!!}
        </button>
    </div>
</div>

@endsection
