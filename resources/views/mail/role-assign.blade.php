@component('mail::message')
# Role Assigned!.

Dear {{ $first_name }},
<br>
You've been assigned a role of {{ $role }} by the Human Resource. Please you can no =w start exercising your duties
as the {{ $role }}

Thanks,<br>
{{ config('app.name') }}
<br><br>
<small><i>This email auto-generated. Please do not reply.</i></small>
@endcomponent
