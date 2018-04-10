@extends('layouts.main')

@section('content')
    <div class="row animate-box fadeInUp animated-fast">
        <div class="col-md-12 text-left fh5co-heading" style="padding: 5%">
            <h2>Post your ad</h2>

            <form class="form-horizontal" method="POST" action="{{ route('post') }}" enctype="multipart/form-data">

                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Post Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Post Category</label>
                    <div class="col-md-6">
                        <select name="category" class="form-control">
                            @foreach($cats as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Location</label>
                    <div class="col-md-6">
                        <textarea name="location" class="form-control">{{old('location')}}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Post Details</label>
                    <div class="col-md-6">
                        <textarea name="details" class="form-control">{{old('details')}}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Post Image</label>
                    <div class="col-md-6">
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Price</label>
                    <div class="col-md-6">
                        <input type="text" name="price" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Save Post
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
