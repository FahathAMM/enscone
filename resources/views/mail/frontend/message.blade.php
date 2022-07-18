@component('mail::message')

    @if ($type == 1)
        <h2>{{ $message }}</h2>
    @elseif($type == 2)
        <h2>{{ $message }}{{ $userMail }}</h2>
    @endif


    {{ config('app.name') }}
@endcomponent
