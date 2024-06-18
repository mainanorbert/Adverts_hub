<x-mail::message>
# You tried changing your password

Use the code below to continue.

<x-mail::button :url="''">
{{$newCode}}
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
