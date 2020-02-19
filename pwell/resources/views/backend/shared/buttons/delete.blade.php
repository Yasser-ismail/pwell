<form action="{{route($route_name.'.destroy', $row->id)}}" class="form-group" method="post" style="display: inline-block">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="delete">
    <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm form-group"
            data-original-title="Remove {{$model_name}}">
        <a href="{{route($route_name.'.destroy', $row->id)}}"><i class="material-icons">close</i></a>
    </button>
</form>
