@extends('admin.main')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Category Page
            <small>Subheading</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Blank Page
            </li>
        </ol>

        <nav class="navbar navbar-inverse">
            <ul class="nav navbar-nav">
                <li><a href="/posts">View all Posts</a></li>
                <li><a href="posts/create">Create new Posts</a></li>

            </ul>
        </nav>

        @if(count($posts)>0)
        <div class="panel panel-default">
            <div class="panel-heading">
                All Post
            </div>
        </div>

        <div class="panel panel-default">
            <table class="table table-striped task-table">
                <thead>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>image</th>
                    <th>Published by:</th>
                    <th>&nbsp</th>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                    <td><div>{{$post->title}}</div></td>
                    <td><div>{{$post->author}}</div></td>
                    <td><div>{{$post->category->name}}</div></td>
                    <td><div><img src="images/posts/{{$post->image}}" class="img-responsive img-thumbnail" width="200px"></div></td>
                    <td><div>{{$post->user->name}}</div></td>
                    <td><a href="/posts/{{$post->id}}/edit">Edit</a></td>
                    <td><form method="POST" action="/posts/{{$post->id}}">
                        <button type="submit" class="btn btn-danger">Delete</button>
                        @csrf
                        @method('DELETE')
                    </form></td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        @endif

    </div>
</div>
<!-- /.row -->
@endsection