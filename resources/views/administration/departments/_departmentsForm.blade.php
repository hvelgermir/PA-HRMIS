<div class="form-group">
    <label for="department-name">Department Name</label>
    <input type="text" class="form-control {{ $errors->has('department_name') ? 'is-invalid' : '' }}" value="{{ old('department_name', $department->department_name) }}" name="department_name" id="department-name">
    @if ($errors->has('department_name'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('department_name') }}</strong>
        </div>
    @endif
</div>
<div class="d-flex justify-content-end">
    <a href="{{ route('departments.index') }}" class="btn btn-default mr-2">Cancel</a>
    <button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
</div>