<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use DB;
class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      
        //$posts=Post::orderBy('created_at','DESC')->get();
        $posts=Post::orderBy('created_at','DESC')->paginate(3);
        return view('frontend.index')->with('posts',$posts);
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
        $post=Post::find($id);
        return view('frontend.show')->with('post',$post);
    }

    public function showcategoryposts($id)
    {
        //
       $posts=DB::table('posts')->where('category_id','=',$id)->paginate(3);
       // $posts=Post::with('category')->where('category_id',$id)->get(); //this also works
        return view('frontend.index')->with('posts',$posts);
    }

    public function getsearch(Request $request)
    {
        //
       $keyword= $request->keyword;
      
      $posts=Post::where('title','LIKE','%'.$keyword.'%')->paginate(3);
      if($keyword!="")
      {
          return view('frontend.index')->with('posts',$posts);
      }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
}
