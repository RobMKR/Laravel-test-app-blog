@extends('../layouts.admin')

@section('content')


<div class="container">

  @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  <ul>
  @foreach($categories as $_category)
    <li>{{$_category->title}}<span>| Created: {{$_category->created_at}}</span></li>
  @endforeach
  </ul>
</div>


@endsection
