  <div class="modal-body">
      <div class="form-group">
        <label>Program</label>
        <input type="text" value="{{ $courses->program }}" required name="program" class="form-control" placeholder="Program">
      </div>
      <div class="form-group">
        <label>Course Unit</label>
        <input type="text" value="{{ $courses->course_unit }}" required name="course_unit" class="form-control" placeholder="Course Unit...">
      </div>
      <div class="form-group">
        <label>Contact Hours</label>
        <input type="number" value="{{ $courses->contact_hours }}" required name="contact_hours" class="form-control" placeholder="Add Contact Hours...">
      </div>
    </div>