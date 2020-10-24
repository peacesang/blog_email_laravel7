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

        <div class="panel-body">
                <form action="/categories" method="POST">
                    <div class="form-group row">
                        <label for="categoryname" class="col-sm-2 col-form-label">Category name</label>
                        <div class="col-sm-10">
                        <input type="text" name="name"  >
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Add</button>
                    @csrf
                   
                    
                </form>

        </div>

    </div>
</div>
<!-- /.row -->
@endsection