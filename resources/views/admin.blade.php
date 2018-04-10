@extends('layouts.main')

@section('content')
    <div class="row animate-box fadeInUp animated-fast">
        <div class="col-md-12 text-left fh5co-heading" style="padding: 5%">
            <h2>Admin Dashboard</h2>

            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#users">Users</a></li>
                <li><a data-toggle="tab" href="#cats">Categories</a></li>
                <li><a data-toggle="tab" href="#posts">Posts</a></li>
            </ul>

            <div class="tab-content">
                <div id="users" class="tab-pane fade in active">
                    <br/>
                    <h4>Users</h4>
                    <table class="table table-bordered table-responsive table-striped">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Registration Date</th>
                        </tr>
                        @foreach($users as $u)
                        <tr>
                            <td>{{$u->id}}</td>
                            <td>{{$u->name}}</td>
                            <td>{{$u->email}}</td>
                            <td>{{$u->created_at}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>

                <div id="cats" class="tab-pane fade">
                    <br/>
                    <h5>Categories</h5>

                    <form class="form-horizontal" method="POST" action="{{ route('admin.category') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Category Name</label>

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
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save Category
                                </button>
                            </div>
                        </div>
                    </form>

                    <table class="table table-bordered table-responsive table-striped">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Date Created</th>
                        </tr>
                        @foreach($cats as $c)
                            <tr>
                                <td>{{$c->id}}</td>
                                <td>{{$c->name}}</td>
                                <td>{{$u->created_at}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                <div id="posts" class="tab-pane fade">
                    <br/>
                    <h5>Posts</h5>

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

                    <table class="table table-bordered table-responsive table-striped">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Details</th>
                            <th>Image</th>
                            <th>Date Created</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach($posts as $p)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$p->name}}</td>
                                <td>{{$p->details}}</td>
                                <td><img width="100" src="/uploads/{{$p->image}}"></td>
                                <td>{{$p->created_at}}</td>
                                <td>
                                    {{$p->approved?'approved':'pending'}}
                                </td>
                                <td>
                                    @if(!$p->approved)
                                    <a href="{{url('/approve',$p->id)}}">Approve</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>

        </div>
    </div>
@endsection
