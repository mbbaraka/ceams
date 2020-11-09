@extends('hr.layouts.app')

@section('title')
Core Competences
@endsection

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="list-group shadow">
            <div class="list-group-item border-custom pt-1 pb-1">
              <h4 class="text-custom">Manage Core Competences</h4>
            </div>
            <a href="{{ route('hr.core-competences.create') }}" class="list-group-item border-custom list-group-item-action"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Create Competences </a>
            <a href="{{ route('hr.core-competences') }}" class="list-group-item border-custom active list-group-item-action"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Core Competences </a>
        </div>
      </div>
      <div class="col-md-8">
          <!-- Latest Users -->
        <div class="card shadow">
          <div class="card-header border-custom pt-1 pb-1">
            <h3 class="card-title text-custom">Available Core Competences</h3>
          </div>
          <div class="card-body border-custom">
            <table class="table table-striped table-hover">
                <tr>
                  <th>#</th>
                  <th>Competence</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
                @if(count($competences) > 0)
                @foreach ($competences as $key => $competence)
                    <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $competence->competence }}</td>
                    <td>{{ $competence->description }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('hr.core-competences.update', $competence->id) }}"><button title="Edit" data-toggle='tooltip' class="btn btn-light"><span class="fa fa-edit text-dark"></span></button></a>
                            <a onclick="confirm('Are you sure of this?')" href="{{ route('hr.core-competences.update', $competence->id) }}" title="Delete Job title" class="btn btn-light"><span class="fa fa-times-circle text-primary"></span></a>
                        </div>
                    </td>
                    </tr>
                @endforeach
                @else
                <tr> No data available</tr>
                @endif
              </table>
              {{ $competences->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
