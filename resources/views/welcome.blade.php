@extends('layouts.app') @section('title','Home') @section('content')








<section class="row justify-content-center mt-2">
<div class="row text-center mt-2">

<div class="col-md-8 text-start">
<p>


<h1 class="btn btn-info btn-lg"  data-bs-toggle="modal" data-bs-target="#expandyourmindwithlt">Get results faster with {{ config('app.name') }}</h1>
</p>
</div>
<div class="col-md-4 text-end">
<div class="weatherWidget">
	      <div id="loading"></div>
	      <div class="place">
	        <span class="city"></span><span class="country"></span>
	      </div>
	      <div class="temp"></div>
	      <div class="desc"></div>
	      <img id="icon">
	    </div>
</div>

</div>
<div class="col-md-12 text-center mt-2">


<div class="justify-content-center"  style="margin-top:110px;margin-bottom:130px">


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
                        <input class="form-control form-control-lg search-form-control me-2" type="text" placeholder="Type whatever you want here and get the best result" aria-label="Search" name="zoomsearch" id="zoomsearch" autocomplete="off">
                     
                    </form>
                    <br>
                    <div class="text-start"><h3 class="btn btn-info">Trend Search</h3>
                     
                      @foreach(Helper::trend_search(31) as $row)
                      @if(strlen($row->search_query) > 10)
            <a href="/tags/{{Helper::url_slug($row->search_query)}}" class="btn btn-dark me-1 mb-1 btn-sm" >{{$row->search_query}}</a>
          @endif
            @endforeach

            
                    </div>
                    <div id="zoomsearch_list"></div> 
                    
                    
                 
                   

              


        <script type="text/javascript">
            $(document).ready(function () {
             
                $('#zoomsearch').on('keyup',function() {
                    var query = $(this).val(); 
                    $.ajax({
                       
                        url:"/",
                  
                        type:"GET",
                       
                        data:{'zoomsearch':query},
                       
                        success:function (data) {
                          
                            $('#zoomsearch_list').html(data);
                        }
                    })
                    // end of ajax call
                });

                
                $(document).on('click', 'li', function(){
                  
                    var value = $(this).text();
                    $('#zoomsearch').val(value);
                    $('#zoomsearch_list').html("");
                });
            });
        </script>
        
        
 </div>
</div>
</section>





@endsection
