@extends('../layouts.admin')

@section('content')


<div class="container">

  @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  @forEach($posts as $post)
    <div class="well">
        <div class="media">
        <a class="pull-left" href="#">
      	   <img width='120' class="media-object" src="{{$post->image_url}}" alt="{{$post->title}}"/>
    		</a>
    		<div class="media-body">
      		<h4 class="media-heading">{{$post->title}}</h4>
            <p class="text-right">By {{$post->user->name}}</p>
            <p>{{$post->content}}</p>
            <ul class="list-inline list-unstyled">
    			       <li><span><i class="glyphicon glyphicon-calendar"></i>{{$post->created_at}}</span></li>
                 <li>|</li>
                 <a href='admin/remove/{{$post->id}}'><i class="glyphicon glyphicon-remove"></i> Remove Post</a>
                 <li>|</li>
                 <a href='admin/edit/{{$post->id}}'><i class="glyphicon glyphicon-pencil"></i> Edit Post</a>
            </ul>
         </div>
      </div>
    </div>
  @endForEach
</div>


@endsection
