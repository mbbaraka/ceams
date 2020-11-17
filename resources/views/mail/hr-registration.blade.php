@component('mail::message')
# Account Registration.

You have been registered as a staff of Muni University by the Human resource office. You can now login to the system using the following credentials.
<br>
Email: {{ $email }}
<br>
Password: {{ $password }}

Thanks,<br>
{{ config('app.name') }}
<br><br>
<small><i>This email auto-generated. Please do not reply.</i></small>
@endcomponent
