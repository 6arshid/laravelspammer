<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Vedmant\FeedReader\Facades\FeedReader;
use App\Models\User;
use App\Models\Setting;
use App\Models\Article;
use Helper,Easycodes;
use Image;
use Carbon;
use Auth;
use voku\helper\HtmlDomParser;

class AutomaticController extends Controller
{
    public function feedreader($id){
        $feed_info = DB::table("feeds")->where('feed_id',$id)->first();
        
        $rss = FeedReader::read("$feed_info->feed_url");
        
        foreach ($rss->get_items(0, 20) as $item) { 
      
           $link = $item->get_permalink();

           $url_checker = Helper::feed_search($link);
           if($url_checker == null){
            $title = $item->get_title();
            $content = $item->get_content()."<br> #".$feed_info->feed_category."<br><a href='".$link."' target='_blank'>Read More</a>";
 
            $slug1 = encrypt(uniqid());

 
         //    $query = DB::table('articles')->insert([
         //     'article_type' => 'feed',
         //     'article_title' => $title,
         //     'article_content' => $content,
         //     'article_user_id' => 3,
         //     'article_slug' => mb_strimwidth("$slug1", 0, 99, null)
         // ]);
             $data = new Article;
             $data->article_type = 'feed';
             $data->article_title = $title;
             $data->article_content = $content;
             $data->article_user_id =  3 ;
             $data->article_feedurl =  $link  ;
             $data->article_slug = mb_strimwidth("$slug1", 0, 99, null);
             $data->save();
             preg_match_all("/(#\w+)/", $content, $matches);
             foreach($matches[0] as $matche){
                 $replaced = str_replace('#',null, $matche);
                 $query = DB::table('hashtags')->insert([
                     'hashtag_title' => $replaced,
                     'hashtag_post_id' => $data->id,
                     "created_at" =>  \Carbon\Carbon::now(), 
                 "updated_at" => \Carbon\Carbon::now() 
                 ]);
             }
            
 
             $image_url =  Helper::get_image_thumbnail($link);
             $file_name = Helper::gen_uuid($len=16).md5(uniqid()). ".jpg";
             $img = Image::make($image_url);
             $img->resize(800, 800);
             $img->save("files/images/".$file_name);
             $file_path = "files/images/".$file_name;
       
             $query = DB::table('files')->insert([
                 'file_user_id' => 3,
                 'file_path' => $file_path,
                 'file_content_id' => $data->id,
                 'type' => 'blog'
             ]);
           }


        }
    }
    public function gtrend(){

        $rss = FeedReader::read("https://trends.google.com/trends/hottrends/atom/hourly");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::last_keyword($keyword);
          Helper::gtrnd_k_mkr($keyword);
        }
 
    }
    public function gtrend24(){
      $rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=DK");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }
        $rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=AR");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }
        $rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=AT");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }$rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=BE");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }$rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=BR");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }$rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=CA");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }$rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=CL");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }$rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=CO");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }$rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=CZ");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }$rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=EG");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }$rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=FI");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }$rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=FR");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }$rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=DE");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }$rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=GR");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }$rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=HK");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }$rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=HU");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }$rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=IN");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }$rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=ID");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }$rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=IE");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }
        $rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=IL");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }$rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=JP");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }$rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=IT");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }$rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=KE");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }$rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=MY");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }$rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=MX");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }$rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=NL");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }$rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=NZ");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }$rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=NG");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }$rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=NO");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }$rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=PH");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }$rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=PL");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }$rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=PT");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }$rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=RO");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }$rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=RU");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }$rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=SA");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }$rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=ZA");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }$rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=KR");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }$rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=SE");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }$rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=CH");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }
        $rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=TW");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }
        $rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=TH");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }
        $rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=TR");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }
        $rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=UA");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }
        $rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=US");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }
        $rss = FeedReader::read("https://trends.google.com/trends/trendingsearches/daily/rss?geo=VN");
        foreach ($rss->get_items(0, 20) as $item) { 
           $link = $item->get_permalink();
          $keyword = $item->get_title();
          Helper::gtrnd_k_mkr($keyword);
        }
  }
  public function keyword_maker(){
    $get = DB::table('searches')->where('search_crawl',0)->orderBy("search_id", "ASC")->first();
    $keyword = $get->search_query;
    echo  $keyword;
    Helper::last_keyword_mker_search_crawl($keyword);
    DB::table('searches')->where('search_query',"$keyword")->update(array('search_crawl' => 1,'updated_at' => \Carbon\Carbon::now()));

  }
  public function get_urls($url,$end){
    $x = 1;

    while($x <= $end) {
      
      $url2 = "https://".$url."/page/".$x."/";
      $checker_url = DB::table('urlcrrawlers')->where('uc_url',$url2)->first();
      if(empty($checker_url->ser_url)){
      $query = DB::table('urlcrrawlers')->insert([
        'uc_url' => "$url2",
        "created_at" =>  \Carbon\Carbon::now(), 
        "updated_at" => \Carbon\Carbon::now()
      ]);
      }
      sleep(1);
      $x++;
    }
  }
  public function get_url_content(){
    $get = DB::table('urlcrrawlers')->where('uc_crawl',0)->orderBy("uc_id", "ASC")->first();
    $url = $get->uc_url;
      $html = HtmlDomParser::file_get_html("$url");
      $data = $html->find('a');
      foreach($data as $row){
        $es = $row->find('text');

        $k = $es;
        $checker = DB::table('searches')->where('search_query', 'like', '%' . $k . '%')->first();
        if($checker == null){
          $query = DB::table('searches')->insert([
          'search_query' => $k,
          'search_crawl' => 0,
          "created_at" =>  \Carbon\Carbon::now(), 
          "updated_at" => \Carbon\Carbon::now()
          ]);
          $query = DB::table('urlcrrawlers')->where('uc_url',"$get->uc_url")->update(array('uc_crawl' => 1,'updated_at' => \Carbon\Carbon::now()));
        }
        else{
          $checker = DB::table('searches')->where('search_query', 'like', '%' . $k . '%')->first();
          $query = DB::table('searches')->where('search_query', 'like', '%' . $k . '%')->update(array('search_crawl' => 1,'updated_at' => \Carbon\Carbon::now()));
        }


      }  

  }
  public function sexy(){
    $get = DB::table('searches')->inRandomOrder()->first();
    $keyword = $get->search_query;
    echo $keyword;
    Helper::sexy_spammer($keyword);
    }
    public function txtkeywordmaker(){
      if ($file = fopen("https://dorger.app/test.txt", "r")) {
        while(!feof($file)) {
            $line = fgets($file);
            
            $checker = DB::table('searches')->where('search_query', 'like', '%' . $line . '%')->first();
            if($checker == null){
              $query = DB::table('searches')->insert([
              'search_query' => $line,
              'search_crawl' => 0,
              "created_at" =>  \Carbon\Carbon::now(), 
              "updated_at" => \Carbon\Carbon::now()
              ]);
            }
            else{
              $checker = DB::table('searches')->where('search_query', 'like', '%' . $line . '%')->first();
              $query = DB::table('searches')->where('search_query', 'like', '%' . $line . '%')->update(array('search_crawl' => 1,'updated_at' => \Carbon\Carbon::now()));
            }
        }
        fclose($file);
    }
    }
    public function rj(){
     

      // $rj = Helper::curl_page("https://www.radiojavan.com/playlists/browse/Artists");
      


      // preg_match_all('/href="(.*?)"/s', $rj, $matches);

      // $count = count($matches[1]);

      // for ($row = 0; $row < $count ; $row++) {

      //     $url = "https://radiojavan.com".$matches[1]["$row"];
      //     echo "<a href=".$url." target='_blank' rel='link rel'>".$matches[1]["$row"]."</a><br />";

      // }
    
    }
}
