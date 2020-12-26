@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('form-profile.verifyE-mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('form-profile.link') }}
                        </div>
                    @endif

                    {{ __('form-profile.notify') }}
                    {{ __('form-profile.if') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('form-profile.clickHere') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
