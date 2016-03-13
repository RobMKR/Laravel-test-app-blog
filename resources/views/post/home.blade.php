@extends('../layouts.app')

@section('content')


<div class="container">
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
            </ul>
         </div>
      </div>
    </div>
  @endForEach
</div>


@endsection
