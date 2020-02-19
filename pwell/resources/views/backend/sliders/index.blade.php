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
                    <tr>
                        <th>ID</th>
                        <th>Photo</th>
                        <th class="text-right">Control</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($rows)
                        @foreach($rows as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td><img src="{{$row->image}}" style="width: 50px; height: 50px;" class="rounded"></td>
                                <td class="td-actions text-right form-group">
                                    @include('backend.shared.buttons.edit')
                                    @include('backend.shared.buttons.delete')
                                </td>
                            </tr>
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
