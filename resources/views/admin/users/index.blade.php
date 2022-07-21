@extends('layouts.app')
@section('title','Users')
@section('content')
<div class="container">
    <div class="row justify-content-center">
                <div class="col-12">


                <section id="menus" class="mb-5">
                <input type="text" class="form-control" placeholder="Enter Username">
                </section>
                <table class="table  table-hover ">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Email</th>
      <th scope="col">Username</th>
      <th scope="col">Type</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td><a href="/{{$user->username}}"  class="btn btn-light">{{$user->email}}</a></td>
      <td><a href="/{{$user->username}}"  class="btn btn-light">{{$user->username}}
        @if($user->suspend == 1)
        <span class="badge bg-warning"> 

        Suspend
        </span>
        @endif
      
    
     
      </a></td>
      <td><a href="/{{$user->username}}"  class="btn btn-light">
        @if($user->is_admin == 1)
        Admin
        @elseif($user->is_admin = 2)
        Moderator
        @else
        Normal
        @endif
      </a></td>
      <td>
       <a href="/admin/dashboard/users/changetomoderator/{{$user->id}}"  class="btn btn-success me-2">Change to moderator</a>
      <a href="/admin/dashboard/users/suspend/{{$user->id}}"  class="btn btn-warning">Suspend</a>
      <a href="/admin/dashboard/users/spam/{{$user->id}}"  class="btn btn-danger">Spam</a></td>
    </tr>
    <tr>
      @endforeach
     
  </tbody>
</table>
{{ $users->links() }}

            </div>
        </div>
    </section>
@endsection
