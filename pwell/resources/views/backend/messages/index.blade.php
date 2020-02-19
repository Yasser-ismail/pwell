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
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover text-left">
                    <thead class="text-warning">
                    <tr>
                        <th>ID</th>
                        <th>Owner</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th class="text-right">Control</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($rows)
                        @foreach($rows as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{str_limit($row->message, 30)}}</td>
                                <td class="td-actions text-right form-group">
                                    <button type="button" rel="tooltip" title="" class="btn btn-white btn-link btn-sm form-group"
                                            data-original-title="Reply to {{$model_name}}">
                                        <a href="{{route($route_name.'.edit', $row->id)}}"><i class="material-icons">message</i></a>
                                    </button>
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
