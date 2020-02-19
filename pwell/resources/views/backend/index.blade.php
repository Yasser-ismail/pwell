@extends('backend.layouts.app')
@section('title')
    Dashbaord
@endsection
@section('nav_title')
    Dashboard
@endsection
@section('content')

        <div class="col-sm-4">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">local_grocery_store</i>
                    </div>
                    <p class="card-category">Places</p>
                    <h3 class="card-title">
                        {{count($places)}}
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons text-warning"></i>
                        <a href="{{route('places.index')}}" class="warning-link">All Places</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">category</i>
                    </div>
                    <p class="card-category">Categories</p>
                    <h3 class="card-title">{{count($categories)}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons"></i>
                        <a href="{{route('categories.index')}}" class="warning-link">All Categories</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">person</i>
                    </div>
                    <p class="card-category">Users</p>
                    <h3 class="card-title">{{count($users)}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons"></i>
                        <a href="{{route('users.index')}}" class="warning-link">All Users</a>
                    </div>
                </div>
            </div>
        </div>



@endsection
