@extends('layouts.app')
@section('content')
    <div class="page-header clear-filter">
        <div class="page-header-image" style="background-image: url({{asset('assets/img/sidebar-1.jpg')}});"></div>
        <div class="content-center">
            <div class="col-md-8 ml-auto mr-auto">
                <div class="brand">
                    <h1 class="title">
                        Pwell
                    </h1>
                    <h3 class="description">Make it easy</h3>
                    <br>
                    <a href="#" class="btn btn-primary btn-round btn-lg">Download our application app store - play
                        store</a>
                </div>
            </div>
        </div>
    </div>
    <div class="section text-center" style="background-color: #312e43">
        <div class="container">
            <h2 class="title">Our Numbers</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card  card-plain">
                        <div class="card-body">
                            <a href="#paper-kit">
                                <div class="author">
                                    <h2 class="card-title">{{count($users)}}</h2>
                                    <h4 class="card-category">Users</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card  card-plain">
                        <div class="card-body">
                            <a href="#paper-kit">
                                <div class="author">
                                    <h2 class="card-title">{{count($categories)}}</h2>
                                    <h4 class="card-category">Categories</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card  card-plain">
                        <div class="card-body">
                            <a href="#paper-kit">
                                <div class="author">
                                    <h2 class="card-title">{{count($places)}}</h2>
                                    <h4 class="card-category">Places</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--    contact us--}}

    <div class="section landing-section" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <h2 class="text-center">Keep in touch?</h2>
                    @if(Session::has('message_sent'))
                        <p class="bg-primary">{{session('message_sent')}}</p>
                    @endif
                    @if(Session::has('message_failure'))
                        <p class="bg-danger">{{session('message_failure')}}</p>
                    @endif

                    <form class="contact-form" action="{{route('message.store')}}" method="post">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                                <div class="input-group">
                                    <input type="text" name="name"
                                           class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Email</label>
                                <div class="input-group">
                                    <input type="email" name="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           placeholder="Email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <label>Message</label>
                        <textarea class="form-control @error('message') is-invalid @enderror" rows="4" name="message"
                                  placeholder="Tell us your thoughts and feelings..."></textarea>
                        @error('message')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <div class="row">
                            <div class="col-md-4 ml-auto mr-auto">
                                <button type="submit" class="btn btn-danger btn-lg btn-fill">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


