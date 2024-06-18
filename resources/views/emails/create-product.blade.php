<x-mail::message>
# Introduction

{{$mailData}}

<x-mail::button :url="'centsys.com'" color="sucess">
Visit Us
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
