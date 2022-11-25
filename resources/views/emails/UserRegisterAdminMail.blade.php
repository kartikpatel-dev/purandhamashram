<x-mail::message>
# {{ $user->first_name }}
<br>
Name: {{ $user->first_name }} {{ $user->last_name }}

Email: {{ $user->email }}

Mobile Number: ({{ $user->dial_code ?? 91 }}) {{ $user->mobile_number }}

<br>
Please approve me.

Thanks,<br>
{{ $user->first_name }}
</x-mail::message>
