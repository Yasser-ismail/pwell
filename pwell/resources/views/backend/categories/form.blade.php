{{csrf_field()}}
<div class="row">
    <div class="col-sm-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Category Name</label>
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
            <label class="bmd-label-floating">Image</label>
            <input type="file" name="image" style="position: initial;" class="form-control @error('image') is-invalid @enderror">
            @error('image')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
            @enderror
        </div>
    </div>
</div>
<button type="submit" class="btn btn-primary pull-right">{{$submit_name}}</button>
