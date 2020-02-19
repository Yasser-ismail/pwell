@extends('backend.layouts.app')
@section('title')
    {{$title}}
@endsection
@section('nav_title')
    {{$nav_title}}
@endsection
@section('content')
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">{{$table_title}}</h4>
                <p class="card-category">{{$table_des}}</p>
            </div>
            <div class="card-body">
                <form action="{{route($directory.'.store')}}" method="post" enctype="multipart/form-data">
                    @include('backend.'.$directory.'.form')
                </form>
            </div>
        </div>
    </div>
@endsection
