@extends('layouts.app')
@section('title','Articles')
@section('content')
<div class="container">
    <div class="row justify-content-center">
                <div class="col-12">


                <section id="menus" class="mb-5">
                <input type="text" class="form-control" placeholder="Enter Article title">
                </section>
                <table class="table  table-hover ">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">User</th>
      <th scope="col">Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($articles as $article)
    <tr>
      <th scope="row">{{$article->article_id}}</th>
      <td><a href="/c/{{$article->article_slug}}"  class="btn btn-light">{{$article->article_title}}</a></td>
      <td><a href="/{{$article->username}}"  class="btn btn-light">{{$article->username}}</a></td>
      <td><p class="btn btn-info">{{ \Carbon\Carbon::parse($article->created_at)->diffForHumans() }}</p></td>
      <td>
      {{Helper::delete_post_admin($article->article_id)}}
     
      <a href="/admin/dashboard/articles/delete/{{$article->article_id}}"  class="btn btn-warning">Send report</a>
      <a href="/admin/dashboard/articles/sendreport/{{$article->article_id}}"  class="btn btn-danger">Send report</a>
    </td>
    </tr>
    <tr>
      @endforeach
     
  </tbody>
</table>
{{ $articles->links() }}

            </div>
        </div>
    </section>
@endsection
