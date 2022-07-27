@extends('layouts.app') @section('title',app('request')->zoomsearch)


@section('head')
<meta name="description" content="{{Helper::keyword_maker($request->zoomsearch)}}">
  <meta name="keywords" content="{{Helper::keyword_maker($request->zoomsearch)}}">
  
@endsection

@section('content')

<div class="row justify-content-center mt-4">

    <form method="POST" action="/zs/post">
        @csrf
        <input type="text" value="{{$request->zoomsearch}}" class="form-control form-control-lg mb-4 mt-5" placeholder="Type and search in all over the internet" aria-label="Search" name="zoomsearch" id="zoomsearch" autocomplete="off" />
    </form>



<div class="row">
<h1>{{$request->zoomsearch}}</h1>

<div class="col-md-4 col-1">
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-2">Result for Web</h6>
    <a href="https://duckduckgo.com/?q={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/icons8-duckduckgo-100.png" width="45px" class="zoom" /></a>
    <a href="https://www.bing.com/search?q={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/icons8-bing-100.png" width="45px" class="zoom" /></a>
    <a href="https://yandex.com/search/?text={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/yandex_logo_icon_170668.png" width="35px" class="zoom" /></a>
    <a href="https://www.ecosia.org/search?q={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/icons8-ecosia-100.png" width="45px" class="zoom" /></a>
    <a href="https://last.today/search/{{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/lt.png" width="40px" class="zoom" /></a>
    <a href="https://www.qwant.com/?q={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/qwant.png" width="45px" class="zoom" /></a>
    <a href="https://www.google.com/search?q={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/icons8-google-100.png" width="45px" class="zoom" /></a>

     </div>

</div>


<div class="col-md-6 col-1">
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-2">Result for Top Sites</h6>
    <a href="https://twitter.com/search?q={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/icons8-twitter-100 (1).png" width="45px" class="zoom" /></a>
    <a href="https://www.youtube.com/results?search_query={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/icons8-youtube-100.png" width="45px" class="zoom" /></a>
    <a href="https://www.instagram.com/explore/tags/{{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/icons8-instagram-100.png" width="45px" class="zoom" /></a>
    <a href="https://www.facebook.com/search/top/?q={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/icons8-facebook-100 (1).png" width="45px" class="zoom" /></a>
    <a href="https://www.linkedin.com/search/results/all/?keywords={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/icons8-linkedin-100 (1).png" width="45px" class="zoom" /></a>
    <a href="https://www.reddit.com/search?q={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/849484_reddit_512x512.png" width="45px" class="zoom" /></a>
    <a href="https://en.wikipedia.org/w/index.php?search={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/icons8-wikipedia-logo-100.png" width="45px" class="zoom" /></a>
    <a href="https://www.britannica.com/search?query={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/britannica.png" width="45px" class="zoom" /></a>
    <a href="https://linktr.ee/{{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/icons8-linktree-100.png" width="45px" class="zoom" /></a>
    <a href="https://archive.org/search.php?query={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/icons8-archive-100.png" width="45px" class="zoom" /></a>
    </div>
</div>



<div class="col-md-6">
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-2">Result for News</h6>
    <a href="https://www.cnn.com/search/?q={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/cnn.png" width="45px" class="zoom" /></a>
    <a href="http://www.foxnews.com/search-results/search?q={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/foxnews.png" width="45px" class="zoom" /></a>
    <a href="https://www.bbc.co.uk/search?q={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/icons8-bbc-100.png" width="45px" class="zoom" /></a>
    <a href="http://www.cbc.ca/search?q={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/CBCca.png" width="45px" class="zoom" /></a>
    <a href="http://nationalpost.com/?s={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/nationalpost.png" width="45px" class="zoom" /></a>
    <a href="https://www.nytimes.com/search?query={{app('request')->zoomsearch}}" target="_blank"> <img src="/images/icons/nyt.png" width="45px" class="zoom" /></a>
    <a href="https://www.dailymail.co.uk/s/h/search.html?sel=site&amp;searchPhrase={{app('request')->zoomsearch}}" target="_blank"> <img src="/images/icons/dailymail.png" width="45px" class="zoom" /></a>
    <a href="https://www.independent.co.uk/topic/{{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/independent.png" width="45px" class="zoom" /></a>
    <a href="https://www.newyorker.com/search/q/{{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/aljazeera.png" width="45px" class="zoom" /></a>
    <a href="https://www.aljazeera.com/search/{{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/new yorker.png" width="45px" class="zoom" /></a>
    <a href="https://www.aljazeera.com/search/{{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/france24.png" width="45px" class="zoom" /></a>
     </div>

</div>



