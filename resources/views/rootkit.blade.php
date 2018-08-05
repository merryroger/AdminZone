@extends('root')

@section('content')
    <div class="fb_form_pad off">
        <div class="fbf_title">
            <span class="az_title">{{ __('Admin Zone feedback') }}</span>
            <span class="az_ctrl" title="{{ __('Close feedback form') }}" onclick="closeFBForm()">&times;</span>
            <br clear="all"/>
        </div>
        <div class="fbf">
            <form action="{{ route('feedback.send') }}" method="post">
                @csrf
                <div class="form_item">
                    <label for="email" class="">{{ __('E-mail') }}</label>
                    <div class="fm_input">
                        <input id="email" type="email" name="email" value="{{ old('email') }}"
                               placeholder="{{ __('you@your.server') }}" tabindex="1" required/>
                    </div>
                </div>
                <div class="fmctrls">
                    <button type="submit" class="do" tabindex="2">{{ __('Send') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('response')
    <div id="app">
        <div class="container">
            <div class="shaper">
                <div class="fbf_title">
                    <span class="az_title">{{ __('E-mail was sent') }}</span>
                    <span class="az_ctrl"></span>
                    <br clear="all"/>
                </div>
                <div class="fbf">
                    <form>
                        <div class="form_item">
                            <p>{{ session()->get('msgsent') }}</p>
                        </div>
                        <div class="fmctrls">
                            <button type="button" class="do" tabindex="1"
                                    onclick="closeResponseForm()">{{ __('Ok') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
