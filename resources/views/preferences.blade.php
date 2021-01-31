@extends('layouts.app')

@section('title', __('twofactor::twofactor.view_preferences.header'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card-group">
            <div class="card">
                <div class="card-header text-center h3">
                    {{ __('twofactor::twofactor.view_preferences.header') }}
                </div>
                <div class="card-body">
                    @if ($user->enabled_two_factor)
                        <form method="POST" action="{{ route('twofactor.preferences.unset') }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger px-4">
                                {{ __('twofactor::twofactor.view_preferences.disable') }}
                            </button>
                        </form>
                    @else
                        <form method="POST" action="{{ route('twofactor.preferences.set') }}">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success px-4">
                                {{ __('twofactor::twofactor.view_preferences.enable') }}
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

