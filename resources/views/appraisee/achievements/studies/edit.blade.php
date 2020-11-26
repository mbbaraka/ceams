	<div class="modal-body">
      <div class="form-group">
        <label>Course</label>
        <input type="text" value="{{$studies->courses}}" required name="course" class="form-control" placeholder="Course taken ...">
      </div>
      <div class="form-group">
        <label>Institution</label>
        <input type="text" value="{{$studies->institution}}" required name="institution" class="form-control" placeholder="Add institution...">
      </div>
      <div class="form-group">
        <label>Award</label>
        <input type="text" value="{{$studies->award}}" required name="award" class="form-control" placeholder="Add award...">
      </div>
      <div class="form-group">
        <label>Date of Completion</label>
        <input type="date" value="{{$studies->date_of_completion}}" required name="date" class="form-control" placeholder="Add date...">
      </div>
    </div>
