<div class="fbf_title">
    <span class="az_title">{{ __('Admin Zone feedback') }}</span>
    <span class="az_ctrl" title="{{ __('Close feedback form') }}" onclick="closeFBForm()">&times;</span>
    <br clear="all" />
</div>
<div class="fbf">
    <form onsubmit="return checkForm(this, '{{ route('feedback.send') }}')">
        @csrf
        <div class="form_item">
            <label for="email" class="">{{ __('E-mail') }}</label>
            <div class="fm_input">
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                       placeholder="{{ __('you@your.server') }}" tabindex="1" required autofocus/>
            </div>
        </div>
        <div class="fmctrls">
            <button type="submit" class="do" tabindex="2">{{ __('Send') }}</button>
        </div>
    </form>
</div>