@extends('layouts.main')

@section('content')
    <div class="panel-body">
        <h3>Dashboard</h3>
    </div>
    <div id="fh5co-counter" class="fh5co-counters animated">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center animate-box fadeInUp animated-fast">
                <p>you are logged in</p>
                <a href="{{url('post')}}"> Get Started</a><br/>
                <a href="{{url('my-posts')}}"> My Posts</a>
            </div>
        </div>
    </div>
@endsection
