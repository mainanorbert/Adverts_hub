<x-mail::message>
# Use this code to verify your email



<x-mail::button :url="''">
    {{$code}}
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>



