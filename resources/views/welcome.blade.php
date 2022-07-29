@extends('layouts.app') @section('title','Home') @section('content')








<section class="row justify-content-center">
<div class="row text-center">



<div class="col-md-12 text-center">


<div class="justify-content-center p-4">


                  

                    <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Search Area</h6>
                                </div>
                                <div class="card-body">
                          
                                    
<form class="d-flex" action="/zs/post" method="POST">
                    @csrf
                        <div class="search-icon">
                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 21.5 21.5">
                                <path d="M11.5,1.25A10.25,10.25,0,1,0,21.75,11.5,10.26,10.26,0,0,0,11.5,1.25Zm0,19a8.75,8.75,0,1,1,8.75-8.75A8.76,8.76,0,0,1,11.5,20.25Z"
                                      transform="translate(-1.25 -1.25)"></path>
                                <path d="M22.53,21.47l-2-2a.75.75,0,0,0-1.06,1.06l2,2a.75.75,0,0,0,1.06,0A.75.75,0,0,0,22.53,21.47Z"
                                      transform="translate(-1.25 -1.25)"></path>
                            </svg>
                        </div>
                        <input class="form-control bg-light form-control-lg search-form-control me-2" type="text" placeholder="Type whatever you want here and get the best result" aria-label="Search" name="zoomsearch" id="zoomsearch" autocomplete="off">
                     
                    </form>
                
                    </div></div>
                   

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Trend Search</h6>
                                </div>
                                <div class="card-body  text-start">
                            
                                    @foreach(Helper::trend_search(131) as $row)
                      @if(strlen($row->search_query) > 10)
                      <a href="/{{Helper::url_slug($row->search_query)}}" class="btn btn-primary btn-icon-split mb-2">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-info-circle"></i>
                                        </span>
                                        <span class="text">{{$row->search_query}}</span>
                                    </a>
          @endif
            @endforeach

            @foreach($searches as $searche)
            <a href="/{{Helper::url_slug($searche->search_query)}}" class="btn btn-primary btn-icon-split mb-2">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-info-circle"></i>
                                        </span>
                                        <span class="text">{{$searche->search_query}}</span>
                                    </a>
            @endforeach

            {{$searches->links()}}

                                </div>
                            </div>
        


                   
        
        
 </div>
</div>
</section>





@endsection
