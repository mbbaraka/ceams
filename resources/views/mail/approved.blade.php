@component('mail::message')
# Account Approval.

Your account has been approved successfully!
Click on the button below to get started with the system.

Or you copy http://3.16.131.16/ and paste in a new tab .

@component('mail::button', ['url' => 'http://3.16.131.16/'])
Visit Site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
