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
                <li><a href="/posts">View all posts</a></li>
                <li><a href="posts/create">Create new post</a></li>

            </ul>
        </nav>


        <div class="panel-body">
                <form action="/posts" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="user_id"  class="form-control" value="{{Auth::user()->id}}">                        
                    

                    <div class="form-group">
                        <label for="title" class="col-sm-2 col-form-label">Post title</label>
                        
                        <input type="text" name="title"  class="form-control" >
                        
                    </div>
                    <div class="form-group">
                        <label for="categoryname" class="col-sm-2 col-form-label">Category name</label>
                        
                        
                       
                        <select class="form-control" name="category_id">
                                @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>    
                            @endforeach                           
                        </select>                        
                      
                        
                    </div>
                    <div class="form-group">
                        <label for="author" class="col-sm-2 col-form-label">Author</label>
                        
                        <input type="text" name="author"  class="form-control" >
                        
                    </div>
                    <div class="form-group">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        
                        <input type="file" name="image"  class="form-control" >
                        
                    </div>
                    <div class="form-group">
                        <label for="short_desc" class="col-sm-2 col-form-label">Short Description</label>
                        <textarea class="form-control" name="short_desc"  rows="3"></textarea>
                                               
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-2 col-form-label"> Description</label>
                        <textarea class="form-control" name="description" rows="5"></textarea>
                                                
                    </div>
                    


                    <button type="submit" class="btn btn-primary">Add</button>
                    @csrf
                   
                    
                </form>

        </div>

    </div>
</div>
<!-- /.row -->
@endsection