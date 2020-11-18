@component('mail::message')
# Role De-assigned!.

Dear {{ $name }},
<br>
It's unfortunate that you've de-assigned from your roles and this implies that you will not be able to carry out the activities
you've been doing anymore.
We are so sorry for any inconviniences caused as a result.

Thanks,<br>
{{ config('app.name') }}
<br><br>
<small><i>This email auto-generated. Please do not reply.</i></small>
@endcomponent
