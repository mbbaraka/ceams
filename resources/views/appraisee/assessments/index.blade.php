@extends('layouts.app')

@section('title', 'Staff Achievement Assessment')

@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-12">
        <!-- Website Overview -->
        <div class="card border-custom shadow">
          <div class="card-header">
              <h5>Staff Achivement Assessment</h5>
          </div>
          <div class="card-body">
            <table class="table table-striped table-hover table-responsive-sm">
                <thead class="bg-light">
                  <th colspan="5">
                    <div class="text-center pb-1">
                      <h5>Agreed Key Outputs, Performance Indicators and Targets</h5>
                    </div>
                  </th>
                </thead>
                <thead>
                  <th>S/n</th>
                  <th>Key Outputs</th>
                  <th>Performance Indicators</th>
                  <th>Performance Targets</th>
                  <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($description as $key => $descriptions)
                    <tr>
                      <td>{{ $key +1 }}</td>
                      <td>{!! $descriptions->description !!}</td>
                      <td>
                        @if (Ceams::achievement($descriptions->id, Auth::user()->staff_id))
                            {{ Ceams::achievement($descriptions->id, Auth::user()->staff_id)->performance_indicators }}
                            @if (Ceams::achievement($descriptions->id, Auth::user()->staff_id)->status == "pending")
                            <span class="float-right badge badge-primary">Pending</span>
                            @elseif(Ceams::achievement($descriptions->id, Auth::user()->staff_id)->status == "rejected")
                                <span class="float-right badge badge-danger">Rejected</span>
                            @elseif(Ceams::achievement($descriptions->id, Auth::user()->staff_id)->status == "approved")
                                <span class="float-right badge badge-success">Approved</span>
                            @endif
                        @else
                            <span>Not yet added. <a data-toggle="modal" href="#editModal{{ $descriptions->id }}">Click to add</a></span>
                        @endif
                      </td>
                      <td width="40%;">
                        @if (Ceams::achievement($descriptions->id, Auth::user()->staff_id))
                            {{ Ceams::achievement($descriptions->id, Auth::user()->staff_id)->min_performance_level }}
                            @if (Ceams::achievement($descriptions->id, Auth::user()->staff_id)->status == "pending")
                            <span class="float-right badge badge-primary">Pending</span>
                            @elseif(Ceams::achievement($descriptions->id, Auth::user()->staff_id)->status == "rejected")
                                <span class="float-right badge badge-danger">Rejected</span>
                            @elseif(Ceams::achievement($descriptions->id, Auth::user()->staff_id)->status == "approved")
                                <span class="float-right badge badge-success">Approved</span>
                            @endif
                        @else
                            <span>Not yet added. <a data-toggle="modal" href="#editModal{{ $descriptions->id }}">Click to add</a></span>
                        @endif
                      </td>
                      <td>
                        <div class="btn-group">
                            <button data-toggle="modal" data-target="#viewModal{{ $descriptions->id }}" class="btn btn-light" title="View Assessment"><span class="fa fa-eye text-dark"></span></button>
                            <button data-toggle="modal" data-target="#editModal{{ $descriptions->id }}" class="btn btn-light" title="Edit Assessment"><span class="fa fa-edit text-primary"></span></button>
                            <a href="{{ route('achievement-assessment.reset', $descriptions->id) }}" onclick="confirm('Are you sure?')" class="btn btn-light" title="Reset Assessment"><span class="fa fa-times-circle text-danger"></span></a>

                            {{-- Modals --}}
                            {{-- View modal --}}

                                <div class="modal fade" id="viewModal{{ $descriptions->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Viewing the Achivement Assessment</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                  <label for="description">Job Description/Key Output</label>
                                                  <p class="text-muted">
                                                      {!! $descriptions->description !!}
                                                  </p>
                                                </div>
                                                <div class="form-group">
                                                  <label for="description">Performance Target</label>
                                                    <p class="text-muted">
                                                        @if (Ceams::achievement($descriptions->id, Auth::user()->staff_id))
                                                        {{ Ceams::achievement($descriptions->id, Auth::user()->staff_id)->performance_indicators }}
                                                        @if (Ceams::achievement($descriptions->id, Auth::user()->staff_id)->status == "pending")
                                                        <span class="float-right badge badge-primary">Pending</span>
                                                        @elseif(Ceams::achievement($descriptions->id, Auth::user()->staff_id)->status == "rejected")
                                                            <span class="float-right badge badge-danger">Rejected</span>
                                                        @elseif(Ceams::achievement($descriptions->id, Auth::user()->staff_id)->status == "approved")
                                                            <span class="float-right badge badge-success">Approved</span>
                                                        @endif
                                                    @else
                                                        <span>Not yet added.</span>
                                                    @endif
                                                  </p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Performance Target</label>
                                                    <p class="text-muted">
                                                        @if (Ceams::achievement($descriptions->id, Auth::user()->staff_id))
                                                            {{ Ceams::achievement($descriptions->id, Auth::user()->staff_id)->min_performance_level }}
                                                            @if (Ceams::achievement($descriptions->id, Auth::user()->staff_id)->status == "pending")
                                                            <span class="float-right badge badge-primary">Pending</span>
                                                            @elseif(Ceams::achievement($descriptions->id, Auth::user()->staff_id)->status == "rejected")
                                                                <span class="float-right badge badge-danger">Rejected</span>
                                                            @elseif(Ceams::achievement($descriptions->id, Auth::user()->staff_id)->status == "approved")
                                                                <span class="float-right badge badge-success">Approved</span>
                                                            @endif
                                                        @else
                                                            <span>Not yet added.</span>
                                                        @endif
                                                    </p>
                                                  </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Edit modal --}}

                                <div class="modal fade" id="editModal{{ $descriptions->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <form action="{{ route('achievement-assessment.store', $descriptions->id) }}" method="post">
                                            @csrf
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Editing Achievement Assessment</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                  <label for="indicator">Performance Indicators</label>
                                                  <textarea name="indicator" id="indicator" cols="30" rows="5" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                  <label for="target">Performance Targets</label>
                                                  <textarea name="target" id="target" cols="30" rows="5" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
          </div>

      </div>
    </div>
  </div>
@endsection
