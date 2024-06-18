<x-mail::message>
# Hi,

{{$items['message']}}

<x-mail::button :url="'http://127.0.0.1:8000/cartlist'">
Pay Now
</x-mail::button>

Thanks for Using Our Services, We Value You<br>
{{ config('app.name') }}
</x-mail::message>
