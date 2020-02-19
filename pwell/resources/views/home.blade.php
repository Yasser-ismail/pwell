@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-top:150px ">
            <div class="card">
                <div class="card-header card-header-primary">Pwell</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome to Pwel!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
