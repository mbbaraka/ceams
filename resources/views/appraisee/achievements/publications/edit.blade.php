    <div class="modal-body">
      <div class="form-group">
        <label>Title</label>
        <input type="text" required value="{{ $publications->title }}" name="title" class="form-control" placeholder="Title">
      </div>
      <div class="form-group">
        <label>Publisher</label>
        <input type="text" required value="{{ $publications->publisher }}" name="publisher" class="form-control" placeholder="Publisher...">
      </div>
      <div class="form-group">
        <label>Publication Date</label>
        <input type="date" required value="{{ $publications->publish_date }}" name="publish_date" class="form-control" placeholder="Publication Date...">
      </div>
    </div>