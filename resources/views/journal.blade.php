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
                <div class="panel-heading"><h2>{{$journal->name}}</h2></div>
                <div class="panel-body">
                <!-- New Post Form -->
                    <form action="{{ url('/post')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Post Content -->
                        <div class="form-group">
                           
                            <input type="hidden" name='journal_id' value="{{ $journal->id }}"/>

                            <div style="width:96%; margin: 2% " class="col-sm-6">
                                <textarea name="content" id="post-content" class="form-control" rows="20" required="required">
                                    {{ old('post') }}
                                </textarea>
                            </div>


                        </div>

                        <!-- Post Button -->

                        <div class=" form-group ">
                            <div style ="margin-right:49%;">
                                <button type="submit" class="btn btn-primary" >
                                    <i class="fa fa-btn fa-plus"></i>نشــر
                                </button>
                            </div>
                        </div>
                    </form>
                    <hr />
                    <div class="posts">
                        @foreach ($posts as $post_id => $post)
                        <div class="post panel panel-default panel-body">
                            <div class="user col-lg-2" style="font-family: 'Amiri', serif;">
                               <p>
                                  <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                   <span class="lead">
                                      <a href="{{url('/journal/'.$post->user->journal->id)}}">{{$post->user->name}}</a>
                                   </span>
                                   <br>
                                   <small style="padding-right:25px;">يكتب:</small>
                                </p>
                            </div>
                            <div class="content col-lg-9 text-justify">

                                <p style="font-size:1.4em;">
                                    {!!$post->content!!} 
                                </p>
                            </div>
                            <div class="edit text-center col-lg-1" style="padding-top:25px;">
                                <div class="dropdown">
                                  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                    <span> </span>
                                    <span class="caret"></span>
                                  </button>
                                  <ul class="dropdown-menu">
                                    <li class="text-left"><a href="#">تعديل</a></li>
                                    <li class="text-left"><a href="#">حذف</a></li>
                                    <li class="text-left"><a href="#">الإبلاغ عن محتوى غير مناسب أو مسيء</a></li>
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
