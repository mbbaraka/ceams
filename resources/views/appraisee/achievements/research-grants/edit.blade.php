<div class="modal-body">
    <div class="form-group">
        <label>Research Applied For</label>
        <input type="text" value="{{ $researchs->research_applied_for }}" required name="research_applied_for" class="form-control" placeholder="Research Applied For">
    </div>
    <div class="form-group">
        <label>Application Date</label>
        <input type="date" value="{{ $researchs->application_date }}" required name="application_date" class="form-control" placeholder="Application Date">
    </div>
    <div class="form-group">
        <label>Status: </label>
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-primary">
              <input type="radio" data-toggle="collapse" data-target="#date-awarded" name="status" id="awarded" autocomplete="off" checked value="1"> Awarded
            </label>
            <label class="btn btn-danger active">
              <input type="radio" name="status" id="not-awarded" autocomplete="off" value="0"> Not Awarded
            </label>
        </div>
    </div>
    <div class="form-group collapse" id="date-awarded">
        <label for="date-of-award">Date of Awarded</label>
        <input type="date" class="form-control" name="date_of_award" value="{{ $researchs->date_of_award }}"/>
    </div>
</div>
