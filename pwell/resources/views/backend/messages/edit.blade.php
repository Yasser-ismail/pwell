@extends('backend.layouts.app')
@section('title')
    Reply
@endsection
@section('nav_title')
    Reply - Contact us
@endsection
@section('content')
    <div class="col-sm-8">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Reply</h4>
                <p class="card-category">Here you can reply to the below message</p>
            </div>
            <div class="card-body">
                    @include('backend.'.$directory.'.form')
            </div>
        </div>
    </div>
@endsection
