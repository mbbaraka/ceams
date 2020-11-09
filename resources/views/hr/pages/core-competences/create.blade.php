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
          <a href="{{ route('hr.core-competences.create') }}" class="list-group-item border-custom active list-group-item-action"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Create Competences </a>
          <a href="{{ route('hr.core-competences') }}" class="list-group-item border-custom list-group-item-action"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Core Competences </a>
        </div>
      </div>
      <div class="col-md-8">
        <!-- Website Overview -->
        <div class="card mb-3 shadow">
          <div class="card-header border-custom pt-1 pb-1">
            <h3 class="card-title text-custom">Create Core Competence</h3>
          </div>
          <div class="card-body border-custom">
            <form class="form-horizontal" action="{{ route('hr.core-competences-store') }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="">Competence</label>
                  <input type="text" name="competence" id="" class="form-control @error('title') is-invalid @enderror" placeholder="Core Competence" aria-describedby="helpId">
                  @error('competence')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="" cols="30" rows="3"></textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
