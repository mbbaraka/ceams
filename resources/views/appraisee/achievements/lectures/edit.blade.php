  <div class="modal-body">
      <div class="form-group">
        <label>Category</label>
        <input type="text" required value="{{ $lectures->category }}" name="category" class="form-control" placeholder="Category">
      </div>
      <div class="form-group">
        <label>Topic</label>
        <input type="text" required value="{{ $lectures->topic }}" name="topic" class="form-control" placeholder="Topic...">
      </div>
      <div class="form-group">
        <label>Venue</label>
        <input type="text" required value="{{ $lectures->venue }}" name="venue" class="form-control" placeholder="Venue...">
      </div>
      <div class="form-group">
        <label>Date</label>
        <input type="date" required value="{{ $lectures->date }}" name="date" class="form-control" placeholder="Public Lecture Date...">
      </div>
    </div>