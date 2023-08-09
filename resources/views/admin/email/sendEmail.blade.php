{{-- @component('mail::layout') --}}
    {{-- Header --}}
    {{-- @slot('header')
        @component('mail::header', ['url' => config('app.url')])
        
        @endcomponent
    @endslot --}}

{{-- Body --}}
<h1>Referral User Notification!</h1>
<h3>Hi {{$user}}</h3>
Your refferal user <strong>{{ $ref_user }}</strong> created!


Thank you for using {{ config('app.name') }}!
{{-- Footer --}}
    {{-- @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ config('app.name') }}.
        @endcomponent
    @endslot
@endcomponent --}}