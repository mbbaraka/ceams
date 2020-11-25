@extends('appraiser.layouts.app')

@section('title')
Performance Improvement Action Plan
@endsection

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="list-group shadow">
            <div class="list-group-item border-custom pt-1 pb-1">
              <h4 class="text-custom" style="text-transform: capitalize">{{ $staff->name }}</h4>
            </div>
            <a href="{{ route('staff-particulars', $staff->staff_id) }}" class="list-group-item list-group-item-action border-custom active"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Staff Particulars </a>
            <a href="{{ route('staff-achievements', $staff->staff_id) }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Staff Achievement </a>
            <a href="{{ route('achievements-assessment', $staff->staff_id) }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Achievement Assessment </a>
            <a href="{{ route('core-competences', $staff->staff_id) }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Core Competence Assessment </a>
            <a href="{{ route('recommendations', $staff->staff_id) }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Recommendations </a>
            <a href="{{ route('action-plan', $staff->staff_id) }}" class="list-group-item list-group-item-action border-custom action"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Performance Improvement Action Plan </a>
            <a href="{{ route('hr.roles.staff') }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Comments </a>
        </div>
      </div>
      <div class="col-md-8">
          <!-- Latest Users -->
        <div class="card shadow">
          <div class="card-header border-custom pt-1 pb-1">
            <h3 class="card-title text-custom">
                Staff Particulars
            </h3>
          </div>
          <div class="card-body border-custom">
            <table class="table table-hover table-responsive-sm">
                <tbody>
                    <tr>
                        <td width="40%">Name of Appraisee :</td>
                        <td>{{ $staff->name }}</td>
                    </tr>
                    <tr>
                      <td width="40%">Date of Birth :</td>
                      <td>{{ date('d M, Y', strtotime($staff->dob)) }}</td>
                    </tr>
                    <tr>
                      <td width="40%">Department :</td>
                      <td>{{ $staff->department }}</td>
                    </tr>
                    <tr>
                      <td width="40%">Faculty :</td>
                      <td>{{ $staff->faculty }}</td>
                    </tr>
                    <tr>
                      <td width="40%">Job Title :</td>
                      <td>{{ $staff->job_title }}</td>
                    </tr>
                    <tr>
                      <td width="40%">Salary Scale :</td>
                      <td>{{ $staff->salary_scale }}</td>
                    </tr>
                    <tr>
                      <td width="40%">Date of Appointment :</td>
                      <td>{{ $staff->appointment_date }}</td>
                    </tr>
                    <tr>
                      <td width="40%">Terms of Service :</td>
                      <td><span class="badge badge-info">{{ $staff->terms_of_service }}</span></td>
                    </tr>
                    <tr>
                      <td width="40%">Email Address :</td>
                      <td>{{ $staff->email }}</td>
                    </tr>
                    <tr>
                      <td width="40%">Phone :</td>
                      <td>{{ $staff->phone }}</td>
                    </tr>
                    <tr>
                      <td width="40%">Name of Appraiser/Supervisor :</td>
                      <td>{{ $staff->appraiser->name }}</td>
                    </tr>
                    <tr>
                      <td width="40%">Job Title/Rank :</td>
                      <td>{{ $staff->appraiser->job_title }}</td>
                    </tr>
                    <tr>
                      <td width="40%">Salary Scale :</td>
                      <td>{{ $staff->appraiser->salary_scale }}</td>
                    </tr>
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
