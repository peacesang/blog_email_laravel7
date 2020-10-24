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
                <li><a href="/categories">View all categories</a></li>
                <li><a href="categories/create">Create new Category</a></li>

            </ul>
        </nav>

        @if(count($categories)>0)
        <div class="panel panel-default">
            <div class="panel-heading">
                All Category
            </div>
        </div>

        <div class="panel panel-default">
            <table class="table table-striped task-table">
                <thead>
                    <th>Category</th>
                    <th>&nbsp</th>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                    <td><div>{{$category->name}}</div></td>
                    <td><a href="/categories/{{$category->id}}/edit">Edit</a></td>
                    <td><form method="POST" action="/categories/{{$category->id}}">
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