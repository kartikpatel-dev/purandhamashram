<x-mail::message>
# {{ $user->first_name }}

Your are approved, please login now.

<x-mail::button :url="route('login')">
Login
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