<div class="col-md-4">
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-2">Result for Music</h6>
    <a href="https://open.spotify.com/search/{{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/icons8-spotify-100 (1).png" width="45px" class="zoom" /></a>
    <a href="https://soundcloud.com/search?q={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/icons8-soundcloud-100.png" width="45px" class="zoom" /></a>
    <a href="https://www.allmusic.com/search/all/{{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/allmusic.png" width="45px" class="zoom" /></a>
    <a href="https://search.azlyrics.com/search.php?q={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/az.png" width="45px" class="zoom" /></a>
    <a href="https://www.last.fm/search?q={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/icons8-lastfm-100.png" width="45px" class="zoom" /></a>
     </div>

</div>

<div class="col-md-4">
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-2">Result for Movie</h6>
    <a href="http://www.imdb.com/find?ref_=nv_sr_fn&amp;q={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/icons8-imdb-100.png" width="45px" class="zoom" /></a>
    <a href="https://www.netflix.com/search?q={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/icons8-netflix-100.png" width="45px" class="zoom" /></a>
    <a href="https://www.apple.com/ca/search/{{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/apple.png" width="45px" class="zoom" /></a>
    <a href="https://www.rottentomatoes.com/search/?search={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/rottentomatoes.png" width="45px" class="zoom" /></a>
     </div>

</div>



<div class="col-md-4">
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-2">Result for Sport</h6>
    <a href="https://www.espn.com/search/_/q/{{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/icons8-espn-100.png" width="45px" class="zoom" /></a>
    <a href="https://www.skysports.com/search?q={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/skysports.png" width="45px" class="zoom" /></a>
    <a href="https://www.si.com/search?query={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/si.png" width="45px" class="zoom" /></a>
     </div>

</div>



<div class="col-md-4">
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-2">Result for Shop</h6>
    <a href="https://www.amazon.com/s/?field-keywords={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/icons8-amazon-100.png" width="45px" class="zoom" /></a>
    <a href="https://www.ebay.com/sch/i.html?_nkw={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/icons8-ebay-100.png" width="45px" class="zoom" /></a>
    <a href="http://www.ikea.com/ca/en/search/?query={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/icons8-ikea-100.png" width="45px" class="zoom" /></a>
    <a href="https://www.etsy.com/search?q={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/icons8-etsy-100.png" width="35px" class="zoom" /></a>
    <a href="https://www.kohls.com/search.jsp?submit-search=web-regular&amp;search={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/kohls.png" width="45px" class="zoom" /></a>
    <a href="https://www.overstock.com/search?keywords={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/overstock.png" width="45px" class="zoom" /></a>
  
     </div>

</div>



<div class="col-md-4">
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-2">Result for Photo</h6>
    <a href="https://www.pinterest.com/search/pins/?q={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/icons8-pinterest-100.png" width="45px" class="zoom" /></a>
    <a href="https://www.tumblr.com/search/d{{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/icons8-tumblr-100.png" width="45px" class="zoom" /></a>
    <a href="https://dribbble.com/search?q={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/icons8-dribbble-100.png" width="45px" class="zoom" /></a>
    <a href="https://giphy.com/search/{{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/giphyicon.png" width="45px" class="zoom" /></a>
    <a href="https://imgur.com/search?q={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/icons8-imgur-100.png" width="45px" class="zoom" /></a>
    <a href="https://www.pexels.com/search/{{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/pexels.png" width="45px" class="zoom" /></a>
    <a href="http://www.istockphoto.com/photos/{{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/istockphoto-logo-EE5A2AB2C7-seeklogo.com.png" width="45px" class="zoom" /></a>
     </div>

</div>




<div class="col-md-4">
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-2">Result for Developer</h6>
    <a href="https://www.fiverr.com/search/gigs?query={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/icons8-fiverr-100.png" width="45px" class="zoom" /></a>
    <a href="https://stackoverflow.com/search?q={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/stackoverflow.png" width="45px" class="zoom" /></a>
    <a href="https://stackexchange.com/search?q={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/stackexchange.png" width="45px" class="zoom" /></a>
    <a href="https://github.com/search?q={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/icons8-github-100.png" width="45px" class="zoom" /></a>
    <a href="https://codepen.io/search/pens?q={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/icons8-codepen-100.png" width="45px" class="zoom" /></a>
    <a href="https://sourceforge.net/directory/os:mac/?q={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/sourceforge.png" width="45px" class="zoom" /></a>
    <a href="https://www.quora.com/search?q={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/icons8-quora-is-a-place-to-gain-and-share-knowledge-100.png" width="45px" class="zoom" /></a>
     </div>

</div>

<div class="col-md-4">
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-2">Result for Finance</h6>
    <a href="https://finance.yahoo.com/lookup?s={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/yahoo finance.png" width="45px" class="zoom" /></a>
    <a href="https://www.investopedia.com/search?q={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/investopedia.png" width="45px" class="zoom" /></a>
    <a href="https://www.forbes.com/search/?q={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/forbes.png" width="45px" class="zoom" /></a>
    <a href="http://www.businessinsider.com/s?q={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/businessinsider.png" width="45px" class="zoom" /></a>
    <a href="https://hn.algolia.com/?query={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/investopedia.png" width="45px" class="zoom" /></a>
    <a href="http://www.ibtimes.com/search/site/{{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/ibtimes.png" width="45px" class="zoom" /></a>
    <a href="https://seekingalpha.com/search/?q={{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/seekingalpha.png" width="45px" class="zoom" /></a>
     </div>

