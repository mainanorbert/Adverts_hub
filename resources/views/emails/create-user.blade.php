<x-mail::message>
# Introduction

{{$data['message']}}
<x-mail::button :url="'http://127.0.0.1:8000/products'">
Visit Now
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
