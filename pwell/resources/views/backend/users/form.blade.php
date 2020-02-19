{{csrf_field()}}
<div class="row">
    <div class="col-sm-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Username</label>
            <input type="text" name="name" value="{{isset($row) ? $row->name : ''}}"
                   class="form-control @error('name') is-invalid @enderror">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
        </span>
            @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Email address</label>
            <input type="email" name="email" value="{{isset($row) ? $row->email : ''}}"
                   class="form-control @error('email') is-invalid @enderror">
            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Password</label>
            <input type="password" name="password"
                   class="form-control @error('password') is-invalid @enderror">
            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>

    </div>
    <div class="col-sm-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Phone</label>
            <input type="number" name="phone" value="{{isset($row) ? $row->phone : ''}}"
                   class="form-control @error('phone') is-invalid @enderror">
            @error('phone')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group bmd-form-group form-control">
            <label class="bmd-label-floating">Status</label>
            <select name="status" class="@error('status') is-invalid @enderror">
                <option value="" disabled {{isset($row) ? '' : 'selected'}}>Choose Status</option>
                <option value="0" {{isset($row->status) && $row->status == 0 ? 'selected' : ''}}>Block</option>
                <option value="1" {{isset($row->status) && $row->status == 1 ? 'selected' : ''}}>Active</option>
            </select>
            @error('status')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group bmd-form-group form-control">
            <label class="bmd-label-floating">Role</label>
            <select name="role_id" class="@error('role_id') is-invalid @enderror">
                <option value="" disabled {{isset($row) ? '' : 'selected'}}>Choose Role</option>
                @foreach($roles as $role)
                    <option
                        value="{{$role->id}}" {{isset($row->role_id) && $row->role->id == $role->id ? 'selected' : ''}}>{{ucwords($role->role)}}</option>
                @endforeach
            </select>
            @error('role_id')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>
</div>
<button type="submit" class="btn btn-primary pull-right">{{$submit_name}}</button>
