@extends('logon')

@section('content')
    @if( $emails->count())
        <div class="epad">
            <table class="emails">
                <caption>E-mails have been sent</caption>
                <tr>
                    <th>#</th>
                    <th class="la">E-mail</th>
                    <th class="la">Sent at</th>
                </tr>
                @foreach($emails as $eml)
                    <tr>
                        <td class="ca">{{ $eml->id }}</td>
                        <td>{{ $eml->email }}</td>
                        <td>{{ $eml->created_at->format('d.m.Y H:i:s') }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    @else
        <div class="message">No e-mails were sent.</div>
    @endif
@endsection
