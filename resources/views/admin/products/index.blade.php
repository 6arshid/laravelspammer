@extends('layouts.app')
@section('title','Products')
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
    @foreach($products as $product)
    <tr>
    <th scope="row">{{$product->product_id}}</th>
    <th scope="row"><a href="">{{$product->product_name}}</a></th>
      
      <td>
     
    </td>
    </tr>
    <tr>
      @endforeach
     
  </tbody>
</table>
{{ $products->links() }}

            </div>
        </div>
    </section>
@endsection
