@extends('layouts.app') @section('title',app('request')->zoomsearch)


@section('head')
<meta name="description" content="{{Helper::keyword_maker($request->zoomsearch)}}">
  <meta name="keywords" content="{{Helper::keyword_maker($request->zoomsearch)}}">
  

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
@endsection

@section('content')







<div class="container-fluid">

                    <!-- Page Heading -->
                    
                    <div class="card mb-4 py-3 border-left-info">
                    <h1 class="card-body h3 mb-1 text-gray-800 text-uppercase">Result for {{$request->zoomsearch}}</h1>
                                <div class="card-body h2 text-gray-800">
                                Get results faster!<br>
Find category you want and click on the available resources.
                                </div>
                            </div>
                   

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Border Left Utilities -->
                        <div class="col-lg-6">

                            <div class="card mb-4 py-3 border-left-primary">
                                <div class="card-body  text-uppercase">
                                <h6 class="card-body h3 mb-1 text-gray-800 text-uppercase">Web</h6>
    <a href="https://duckduckgo.com/?q={{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2  h">duckduckgo</a>
    <a href="https://www.bing.com/search?q={{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">bing</a>
    <a href="https://yandex.com/search/?text={{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">yandex</a>
    <a href="https://www.ecosia.org/search?q={{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">ecosia</a>
    <a href="https://last.today/search/{{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">last.today</a>
    <a href="https://www.qwant.com/?q={{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">qwant</a>
    <a href="https://www.google.com/search?q={{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">google</a>
                                </div>
                            </div>

                          

                            <div class="card mb-4 py-3 border-left-success">
                                <div class="card-body    text-uppercase">
                                <h6 class="card-body h3 mb-1 text-gray-800 text-uppercase">News</h6>
                                <a href="https://www.cnn.com/search/?q={{app('request')->zoomsearch}}"  target="_blank" class="btn btn-info me-2 mb-2">cnn</a>
    <a href="http://www.foxnews.com/search-results/search?q={{app('request')->zoomsearch}}"  target="_blank" class="btn btn-info me-2 mb-2">foxnews</a>
    <a href="https://www.bbc.co.uk/search?q={{app('request')->zoomsearch}}"  target="_blank" class="btn btn-info me-2 mb-2">bbc</a>
    <a href="http://www.cbc.ca/search?q={{app('request')->zoomsearch}}"  target="_blank" class="btn btn-info me-2 mb-2">cbc</a>
    <a href="http://nationalpost.com/?s={{app('request')->zoomsearch}}"  target="_blank" class="btn btn-info me-2 mb-2">nationalpost</a>
    <a href="https://www.nytimes.com/search?query={{app('request')->zoomsearch}}"  target="_blank" class="btn btn-info me-2 mb-2">nytimes</a>
    <a href="https://www.dailymail.co.uk/s/h/search.html?sel=site&amp;searchPhrase={{app('request')->zoomsearch}}"  target="_blank" class="btn btn-info me-2 mb-2">dailymail</a>
    <a href="https://www.independent.co.uk/topic/{{app('request')->zoomsearch}}"  target="_blank" class="btn btn-info me-2 mb-2">independent</a>
    <a href="https://www.newyorker.com/search/q/{{app('request')->zoomsearch}}"  target="_blank" class="btn btn-info me-2 mb-2">newyorker</a>
    <a href="https://www.aljazeera.com/search/{{app('request')->zoomsearch}}"  target="_blank" class="btn btn-info me-2 mb-2">aljazeera</a>
                                </div>
                            </div>

                            <div class="card mb-4 py-3 border-left-info">
                                <div class="card-body text-uppercase">
                                <h6 class="card-body h3 mb-1 text-gray-800 text-uppercase">Movie</h6>
                                <a href="http://www.imdb.com/find?ref_=nv_sr_fn&amp;q={{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">imdb</a>
    <a href="https://www.netflix.com/search?q={{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">netflix</a>
    <a href="https://www.apple.com/ca/search/{{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">apple</a>
    <a href="https://www.rottentomatoes.com/search/?search={{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">rottentomatoes</a>
                                </div>
                            </div>

                            <div class="card mb-4 py-3 border-left-warning">
                            <div class="card-body text-uppercase">
                            <h6 class="card-body h3 mb-1 text-gray-800 text-uppercase">Shop</h6>
                            <a href="https://www.amazon.com/s/?field-keywords={{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">amazon</a>
    <a href="https://www.ebay.com/sch/i.html?_nkw={{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">ebay</a>
    <a href="http://www.ikea.com/ca/en/search/?query={{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">ikea</a>
    <a href="https://www.etsy.com/search?q={{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">etsy</a>
    <a href="https://www.kohls.com/search.jsp?submit-search=web-regular&amp;search={{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">kohls</a>
    <a href="https://www.overstock.com/search?keywords={{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">overstock</a>

                                </div>
                            </div>

                            <div class="card mb-4 py-3 border-left-danger">
                            <div class="card-body text-uppercase">
                                <h6 class="card-body h3 mb-1 text-gray-800 text-uppercase">Developer</h6>
    <a href="https://www.fiverr.com/search/gigs?query={{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">fiverr</a>
    <a href="https://stackoverflow.com/search?q={{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">stackoverflow</a>
    <a href="https://stackexchange.com/search?q={{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">stackexchange</a>
    <a href="https://github.com/search?q={{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">github</a>
    <a href="https://codepen.io/search/pens?q={{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">codepen</a>
    <a href="https://sourceforge.net/directory/os:mac/?q={{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">sourceforge</a>
    <a href="https://www.quora.com/search?q={{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">quora</a>
                                </div>
                            </div>

                            <div class="card mb-4 py-3 border-left-dark">
                            <div class="card-body text-uppercase">
                            <h6 class="card-body h3 mb-1 text-gray-800 text-uppercase">Home</h6>
                            <a href="https://www.houzz.com/photos/query/{{app('request')->zoomsearch}}"  target="_blank" class="btn btn-info me-2 mb-2">houzz</a>
    <a href="https://www.dwell.com/discover/{{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">dwell</a>
    <a href="http://www.homedepot.com/s/{{app('request')->zoomsearch}}"  target="_blank" class="btn btn-info me-2 mb-2">homedepot</a>
                                </div>
                            </div>

                        </div>

                        <!-- Border Bottom Utilities -->
                        <div class="col-lg-6">


                        <div class="card mb-4 py-3 border-left-secondary">
                                <div class="card-body   text-uppercase">
                                <h6 class="card-body h3 mb-1 text-gray-800 text-uppercase">Top Sites</h6>
    <a href="https://twitter.com/search?q={{app('request')->zoomsearch}}"target="_blank" class="btn btn-info me-2 mb-2">twitter</a>
    <a href="https://www.youtube.com/results?search_query={{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">youtube</a>
    <a href="https://www.facebook.com/search/top/?q={{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">facebook</a>
    <a href="https://www.linkedin.com/search/results/all/?keywords={{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">linkedin</a>
    <a href="https://www.reddit.com/search?q={{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">reddit</a>
    <a href="https://en.wikipedia.org/w/index.php?search={{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">wikipedia</a>
    <a href="https://www.britannica.com/search?query={{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">britannica</a>
    <a href="https://archive.org/search.php?query={{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">archive</a>
                                </div>
                            </div>


                            <div class="card mb-4 py-3 border-bottom-primary">
                            <div class="card-body text-uppercase">
                                <h6 class="card-body h3 mb-1 text-gray-800 text-uppercase">Music</h6>
                                <a href="https://open.spotify.com/search/{{app('request')->zoomsearch}}"  target="_blank" class="btn btn-info me-2 mb-2">spotify</a>
    <a href="https://soundcloud.com/search?q={{app('request')->zoomsearch}}"  target="_blank" class="btn btn-info me-2 mb-2">soundcloud</a>
    <a href="https://www.last.fm/search?q={{app('request')->zoomsearch}}"  target="_blank" class="btn btn-info me-2 mb-2">last.fm</a>
    <a href="https://www.allmusic.com/search/all/{{app('request')->zoomsearch}}"  target="_blank" class="btn btn-info me-2 mb-2">allmusic</a>
    <a href="https://search.azlyrics.com/search.php?q={{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">azlyrics</a>
                                </div>
                            </div>

                            <div class="card mb-4 py-3 border-bottom-secondary">
                            <div class="card-body text-uppercase">
                            <h6 class="card-body h3 mb-1 text-gray-800 text-uppercase">Sport</h6>
                            <a href="https://www.espn.com/search/_/q/{{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">espn</a>
    <a href="https://www.skysports.com/search?q={{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">skysports</a>
    <a href="https://www.si.com/search?query={{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">si</a>
                                </div>
                            </div>

                            <div class="card mb-4 py-3 border-bottom-success">
                            <div class="card-body text-uppercase">
                            <h6 class="card-body h3 mb-1 text-gray-800 text-uppercase">Photo</h6>
                            <a href="https://www.pinterest.com/search/pins/?q={{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">pinterest</a>
    <a href="https://www.tumblr.com/search/d{{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">tumblr</a>
    <a href="https://dribbble.com/search?q={{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">dribbble</a>
    <a href="https://giphy.com/search/{{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">giphy</a>
    <a href="https://imgur.com/search?q={{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">imgur</a>
    <a href="https://www.pexels.com/search/{{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">pexels</a>
    <a href="http://www.istockphoto.com/photos/{{app('request')->zoomsearch}}" target="_blank" class="btn btn-info me-2 mb-2">istockphoto</a>
                                </div>
                            </div>

                            <div class="card mb-4 py-3 border-bottom-info">
                            <div class="card-body text-uppercase">
                            <h6 class="card-body h3 mb-1 text-gray-800 text-uppercase">Finance</h6>
    <a href="https://finance.yahoo.com/lookup?s={{app('request')->zoomsearch}}"  target="_blank" class="btn btn-info me-2 mb-2">yahoo finance</a>
    <a href="https://www.investopedia.com/search?q={{app('request')->zoomsearch}}"  target="_blank" class="btn btn-info me-2 mb-2">investopedia</a>
    <a href="https://www.forbes.com/search/?q={{app('request')->zoomsearch}}"  target="_blank" class="btn btn-info me-2 mb-2">forbes</a>
    <a href="http://www.businessinsider.com/s?q={{app('request')->zoomsearch}}"  target="_blank" class="btn btn-info me-2 mb-2">businessinsider</a>
    <a href="https://hn.algolia.com/?query={{app('request')->zoomsearch}}"  target="_blank" class="btn btn-info me-2 mb-2">algolia</a>
    <a href="http://www.ibtimes.com/search/site/{{app('request')->zoomsearch}}"  target="_blank" class="btn btn-info me-2 mb-2">ibtimes</a>
    <a href="https://seekingalpha.com/search/?q={{app('request')->zoomsearch}}"  target="_blank" class="btn btn-info me-2 mb-2">seekingalpha</a>
                                </div>
                            </div>

                            <div class="card mb-4 py-3 border-bottom-warning">
                            <div class="card-body text-uppercase">
                           <h6 class="card-body h3 mb-1 text-gray-800 text-uppercase">Holy Book</h6>
                           <a href="https://www.jw.org/en/search/?q={{app('request')->zoomsearch}}"  target="_blank" class="btn btn-info me-2 mb-2">jw</a>
    <a href="https://www.bible.com/search/bible?query={{app('request')->zoomsearch}}"  target="_blank" class="btn btn-info me-2 mb-2">bible</a>
    <a href="https://quran.com/search?page=1&q={{app('request')->zoomsearch}}"  target="_blank" class="btn btn-info me-2 mb-2">quran</a>

                                </div>
                            </div>

                           

                        </div>

                    </div>





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

        <div class="card mb-4 py-3 border-bottom-warning">
                            <div class="card-body text-uppercase">
                           <h6 class="card-body h3 mb-1 text-gray-800 text-uppercase">Random searches</h6>


                           @foreach(Helper::get_random_search() as $row)
                      @if(strlen($row->search_query) > 10)
                           <a href="/tags/{{Helper::url_slug($row->search_query)}}" class="btn btn-primary btn-icon-split mb-2">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-info-circle"></i>
                                        </span>
                                        <span class="text">{{$row->search_query}}</span>
                                    </a>

                            @endif
            @endforeach

 


    @endsection

