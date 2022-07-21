@extends('layouts.app')
@section('title','Feeds')
@section('content')
    <div class="row justify-content-center">
                <div class="col-12">


                <section id="search" class="mb-5">
                <input type="text" class="form-control" placeholder="Enter Username">
                </section>


                <section id="add new" class="mb-5">
                <form method="POST" class="row" action="/admin/dashboard/feed/new">
                  @csrf
                <div class="col-md-4">
                  <input type="url" class="form-control mb-1" placeholder="Enter feed Url" name="url">  
                  </div>
                  <div class="col-md-4">
                  <input type="text" class="form-control mb-1" placeholder="Enter Category" name="category">  
                  </div>
                  <div class="col-md-4">
                  <input type="text" class="form-control mb-1" placeholder="Enter feed Lang" name="lang" value="{{ app()->getLocale() }}">  
                  </div>
                  <input type="submit" class="btn btn-success mt-2 w-25" value="Add">
                </form>
                </section>




                <table class="table  table-hover ">

  <thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">Name</th>
    <th scope="col">Category</th>
    <th scope="col">Lang</th>
    <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
    @foreach($list as $list_row)
    <tr>
    <th scope="row"><p class="btn btn-light">{{$list_row->feed_id}}</p></th>
    <th scope="row"><a href="{{$list_row->feed_url}}" target="_blank"><p class="btn btn-light">{{$list_row->feed_title}}</a></p></th>
    <th scope="row"><a href="/s/hashtags/{{$list_row->feed_category}}" target="_blank"><p class="btn btn-info">{{$list_row->feed_category}}</a></p></th>
    <th scope="row"><p class="btn btn-light">{{$list_row->feed_lang}}</p></th>
    <th scope="row"><a href="/s/admin/feedreader/{{$list_row->feed_id}}" class="btn btn-success" target="_blank">Run</a></th>
    <th scope="row"><a href="/admin/dashboard/feed/delete/{{$list_row->feed_id}}" class="btn btn-danger">Delete</a></th>
     
    
    </tr>
    <tr>
      @endforeach
     
  </tbody>
</table>
{{ $list->links() }}

            </div>
@endsection
