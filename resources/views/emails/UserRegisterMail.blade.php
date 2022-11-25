<x-mail::message>
# Hello

Welcome to our website, please wait approval from admin.

<x-mail::button :url="route('login')">
Login
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
