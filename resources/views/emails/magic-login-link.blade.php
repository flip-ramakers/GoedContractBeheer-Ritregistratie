@component('mail::message')
    Hallo, klik op de onderstaande link om het inloggen te voltooien.
    @component('mail::button', ['url' => $url])
        Klik om in te loggen
    @endcomponent
@endcomponent
