@extends('layouts.app')

@section('custom_css')
   textarea{
      max-width:100%!important;
      width:70%!important;
   }
   #postButton{
      width:100%!important;
   }
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h2><i class="fa fa-book" aria-hidden="true"></i> {{$journal->name}}</h2></div>
                <div class="panel-body">
                <!-- New Post Form -->
                    <form action="{{ url('post')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        <!-- Post Content -->
                        <div class="form-group">
                            <input type="hidden" name='journal_id' value="{{ $journal->id }}"/>
                            <div class="col-sm-12">
                                <textarea class="form-control" id="post-content" name="content" rows="5" cols="40">{{ old('post') }}</textarea>
                            </div>
                        </div>
                        <!-- Post Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-4">
                                <button type="submit" id="postButton" class="btn btn-default">
                                    <i class="fa fa-plus" aria-hidden="true"></i><span> اكتب</span>
                                </button>
                            </div>
                        </div>
                    </form>
                    <hr />
                    <div class="posts">
                        @foreach ($posts as $post_id => $post)
                        <div class="post panel panel-default panel-body">
                            <div class="user col-lg-2">
                              <p>
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <a class="bigger" href="{{url('/journal/'.$post->user->journal->id)}}">{{$post->user->name}}</a>
                                <br />
                                <small style="padding-right:20px;">يكتب:</small>
                              </p>
                            </div>
                            <div class="content col-lg-9 text-justify">
                                <p class="bigger">{{$post->content}}</p>
                            </div>
                            <div class="edit text-center col-lg-1" style="padding-top:25px;">
                                <div class="dropdown">
                                  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                    <span> </span>
                                    <span class="caret"></span>
                                  </button>
                                  <ul class="dropdown-menu">
                                    <li><a href="#"><i class="fa fa-pencil" aria-hidden="true"></i> تعديل</a></li>
                                    <li><a href="#"><i class="fa fa-trash" aria-hidden="true"></i> حذف</a></li>
                                    <li><a href="#"><i class="fa fa-flag" aria-hidden="true"></i> الأبلاغ عن المحتوى</a></li>
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
