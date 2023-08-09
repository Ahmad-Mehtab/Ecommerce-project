@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
        
        @endcomponent
    @endslot

{{-- Body --}}
<h1>Congratulations! {{$user}}</h1>
<h3>You are Registered as <strong>Affiliate</strong> User</h3>

Thank you for using {{ config('app.name') }}!
{{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ config('app.name') }}.
        @endcomponent
    @endslot
@endcomponent