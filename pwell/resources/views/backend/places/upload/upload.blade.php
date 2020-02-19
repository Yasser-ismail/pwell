@extends('backend.layouts.app')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.css">

@endsection
@section('title')
    Upload Photos
@endsection
@section('nav_title')
    Upload Photos
@endsection
@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="card-title">Add Photos To <img src="{{$place->image}}"
                                                                  style="width: 30px; height: 30px;"
                                                                  class="rounded-circle">
                            <strong>{{$place->name}}</strong></h4>
                        <p class="card-category">Here you can add photos</p>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="{{route('places.photos.index', $place->id)}}" class="btn btn-white btn-round">
                            {{ucwords($place->name)}} Photos
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="col-sm-12">
            <form action="{{route('places.photos.store')}}" method="post" enctype="multipart/form-data"
                  class="dropzone">
                @csrf
                <input type="hidden" name="place_id" value="{{$place->id}}">
            </form>
        </div>
    </div>


@endsection

@section('script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.js"></script>


@endsection
