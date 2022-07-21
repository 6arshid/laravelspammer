@extends('layouts.app')
@section('page','Search')
@section('content')
<div class="container">
    <div class="row justify-content-center">
                <div class="col-12">


           @foreach(Helper::trend_search(250) as $row)
            <a href="/s/zs/{{$row->search_query}}" target="_blank" class="btn btn-light me-1 mb-1">{{$row->search_query}}</a>
           @endforeach

           {{ Helper::trend_search(50)->links() }}

        
            </div>
        </div>
    </section>
@endsection
