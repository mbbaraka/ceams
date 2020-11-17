@component('mail::message')
# Account Registration.

Your successfully registered an account with {{ config('app.name') }}! <br>
However, your account is still pending. You will be able to login to the system once the human resource approves you.

Thanks,<br>
{{ config('app.name') }}
<br><br>
<small><i>This email auto-generated. Please do not reply.</i></small>
@endcomponent
