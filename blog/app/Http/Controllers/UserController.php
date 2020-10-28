<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;
use App\Rules\MatchOldPassword;

class UserController extends Controller
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
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $user=User::find($id);
        return view('auth.change_password')->with('user',$user);
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
        $this->validate($request,[
            'current_password' => ['required',new MatchOldPassword],

            'new_password' => ['required'],

            'new_confirm_password' => ['same:new_password'],            
        ]);
        $user=User::find($id);
        
        $user->update(['password'=> Hash::make($request->new_password)]);
        return redirect('/users/'.Auth::user()->id.'/edit')->with('success','password successfully changed');
        
        // if(Hash::check($requestData->password, $current_password))
        // {
        //     $user->fill([
        //         'new_password'=>Hash::make($request->new_password)
        //         ])->save();
        //         return redirect('/users/'.Auth::user()->id.'/edit')->with('success','password successfully changed');
        // }
        // else
        // {
        //     return redirect('/users/'.Auth::user()->id.'/edit')->with('error','make sure your current password is correct');
        // }
      

        // $user=User::find($id);

       
        // $user->password=$request->password;
        // $user->save();
        

        
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
    }
}
