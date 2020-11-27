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
                            <button title="Edit" data-toggle='modal' data-target="#edit{{ $competence->id }}" class="btn btn-light"><span class="fa fa-edit text-dark"></span></button>
                            <button onclick="confirm('Are you sure of this?')" class="btn btn-light"><a href="{{ route('hr.core-competences.delete', $competence->id) }}" title="Delete Job title"><span class="fa fa-times-circle text-primary"></span></a></button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="edit{{ $competence->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <form action="{{ route('hr.core-competences.update', $competence->id) }}" method="POST">
                                        @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="">Competence</label>
                                            <input type="text" name="competence" value="{{ $competence->competence }}" id="" class="form-control @error('title') is-invalid @enderror" placeholder="Core Competence" aria-describedby="helpId">
                                            @error('competence')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                            @enderror
                                          </div>
                                          <div class="form-group">
                                              <label for="">Description</label>
                                              <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="" cols="30" rows="3">{{ $competence->description }}</textarea>
                                              @error('description')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                            @enderror
                                          </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
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
