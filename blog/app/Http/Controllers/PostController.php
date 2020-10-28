<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use auth;
class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts=new Post;
       // $posts=$posts::all();
       $posts=Post::with('category','user')->get();
       //return $posts;
       return view("post.index")->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories=new Category;
       $categories= $categories::all();
       // return $categories;
        return view('post.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'category_id'=>'required|integer',     
            'user_id'=>'required|integer', 
            'title'=>'required|max:40|min:3',
            'author'=>'required|max:30|min:3', 
            'image'        =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048',   
            'short_desc'=>'required|max:1000|min:3',
            'description'=>'required|min:3',     
        ]);

        // $image=$request->file('image');
        // $upload='/img/posts/';
        // $filename=time().$image->getClientOriginalName();
        // $path=move_uploaded_file($image->getPathName(),$upload.$filename);

        $imageName = time().'.'.$request->image->extension();     
        $request->image->move(public_path('images/posts'), $imageName);

        $post= new Post;
        $post->category_id=$request->category_id;
        $post->user_id=$request->user_id;
        $post->title=$request->title;
        $post->author=$request->author;
        $post->image=$imageName;
        $post->short_desc=$request->short_desc;
        $post->description=$request->description;

        
        $post->save();
        

       return redirect('/posts/create')->with('success','post successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
        $post=Post::find($id);
       
        

        
        // return $user;
        
      return view('post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $post=Post::find($id);

        $this->validate($request,[
            'category_id'=>'required|integer',     
            'user_id'=>'required|integer', 
            'title'=>'required|max:40|min:3',
            'author'=>'required|max:30|min:3', 
               
            'short_desc'=>'required|max:1000|min:3',
            'description'=>'required|min:3',     
        ]);

        if($request->has('image'))
        {
            $this->validate($request,[
            'image'        =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
        }

        // $image=$request->file('image');
        // $upload='/img/posts/';
        // $filename=time().$image->getClientOriginalName();
        // $path=move_uploaded_file($image->getPathName(),$upload.$filename);
        if($request->has('image'))
        {
            unlink('images/posts/'.$post->image);
        $imageName = time().'.'.$request->image->extension();     
        $request->image->move(public_path('/images/posts/'), $imageName);
        }
        

       
        $post->category_id=$request->category_id;
        $post->user_id=$request->user_id;
        $post->title=$request->title;
        $post->author=$request->author;
        //$post->image=$imageName;
        $post->short_desc=$request->short_desc;
        $post->description=$request->description;

       
        $post->save();
        

       return redirect('/posts/create')->with('success','post successfully updated');
        //return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post=Post::find($id);
        unlink('images/posts/'.$post->image);
        $post->delete();
        return redirect('/posts')->with('success','sucessfully deleted');
    }
}
