<div class="row">
    <div class="form-group col-md-4 col-sm-12">
        <label for="last-name">Last Name</label>
        <input type="text" class="form-control {{ $errors->has('lname') ? 'is-invalid' : '' }}" value="{{ old('lname', $employee->lname) }}" id="last-name" name="lname">
        @if ($errors->has('lname'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('lname') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group col-md-4 col-sm-12">
        <label for="first-name">First Name</label>
        <input type="text" class="form-control {{ $errors->has('fname') ? 'is-invalid' : '' }}" value="{{ old('fname', $employee->fname) }}" id="first-name" name="fname">
        @if ($errors->has('fname'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('fname') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group col-md-4 col-sm-12">
        <label for="middle-name">Middle Name</label>
        <input type="text" class="form-control {{ $errors->has('mname') ? 'is-invalid' : '' }}" value="{{ old('mname', $employee->mname) }}" id="middle-name" name="mname">
        @if ($errors->has('mname'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('mname') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group col-md-4 col-sm-12">
        <label for="dob">DOB</label>
        <div class="input-group date" id="dob" data-target-input="nearest">
            <input type="text" class="form-control datetimepicker-input {{ $errors->has('dob') ? 'is-invalid' : '' }}" value="{{ old('dob', $employee->dob) }}" data-target="#dob" name="dob">
            <div class="input-group-append" data-target="#dob" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
            @if ($errors->has('dob'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('dob') }}</strong>
                </div>
            @endif
        </div>
    </div>
    <div class="form-group col-md-4 col-sm-12">
        <label for="gender">Gender</label>
        <select class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" id="gender">
            <option selected disabled>Select Gender</option>
            @foreach ($gender_list as $gender)
                <option value="{{ $gender }}" {{ ($gender == old('gender', $employee->gender)) ? 'selected' : ''}}>{{ $gender }}</option>
            @endforeach
        </select>
        @if ($errors->has('gender'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('gender') }}</strong>
            </div>
        @endif
    </div>
</div>
<hr>
<div class="row">
    <div class="form-group col-md-4 col-sm-12">
        <label>Department</label>
        <select class="form-control {{ $errors->has('department_id') ? 'is-invalid' : '' }}" name="department_id">
            <option selected disabled>Select department</option>
            @foreach ($departments_list as $department)
                <option value="{{ $department->id }}" {{ ($department->id == old('department_id', $employee->department_id)) ? 'selected' : ''}}>{{ $department->department_name }}</option>
            @endforeach
        </select>
        @if ($errors->has('department_id'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('department_id') }}</strong>
            </div>
        @endif
    </div>
</div>
<div class="d-flex justify-content-end">
    <button type="submit" class="btn btn-primary">{{ $btnText }}</button>
</div>