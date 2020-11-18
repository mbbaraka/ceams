@component('mail::message')
# Made Appraiser!.

Dear {{ $name }},
<br>
You've been assigned a role of an appraiser by the Human Resource. Please you can now start exercising your duties
as an appraiser. <br>
@component('mail::button', ['url' => 'http://3.16.131.16/appraiser'])
Login Now
@endcomponent
Thanks,<br>
{{ config('app.name') }}
<br><br>
<small><i>This email auto-generated. Please do not reply.</i></small>
@endcomponent
