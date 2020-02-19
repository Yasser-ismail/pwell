@extends('backend.layouts.app')
@section('title')
    {{$title}}
@endsection
@section('nav_title')
    {{$nav_title}}
@endsection
@section('content')

    <div class="col-sm-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="card-title">{{$table_title}}</h4>
                        <p class="card-category">{{$table_des}}</p>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="{{route($route_name.'.create')}}" class="btn btn-white btn-round">{{$button_name}}
                            <div class="ripple-container"></div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover text-left">
                    <thead class="text-warning">

                    </thead>
                    <tbody>
                    @if($categories)
                        @foreach($categories as $category)
                            <tr>
                                <td><img src="{{$category->image}}" style="height: 50px; width: 50px;" class="rounded"></td>
                                <td><h3><strong>{{$category->name}}</strong></h3></td>
                            </tr>
                            <tr>
                                <th>ID</th>
                                <th>Logo</th>
                                <th>Name</th>
                                <th>Bio</th>
                                <th>Start_at</th>
                                <th>End_at</th>
                                <th>Place Photos</th>
                                <th class="text-right">Control</th>
                            </tr>
                            @foreach($category->places as $place)
                                <tr>
                                    <td>{{$place->id}}</td>
                                    <td><img src="{{$place->image}}" style="height: 50px; width: 50px;" class="rounded"></td>
                                    <td>{{$place->name}}</td>
                                    <td>{{str_limit($place->bio, 30)}}</td>
                                    <td>{{$place->start_at}}</td>
                                    <td>{{$place->end_at}}</td>
                                    <td><a href="{{route('places.photos.index', $place->id)}}">Photos</a></td>
                                    <td class="td-actions text-right form-group">
                                        <button type="button" rel="tooltip" title="" class="btn btn-white btn-link btn-sm form-group"
                                                data-original-title="Edit {{$model_name}}">
                                            <a href="{{route($route_name.'.edit', $place->id)}}"><i class="material-icons">edit</i></a>
                                        </button>
                                        <form action="{{route($route_name.'.destroy', $place->id)}}" class="form-group" method="post" style="display: inline-block">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="delete">
                                            <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm form-group"
                                                    data-original-title="Remove {{$model_name}}">
                                                <a href="{{route($route_name.'.destroy', $place->id)}}"><i class="material-icons">close</i></a>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="content-center col-sm-6 offset-sm-5">
                {{$rows->render()}}
            </div>
        </div>
    </div>

@endsection
