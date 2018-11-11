@component('mail::message')
# Welcome to Laravel

- Dobro nam došli
- добро нам дошли

@component('mail::button', ['url' => 'https://www.w3schools.com/'])
W3Schools
@endcomponent
{{$user->name}}
Thanks,<br>
{{ config('app.name') }}
@endcomponent
