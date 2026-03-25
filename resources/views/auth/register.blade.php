@extends('layouts.app')

@section('content')
<style>
    body { background: #f7f7f7; font-family: 'Segoe UI', sans-serif; }
    .container { max-width: 420px; margin: 6vh auto; padding: 0 1rem; }
    .row { display: flex; flex-wrap: wrap; }
    .justify-content-center { justify-content: center; }
    .col-md-8 { width: 100%; }
    .card { background: #fff; border: 1px solid #e5e5e5; border-radius: 8px; box-shadow: 0 2px 12px rgba(0,0,0,.06); }
    .card-header { padding: 1.2rem 1.5rem; font-size: .85rem; font-weight: 600; letter-spacing: .08em; text-transform: uppercase; color: #888; border-bottom: 1px solid #f0f0f0; background: none; }
    .card-body { padding: 1.5rem; }
    .row.mb-3 { margin-bottom: 1.1rem; flex-direction: column; gap: .3rem; }
    .row.mb-0 { margin-bottom: 0; }
    .col-md-4, .col-md-6, .col-md-8, .offset-md-4 { width: 100%; }
    .col-form-label { font-size: .8rem; font-weight: 600; color: #555; letter-spacing: .03em; }
    .text-md-end { text-align: left; }
    .form-control { width: 100%; padding: .55rem .75rem; border: 1px solid #ddd; border-radius: 5px; font-size: .9rem; box-sizing: border-box; transition: border-color .15s; }
    .form-control:focus { outline: none; border-color: #aaa; }
    .is-invalid { border-color: #e74c3c; }
    .invalid-feedback { font-size: .78rem; color: #e74c3c; margin-top: .2rem; }
    .btn { display: inline-block; padding: .5rem 1.2rem; border-radius: 5px; font-size: .85rem; font-weight: 600; cursor: pointer; border: none; }
    .btn-primary { background: #222; color: #fff; }
    .btn-primary:hover { background: #444; }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
