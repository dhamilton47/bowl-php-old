@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="scorer_name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="scorer_name"
                                       type="text"
                                       class="form-control{{ $errors->has('scorer_name') ? ' is-invalid' : '' }}"
                                       name="scorer_name"
                                       value="{{ old('scorer_name') }}"
                                       {{--required--}}
                                       autofocus>

                                @if ($errors->has('scorer_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('scorer_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="scorer_username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="scorer_username"
                                       type="text"
                                       class="form-control{{ $errors->has('scorer_username') ? ' is-invalid' : '' }}"
                                       name="scorer_username"
                                       value="{{ old('scorer_username') }}"
                                       required>

                                @if ($errors->has('scorer_username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('scorer_username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="scorer_email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="scorer_email"
                                       type="email"
                                       class="form-control{{ $errors->has('scorer_email') ? ' is-invalid' : '' }}"
                                       name="scorer_email"
                                       value="{{ old('scorer_email') }}"
                                       required>

                                @if ($errors->has('scorer_email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('scorer_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="scorer_password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="scorer_password"
                                       type="password"
                                       class="form-control{{ $errors->has('scorer_password') ? ' is-invalid' : '' }}"
                                       name="scorer_password"
                                       required>

                                @if ($errors->has('scorer_password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('scorer_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="scorer_password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="scorer_password-confirm"
                                       type="password"
                                       class="form-control"
                                       name="scorer_password_confirmation"
                                       required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
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
