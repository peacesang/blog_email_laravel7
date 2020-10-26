
@extends('frontend.main')
@section('content')
    
@foreach($posts as $post)
    

    <!-- First Blog Post -->
    <h2>
    <a href="/frontend/{{$post->id}}"> {{$post->title}}</a>
    </h2>
    <p class="lead">
        by <a href="index.php">{{$post->author}}</a>
    </p>
    <p><span class="glyphicon glyphicon-time"></span> {{$post->created_at}}</p>
    <hr>
    <a href="/frontend/{{$post->id}}">  <img class="img-responsive" src="/images/posts/{{$post->image}}" alt=""></a>
    <hr>
    <p>{{$post->short_desc}}</p>
    <a class="btn btn-primary" href="/frontend/{{$post->id}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

    <hr>
@endforeach
 
{{$posts->links()}}

    <!-- Pager -->
    {{-- <ul class="pager">
        <li class="previous">
            <a href="#">&larr; Older</a>
        </li>
        <li class="next">
            <a href="#">Newer &rarr;</a>
        </li>
    </ul> --}}

@endsection