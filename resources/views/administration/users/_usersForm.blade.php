<div class="row">
    <div class="form-group col-12">
        <label for="last-name">Last Name</label>
        <input type="text" class="form-control {{ $errors->has('lname') ? 'is-invalid' : '' }}" value="{{ old('lname', $user->lname) }}" id="last-name" name="lname">
        @if ($errors->has('lname'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('lname') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group col-12">
        <label for="first-name">First Name</label>
        <input type="text" class="form-control {{ $errors->has('fname') ? 'is-invalid' : '' }}" value="{{ old('fname', $user->fname) }}" id="first-name" name="fname">
        @if ($errors->has('fname'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('fname') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group col-12">
        <label for="middle-name">Middle Name</label>
        <input type="text" class="form-control {{ $errors->has('mname') ? 'is-invalid' : '' }}" value="{{ old('mname', $user->mname) }}" id="middle-name" name="mname">
        @if ($errors->has('mname'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('mname') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group col-12">
        <label for="email">Email</label>
        <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email', $user->email) }}" id="email" name="email">
        @if ($errors->has('email'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group col-12">
        <label for="password">Password</label>
        <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password" name="password">
        @if ($errors->has('password'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('password') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group col-12">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" class="form-control {{ $errors->has('confirm-password') ? 'is-invalid' : '' }}" id="password_confirmation" name="password_confirmation">
        @if ($errors->has('password_confirmation'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </div>
        @endif
    </div>
</div>
<div class="row">
    <div class="form-group col-12">
        <label for="user_role">Role</label>
        <select name="user_role" id="user_role" class="form-control">
            @foreach ($roles_list as $user_role)
                <option value="{{ $user_role->id }}" {{ ($user_role->id == old('user_role', $user_role->id)) ? 'selected' : ''}}>{{ $user_role->role_title }}</option>
            @endforeach
        </select>
        @if ($errors->has('user_role'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('user_role') }}</strong>
            </div>
        @endif
    </div>
</div>
<div class="d-flex justify-content-end">
    <a href="{{ route('users.index') }}" class="btn btn-default mr-2">Cancel</a>
    <button type="submit" class="btn btn-primary">Save</button>
</div>