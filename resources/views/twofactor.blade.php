@extends('layouts.auth')

@section('title', __('twofactor.view.header'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card-group">
            <div class="card">
                <div class="card-header text-center h3">
                    {{ __('twofactor.view.header') }}
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('twofactor.verify.store') }}">
                        @csrf

                        <p class="text-muted">
                            {{ __('twofactor.view.info') }}<br>
                            {{ __('twofactor.view.info_if') }} <a href="{{ route('twofactor.verify.resend') }}">{{ __('twofactor.view.link') }}</a>.
                        </p>

                        <div class="form-group">
                            <input name="two_factor_code" type="number" class="form-control{{ $errors->has('two_factor_code') ? ' is-invalid' : '' }}" required autofocus placeholder="{{ __('twofactor.view.code') }}">
                            @if($errors->has('two_factor_code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('two_factor_code') }}
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <a class="btn btn-danger text-light px-4" href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                                    {{ __('twofactor.view.logout') }}
                                </a>
                            </div>

                            <div class="col-6 text-right">
                                <button type="submit" class="btn btn-primary px-4">
                                    {{ __('twofactor.view.verify') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
@endsection

