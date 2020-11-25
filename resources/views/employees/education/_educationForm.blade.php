<div class="modal-body">
    <div class="form-group">
        <label for="level">Level</label>
        <input type="text" class="form-control {{ $errors->has('level') ? 'is-invalid' : '' }}" name="level" id="level" value="{{ old('level', $education->level) }}">
        @if ($errors->has('level'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('level') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group">
        <label for="school-name">School Name</label>
        <input type="text" class="form-control {{ $errors->has('school_name') ? 'is-invalid' : '' }}" name="school_name" id="school-name" value="{{ old('school_name', $education->school_name) }}">
        @if ($errors->has('school_name'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('school_name') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group">
        <label for="date-graduated">Date Graduated</label>
        <div class="input-group date" id="date_graduated" data-target-input="nearest">
            <input type="text" class="form-control datetimepicker-input {{ $errors->has('date_graduated') ? 'is-invalid' : '' }}" data-target="#date_graduated" name="date_graduated" value="{{ old('date_graduated', $education->date_graduated) }}">
            <div class="input-group-append" data-target="#date_graduated" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
            @if ($errors->has('date_graduated'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('date_graduated') }}</strong>
                </div>
            @endif
        </div>
    </div>
</div>