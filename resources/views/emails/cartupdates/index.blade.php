<x-mail::message>
# Welcome to CentSys


Your have {{$time}} Hours before your cart is deleted. Pay now to avoid lossing it.

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
