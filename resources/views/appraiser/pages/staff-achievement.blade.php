@extends('appraiser.layouts.app')

@section('title')
Appraisee List
@endsection

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="list-group shadow">
            <div class="list-group-item border-custom pt-1 pb-1">
              <h4 class="text-custom" style="text-transform: capitalize">{{ $staff->name }}</h4>
            </div>
            <a href="{{ route('hr.roles.create') }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Staff Particulars </a>
            <a href="{{ route('staff-achievements', $staff->staff_id) }}" class="list-group-item list-group-item-action border-custom active"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Staff Achivement </a>
            <a href="{{ route('achievements-assessment', $staff->staff_id) }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Achievement Assessment </a>
            <a href="{{ <a href="{{ route('core-competences', $staff->staff_id) }}" class="list-group-item list-group-item-action border-custom active"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Core Competence Assessment </a>
            <a href="{{ route('hr.roles.staff') }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Recommendations </a>
            <a href="{{ route('hr.roles.staff') }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Performance Improvement Action Plan </a>
            <a href="{{ route('hr.roles.staff') }}" class="list-group-item list-group-item-action border-custom"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Comments </a>
        </div>
      </div>
      <div class="col-md-8">
          <!-- Latest Users -->
        <div class="card shadow">
          <div class="card-header border-custom pt-1 pb-1">
            <h3 class="card-title text-custom">Staff Achivements</h3>
          </div>
          <div class="card-body border-custom">
            <h4>Studies Undertaken</h4><hr>
            <table class="table table-striped table-hover">
                <tr>
                  <th>#</th>
                  <th>Course</th>
                  <th>Insititution</th>
                  <th>Award</th>
                  <th>Completion Date</th>
                </tr>
                @foreach ($studies as $key => $study)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $study->course }}</td>
                    <td>{{ $study->institution }}</td>
                    <td>{{ $study->award }}</td>
                    <td>{{ date('d M, Y', strtotime($study->date_of_completion)) }}</td>
                </tr>
                @endforeach

            </table>
            {{-- {{ $studys->links() }} --}}
            <hr>
            <h4>Courses Taught</h4><hr>
            <table class="table table-striped table-hover table-responsive-sm">
                <tr>
                  <th>#</th>
                  <th>Course Unit</th>
                  <th>Program</th>
                  <th>Contact Hours</th>
                </tr>
                @foreach ($courses as $key => $course)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $course->course_unit }}</td>
                    <td>{{ $course->program }}</td>
                    <td>{{ $course->contact_hours }}</td>
                </tr>
                @endforeach
            </table>
            <hr>
            <h4>Publications</h4><hr>
            <table class="table table-striped table-hover">
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Publisher</th>
                  <th>Date of Publication</th>
                </tr>
                @foreach ($publications as $key => $publication)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $publication->title }}</td>
                    <td>{{ $publication->publisher }}</td>
                    <td>{{ date('d M, Y', strtotime($publication->publish_date)) }}</td>
                </tr>
                @endforeach
            </table>
            <h4>Meetings/Workshops held</h4><hr>
            <table class="table table-striped table-hover">
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Venue</th>
                  <th>Duration</th>
                  <th>Date</th>
                </tr>
                @foreach ($workshops as $key => $workshop)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $workshop->title }}</td>
                    <td>{{ $workshop->venue }}</td>
                    <td>{{ $workshop->duration }}</td>
                    <td>{{ date('d M, Y', strtotime($workshop->date)) }}</td>
                </tr>
                @endforeach
            </table>


          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
