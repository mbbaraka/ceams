  <div class="modal-body">
      <div class="form-group">
        <label>Title</label>
        <input type="text" required value="{{ $meetings->title }}" name="title" class="form-control" placeholder="Title">
      </div>
      <div class="form-group">
        <label>Venue</label>
        <input type="text" required value="{{ $meetings->venue }}" name="venue" class="form-control" placeholder="Venue...">
      </div>
      <div class="form-group">
        <label>Duration</label>
        <input type="text" required value="{{ $meetings->duration }}" name="duration" class="form-control" placeholder="Duration...">
      </div>
      <div class="form-group">
        <label>Date</label>
        <input type="date" required value="{{ $meetings->date }}" name="date" class="form-control" placeholder="Wokrshop Date...">
      </div>
    </div>