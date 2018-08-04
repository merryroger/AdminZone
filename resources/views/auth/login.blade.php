@extends('logon')

@section('content')
    <div class="shaper">
        <div class="fbf_title">
            <span class="az_title">{{ __('Signing in') }}</span>
            <span class="az_ctrl"></span>
            <br clear="all"/>
        </div>
        <div class="fbf">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form_item">
                    <label for="name">{{ __('Login') }}</label>

                    <div class="fm_input">
                        <input id="name" type="text" name="name" value="{{ old('name') }}" tabindex="1" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form_item">
                    <label for="password">{{ __('Password') }}</label>

                    <div class="fm_input">
                        <input id="password" type="password" name="password" required tabindex="2">

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="fmctrls">
                    <button type="button" class="cancel" tabindex="3"
                            onclick="document.location.href='{{ route('rootpage') }}'; return false;">{{ __('Cancel') }}
                    </button>
                    <button type="submit" class="do" tabindex="4">{{ __('Login') }}</button>
                </div>
            </form>

        </div>
    </div>
@endsection
