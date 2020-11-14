@extends('layouts.mainlayout')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ url('/css/pages/register.css') }}" />
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Rejestracja') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!--first-name-->

                        <div class="form-group row">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-right">{{ __('Imie i nazwisko') }}</label>

                            <div class="col-md-6">
                                <input style="font-size:18px;" id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!--email-->

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('Adres email') }}</label>

                            <div class="col-md-6">
                                <input style="font-size:18px;" id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!--haslo1-->

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Hasło') }}</label>

                            <div class="col-md-6">
                                <input style="font-size:18px;" id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!--haslo 2-->

                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ __('Potwierdź hasło') }}</label>

                            <div class="col-md-6">
                                <input style="font-size:18px;" id="password-confirm" type="password"
                                    class="form-control" name="password_confirmation" required
                                    autocomplete="new-password">
                            </div>
                        </div>
                        <!-- regulations accept-->
                        <div class="form-group row">
                            <label for="checkbox-regulations"
                                class="col-md-4 col-form-label text-md-right">{{ __('Regulamin') }}</label>

                            <div class="col-md-6">
                                <input style="font-size:18px;" name="regulations" style="width:22px;height:22px;"
                                    class="form-check-input" type="checkbox" value="yes" id="regulations">
                                @error('regulations')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Rejestracja') }}
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