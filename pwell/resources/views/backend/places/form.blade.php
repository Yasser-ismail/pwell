{{csrf_field()}}
<div class="row">
    <div class="col-sm-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">PlaceName</label>
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
            <label class="bmd-label-floating">Bio</label>
            <input type="text" name="bio" value="{{isset($row) ? $row->bio : ''}}"
                   class="form-control @error('bio') is-invalid @enderror">
            @error('bio')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group bmd-form-group form-control">
            <label class="bmd-label-floating">Category</label>
            <select name="category_id" class="@error('category_id') is-invalid @enderror">
                <option value="" disabled {{isset($row) ? '' : 'selected'}}>Choose Category</option>
                @foreach($categories as $category)
                    <option
                        value="{{$category->id}}" {{isset($row->category_id) && $row->category->id == $category->id ? 'selected' : ''}}>{{ucwords($category->name)}}</option>
                @endforeach
            </select>
            @error('category_id')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Logo</label>
            <input type="file" name="image" style="position: initial;"
                   class="form-control @error('image') is-invalid @enderror">
            @error('image')
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
            <span class="label">Start Time</span>
            <input type="time" name="start_at" value="{{isset($row) ? $row->start_at : ''}}"
                   class="form-control @error('start_at') is-invalid @enderror">
            @error('start_at')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group bmd-form-group">
            <span class="label">End Time</span>
            <input type="time" name="end_at" value="{{isset($row) ? $row->end_at : ''}}"
                   class="form-control @error('end_at') is-invalid @enderror">
            @error('end_at')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>
</div>
<button type="submit" class="btn btn-primary pull-right">{{$submit_name}}</button>
