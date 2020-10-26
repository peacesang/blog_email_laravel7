

 <!-- Blog Search Well -->
 <div class="well">
        <h4>Blog Search</h4>
        <form action="/frontend/getsearch" method="POST">
        <div class="input-group">
           
            <input type="text" class="form-control" name="keyword">
               
            <span class="input-group-btn">
                <button class="btn btn-default" >
                    <span class="glyphicon glyphicon-search float-right" type="submit"></span>
            </button>
            </span>
           @csrf
            </form>
        </div>
        <!-- /.input-group -->
    </div>

<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-6">
            <ul class="list-unstyled">
                @foreach(App\Category::all() as $category)
            <li><a href="/frontend/categoryposts/{{$category->id}}">{{$category->name}}</a>
                </li>
                
                @endforeach
            </ul>
        </div>
      
       
    </div>
    <!-- /.row -->
</div>

  <!-- Side Widget Well -->
  <div class="well">
    <h4>Side Widget Well</h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
</div>