@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>{{$journal->name}}</h2></div>
                <div class="panel-body">
                <!-- New Post Form -->
                    <form action="{{ url('post')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Post Content -->
                        <div class="form-group">

                            <label for="post-content" class="col-sm-3 control-label">اكتب</label>

                            <input type="hidden" name='journal_id' value="{{ $journal->id }}"/>

                            <div class="col-sm-6">
                                <input type="text" name="content" id="post-content" class="form-control" value="{{ old('post') }}">
                            </div>
                        </div>

                        <!-- Post Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>اكتب
                                </button>
                            </div>
                        </div>
                    </form>
                    <hr />
                    <div class="posts">
                        @foreach ($post_user as $post_id => $post)
                        <div class="post panel panel-default panel-body">
                            <div class="user col-lg-2" style="font-family: 'Amiri', serif;">
                                <p><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <span class="lead"><a href="{{url('/journal/'.$journal->id)}}">{{key($post)}}</a></span><br><small style="padding-right:25px;">يكتب :</small></p>
                            </div>
                            <div class="content col-lg-9 text-justify">
                                <p style="font-size:1.4em;">{{current($post)}}</p>
                            </div>
                            <div class="edit text-center col-lg-1" style="padding-top:25px;">
                                <div class="dropdown">
                                  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                    <span> </span>
                                    <span class="caret"></span>
                                  </button>
                                  <ul class="dropdown-menu">
                                    <li class="text-left"><a href="#">Edit Post</a></li>
                                    <li class="text-left"><a href="#">Delete Post</a></li>
                                    <li class="text-left"><a href="#">Report This Post</a></li>
                                  </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </divs>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection