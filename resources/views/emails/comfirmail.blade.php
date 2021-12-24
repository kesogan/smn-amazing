@component('mail::message')

# Dear, {{$content['firstName']}} {{$content['lastName']}}

You are receiving this email because we received a Payment request from you.
here follow the Bill in the attachment pdf.


@component('mail::button', ['url' => 'http://127.0.0.1:8000'])
Click here to continues shopping
@endcomponent


Thanks,<br>
{{-- {{ config('app.name') }} --}}
SMNDESIGN
@endcomponent


