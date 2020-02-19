@extends('backend.layouts.app')
@section('title')
    Control Photos
@endsection
@section('nav_title')
    Control Photos
@endsection
@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="card-title">Control Photos of <img src="{{$place->image}}"
                                                                      style="width: 30px; height: 30px;"
                                                                      class="rounded-circle">
                            <strong>{{$place->name}}</strong></h4>
                        <p class="card-category">Here you can delete photos</p>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="{{route('places.upload', $place->id)}}" class="btn btn-white btn-round">
                            Add Photos
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">

                <form action="{{route('photos.delete')}}" method="delete">
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="submit" value="Delete Selected" class="btn btn-primary ">
                    </div>
                    <table class="table table-hover text-left">
                        <thead>
                        <tr>
                            <th><input type="checkbox" id="options">Check all</th>
                            <th>ID</th>
                            <th>Photo</th>
                            <th>Created</th>
                            <th>Delete</th>


                        </tr>
                        </thead>
                        <tbody>
                        @if($photos)

                            @foreach($photos as $photo)
                                <tr>
                                    <td><input class="checkboxes" type="checkbox" name="checkBoxArray[]"
                                               value="{{$photo->id}}">
                                    </td>
                                    <td>{{$photo->id}}</td>
                                    <td>@if($photo->path)<img src="{{$photo->path}}" alt=""
                                                              style="height: 50px;width: 100px;">@endif</td>
                                    <td>{{$photo->created_at->diffForHumans()}}</td>
                                    <td>

                                        <form action="{{route('photo.delete', $photo->id)}}" class="form-group"
                                              method="delete" style="display: inline-block">
                                            {{csrf_field()}}
                                            <button type="submit" rel="tooltip" title=""
                                                    class="btn btn-white btn-link btn-sm form-group"
                                                    data-original-title="Remove Photo">
                                                <a href="{{route('photo.delete', $photo->id)}}"><i
                                                        class="material-icons">close</i></a>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                        @endforeach
                        @endif
                    </table>
                </form>
            </div>
            <div class="content-center col-sm-6 offset-sm-5">
                {{$photos->render()}}
            </div>
        </div>
    </div>
@endsection
@section('script')

    <script>
        $('#options').click(function () {

            if (this.checked) {
                $('.checkboxes').each(function () {
                    this.checked = true;
                });
            } else {
                $('.checkboxes').each(function () {
                    this.checked = false;

                });
            }
        });
    </script>

@endsection