</div>


<div class="col-md-4">
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-2">Result for Home</h6>
    <a href="https://www.houzz.com/photos/query/{{app('request')->zoomsearch}}" target="_blank">
        <img src="/images/icons/icons8-houzz-mobile-apps-feature-photos-of-decoration-and-home-improvement.-100.png" width="35px" class="zoom" />
    </a>
    <a href="https://www.dwell.com/discover/{{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/d.png" width="45px" class="zoom" /></a>
    <a href="http://www.homedepot.com/s/{{app('request')->zoomsearch}}" target="_blank"><img src="/images/icons/homedepot.png" width="45px" class="zoom" /></a>
     </div>

</div>



<!-- 
<div class="review">
            <div xmlns:v="http://rdf.data-vocabulary.org/#" typeof="v:Review">
                <span property="v:itemreviewed">John Doe</span>
                Reviewed by
                <span property="v:reviewer">QMP</span> on
                <span property="v:dtreviewed" content="2012-09-10">25 nov</span>.
                <span property="v:summary">Wordpress Templates</span>
                <span property="v:description">Teach branding , Reviewing big brands</span>
                <span property="v:rating">5.0</span>
            </div>
        </div>
 -->


 <!-- AddToAny BEGIN -->
 <div class="a2a_kit a2a_kit_size_32 a2a_default_style mt-5 mb-5" data-a2a-url="{{ url('/') }}/zs" data-a2a-title="With Zoom Search, you will reach your search goal faster">
            <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
            <a class="a2a_button_facebook"></a>
            <a class="a2a_button_twitter"></a>
            <a class="a2a_button_email"></a>
            <a class="a2a_button_whatsapp"></a>
            <a class="a2a_button_linkedin"></a>
            <a class="a2a_button_telegram"></a>
            <a class="a2a_button_facebook_messenger"></a>
            <a class="a2a_button_reddit"></a>
            <a class="a2a_button_google_gmail"></a>
            <a class="a2a_button_copy_link"></a>
            <a class="a2a_button_digg"></a>
            <a class="a2a_button_print"></a>
            <a class="a2a_button_viber"></a>
            <a class="a2a_button_trello"></a>
            <a class="a2a_button_skype"></a>
        </div>
        <script>
            var a2a_config = a2a_config || {};
            a2a_config.onclick = 1;
            a2a_config.num_services = 6;
        </script>
        <script async src="https://static.addtoany.com/menu/page.js"></script>
        <!-- AddToAny END -->

<div class="col-md-12">
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-2">Random Search</h6>
    @foreach(Helper::get_random_search() as $row)
                      @if(strlen($row->search_query) > 10)
            <a href="/tags/{{Helper::url_slug($row->search_query)}}" class="btn btn-dark me-1 mb-1 btn-sm">{{$row->search_query}}</a>
          @endif
            @endforeach
     </div>

</div>





</div>

  











        <div class="list-group mt-2">
       
        <p class="card-body text-start mt-3">
        @if(!empty($tag_results))
       @foreach($tag_results as $tag_results_row)
        <a href="/s/hashtags/{{encrypt($tag_results_row->hashtag_title)}}" class="btn btn-light btn-lg zoom me-1 mb-2" target="_blank"><i class="fa-solid fa-hashtag"></i> {{$tag_results_row->hashtag_title}}</a>
       @endforeach
       @endif
       @if(!empty($article_results))
       @foreach($article_results as $article_results_row)
        <a href="/c/{{$article_results_row->article_slug}}" class="btn btn-light btn-lg zoom me-1 mb-2" target="_blank"><i class="fa-solid fa-blog"></i> {{$article_results_row->article_title}}</a>
       @endforeach
       @endif
        
       @if(!empty($product_results))
       @foreach($product_results as $product_results_row)
        <a href="xs" class="btn btn-light btn-lg zoom me-1 mb-2" target="_blank"><i class="fa-brands fa-product-hunt"></i> {{$product_results_row->product_name}}</a>
       @endforeach
       @endif


       <div class="row">
       @if(!empty($results))
       @foreach($results as $results_row)
        <article class="col-md-6 card mb-2">
        <a href="{{$results_row->link}}" target="_blank"><h2><i class="fa-brands fa-searchengin"></i> {{$results_row->title}}</h2></a>
</article>
       @endforeach

       @endif
</div>
       
       

       

</p></div>


    </div>





  

       
   

    @endsection
</div>
