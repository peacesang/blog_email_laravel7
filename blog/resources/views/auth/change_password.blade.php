@extends('admin.main')
@section('content')
<h3>Change Password</h3>
<form action="/users/{{$user->id}}" method="POST">
    
  <div class="form-group">
    <label for="exampleInputPassword1">Current Password</label>
    <input type="password" class="form-control" name="current_password" id="password" >
  </div>
    <div class="form-group">
      <label for="exampleInputPassword1">New Password</label>
      <input type="password" class="form-control" name="new_password" id="password" >
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Confirm Password</label>
        <input type="password" class="form-control" name="new_confirm_password" id="confirm_password" >
      </div>
   
    <button type="submit" class="btn btn-primary">Update password</button>
    @csrf
    @method('PUT')
  </form>
@endsection