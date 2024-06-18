<x-mail::message>
# CentSys Engineering Security Devices

{{$mailData['message']}}


<x-mail::button :url="'http://127.0.0.1:300/products'">
Visit Our Website
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
