<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use voku\helper\HtmlDomParser;
use Illuminate\Support\Str;
use App\Models\Setting;
use App\Models\Chat;
use Auth;
use Carbon;
use Image;
use File;
use Session;
use GuzzleHttp\Client;
use DateTime;
use Crypt,Storage;
use YogeshKoli\UserIP\UserIP;

class Helper
{

	public static function encryptit($string) {

		$encoded  = encrypt($string);
		return $encoded;
	}
	public static function decryptit($string) {
		$decoded = decrypt($string);
		return $decoded;
	}
	
	
	public static function article_view($id){
	
		$checker = DB::table('articles')->where('article_id',$id)->first();
		$view = $checker->article_view;
		$view_plus = $checker->article_view += 1;		
		DB::table('articles')->where('article_id',$id)->update(array('article_view' => $view_plus ,'updated_at' => \Carbon\Carbon::now()));
		$checker2 = DB::table('articles')->where('article_id',$id)->first();
		$view = $checker->article_view;
		return $view;

	}
	public static function total_view_get(){
		$get_total_views = DB::table('settings')->first();
        $total_views = $get_total_views->settings_total_view;
		return $total_views;
	}
	

	public static function get_hashtagcontents($name,$take){
		$hashtags = DB::table("hashtags")->join('articles', 'hashtags.hashtag_post_id', '=', 'articles.article_id')->where('hashtag_title',$name)->orderBy('article_id', "DESC")->paginate($take);
		return $hashtags;
	}
	public static function url_test( $url ) {
		$timeout = 10;
		$ch = curl_init();
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt ( $ch, CURLOPT_TIMEOUT, $timeout );
		$http_respond = curl_exec($ch);
		$http_respond = trim( strip_tags( $http_respond ) );
		$http_code = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
		if ( ( $http_code == "200" ) || ( $http_code == "302" ) ) {
			return true;
		} else {
			// you can return $http_code here if necessary or wanted
			return false;
		}
		curl_close( $ch );
	}
	public static function curl_page($url,$data='',$ref_url='',$login=false,$proxy=false,$proxystatus=false){


		$ch = curl_init();
		if($login == 'true') {
			$fp = fopen("cookie.txt", "w");
			fclose($fp);
			curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
			curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
		}
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");
		curl_setopt($ch, CURLOPT_TIMEOUT, 500);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		if ($proxystatus == 'true') {
			curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, TRUE);
			curl_setopt($ch, CURLOPT_PROXY, $proxy);
		}
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$ref_url = (empty($ref_url)) ? $url : $ref_url;
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_REFERER, $ref_url);
		if(!empty($data)){
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POST, TRUE);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		}
		$return = curl_exec ($ch);
		curl_close ($ch);
		return $return;
	
	}
	public static function get_page_title($url) {


		$website = $url;
		if( !Helper::url_test( $website ) ) {
			// return $website ." is down!";
		} else {
			$html = HtmlDomParser::file_get_html("$website");
			if(!empty($html)){
				$titleraw = $html->find('title',0);
				return $titleraw->innertext;
			}
		}

    }
	public static function feed_search($url)
	{
		$article = DB::table('articles')->where('article_content', 'like', '%' . $url . '%')->first();
		return $article;
	}
	public static function get_url_info()
	{

		$get_ser_sources = DB::table('searchengineresults')->get();
		foreach($get_ser_sources as $get_ser_source_row){
			if(empty($get_ser_source_row->ser_url_title)){
				$ser_id = $get_ser_source_row->ser_id;
				$get_url_info = DB::table('searchengineresults')->where('ser_id',$ser_id)->first();
				$preg_match = preg_match("/(https|http|www)/i", $get_url_info->ser_url);
				if($preg_match != null){
					$broken_url = strpos($get_url_info->ser_url,"&");
					if(empty($broken_url)){

			
						// $html = HtmlDomParser::file_get_html("$get_url_info->ser_url");
						// $titleraw = $html->find('title',0);
						// $title = $titleraw->innertext;
						// $query = DB::table('searchengineresults')->where('ser_id',$ser_id)->update(array('ser_url_title' =>$title,'updated_at' => \Carbon\Carbon::now()));		
					
					}

				}
	
			}
		}



	
	}
	public static function foreach_search($source,$string)
	{
			$checker_query = DB::table('searchengineresults')->where('ser_source',$source)->where('ser_query',"$string")->paginate(30);
				foreach($checker_query as $get_all_row){
				echo $get_all_row->ser_url."<br>";
			}
	}
	public static function searchengineresults($source,$string)
	{
		$checker_query = DB::table('searchengineresults')->where('ser_source',$source)->where('ser_query',"$string")->first();
		if($checker_query){
			Helper::foreach_search($source,$string);
		}
		
	}
	public static function crawler_data_insert($url,$title,$string,$ser_description,$source){
		$checker_url = DB::table('searchengineresults')->where('ser_url',$url)->first();
		if(empty($checker_url->ser_url)){
		$query = DB::table('searchengineresults')->insert([
			'ser_url' => "$url",
			'ser_query' => $string,
			'ser_url_title' => $title,
			'ser_description' => $ser_description,
			'ser_source' => "$source",
			"created_at" =>  \Carbon\Carbon::now(), 
		"updated_at" => \Carbon\Carbon::now()
		]);
		}

	}
	public static function crawler_create_search_data($string){
	$google_string = str_replace(" ", "+", "$string");
	$html = HtmlDomParser::file_get_html('https://www.google.com/search?q='.$google_string);

	if( !Helper::url_test($html) ) {
	} else {
		foreach ($html->find('a') as $e) {
			$url =  str_replace("/url?q=", "","$e->href");
				$clean =  strstr($url, '&', true); 
				$google_url_find  =  str_replace("/search?q=", "https://www.google.com/search?q=","$clean");
				if(strpos($google_url_find, "google.com") == null){
					if(strpos($google_url_find, "?") == null){
						$title = Helper::get_page_title($google_url_find);
						Helper::crawler_data_insert($google_url_find,$title,$string,'description','google');
					}
				}	
		}

	}
		

	}
	public static function crawler_link_searches_active_crawl($search_query){
		DB::table('searches')->where('search_query',"$search_query")->update(array('search_crawl' => 1,'updated_at' => \Carbon\Carbon::now()));
	}
	public static function crawler_link_searches(){

		$searches = DB::table('searches')->where('search_crawl',0)->get();

		foreach($searches as $searches_row){
			Helper::crawler_create_search_data($searches_row->search_query);
			Helper::crawler_link_searches_active_crawl($searches_row->search_query);
		}




	// $twitter = HtmlDomParser::file_get_html('https://twitter.com/search?q=iran%20news');
	// foreach ($twitter->find('a') as $e) {
	// 	$url = $e->href;
	// 	$array  = array('supported_languages', 'lang','login','about','timeline','account/begin_password_reset','twitter.com','tos','search-advanced','privacy','t.co','#');

	// 	if (!Helper::str_finder($url, $array)) {
	// 		// echo "<a href='https://twitter.com$url'>".$url."<a/><br>";

	// 		Helper::get_page_title($url);
	// 	} 	
	// }



	}
	public static function insert_search($string)
	{


		$checker = DB::table('searches')->where('search_query', 'like', '%' . $string . '%')->first();
		if($checker == null){
			$query = DB::table('searches')->insert([
				'search_query' => $string,
				"created_at" =>  \Carbon\Carbon::now(), 
			"updated_at" => \Carbon\Carbon::now()
			]);

		}
		else{

			$checker = DB::table('searches')->where('search_query', 'like', '%' . $string . '%')->first();
			$query = DB::table('searches')->where('search_query', 'like', '%' . $string . '%')->update(array('search_view' =>$checker->search_view += 1,'updated_at' => \Carbon\Carbon::now()));
		}

	}
	
	public static function tokens()
	{
		$tokens = DB::table('tokens')->take(10)->get();
		return $tokens;
	}



	public static function trend_search($take){
		$trend_search = DB::table('searches')->select('search_query', DB::raw('COUNT(search_query) as count'))
		->groupBy('search_query')
		// ->whereDate('created_at',Carbon::now()->format('Y-m-d'))
		->inRandomOrder()
		->paginate($take);
		return $trend_search;
	}
	public static function get_tend_hashtags(){
		$tend_hashtagstend_hashtags = DB::table('hashtags')->select('hashtag_title', DB::raw('COUNT(hashtag_title) as count'))
		->groupBy('hashtag_title')
		->whereDate('created_at',Carbon::now()->format('Y-m-d'))
		->orderBy('count', 'DESC')
		->paginate(30);
		return  $tend_hashtagstend_hashtags;
	}
	public static function get_all_hashtags(){
		$tend_hashtagstend_hashtags = DB::table('hashtags')->select('hashtag_title', DB::raw('COUNT(hashtag_title) as count'))
		->groupBy('hashtag_title')
		->orderBy('count', 'DESC')
		->paginate(30);
		return  $tend_hashtagstend_hashtags;
	}
	public static function get_all_searchs(){
		$tend_hashtagstend_hashtags = DB::table('searches')->select('search_query', DB::raw('COUNT(search_query) as count'))
		->groupBy('search_query')
		->orderBy('search_id', 'DESC')
		->paginate(30);
		return  $tend_hashtagstend_hashtags;
	}
	public static function get_random_search(){
		$tend_hashtagstend_hashtags = DB::table('searches')->select('search_query', DB::raw('COUNT(search_query) as count'))
		->groupBy('search_query')
		->inRandomOrder()
		->paginate(920);
		return  $tend_hashtagstend_hashtags;
	}
	public static function getallarticles(){
		$articles = DB::table("articles")->orderBy('article_id', "DESC")->paginate(30);
		return $articles;
	}
	public static function get_last_articles_sidebar(){
		$articles = DB::table("articles")->orderBy('article_id', "DESC")->paginate(11);
		return $articles;
	}
	public static function getlives(){
		$lives = DB::table("lives")->orderBy('live_id', "DESC")->paginate(30);
		return $lives;
	}
	public static function nftcontentchecker($id){
	
		$article = DB::table('articles')->where('article_id', "$id")->first();
		if (Auth::user()){
					if ($article->article_user_id == Auth::user()->id){
			echo '<a href="/s/h/nft/blogtext/'.$article->article_slug.'"  class="btn btn-primary btn-sm me-2 pe-3 ps-3">
			NFT this</a>';
		}
		}
	}
	public static function getarticleschecker($username){
		$user = DB::table("users")->where('username',"$username")->first();
        $article = DB::table("articles")->where('article_user_id',$user->id)->first();
		return $article;
	}
	public static function getarticles($username){
		$user = DB::table("users")->where('username',"$username")->first();
        $article = DB::table("articles")->where('article_user_id',$user->id)->orderBy('article_id', "DESC")->paginate(20);
		return $article;
	}
	public static function getpostinfo($slug){
		$article = DB::table('articles')->where('article_slug', "$slug")->first();
		return $article;
	}
	public static function getpostinfoid($id){
		$article = DB::table('articles')->where('article_id', "$id")->first();
		return $article;
	}
	public static function delete_post($id){
	
		$article = DB::table('articles')->where('article_id', "$id")->first();
		if (Auth::user()){
					if ($article->article_user_id == Auth::user()->id){
			echo '<a href="/s/h/blog/delete/'.$article->article_id.'"  class="btn btn-danger btn-sm me-2 pe-3 ps-3">
			Delete</a>';
		}
		}
	}
	public static function delete_product($id){
	
		$article = DB::table('products')->where('product_id', "$id")->first();
		if (Auth::user()){
					if ($article->product_user_id == Auth::user()->id){
			echo '<a href="/s/h/products/delete/'.$article->product_id.'"  class="btn btn-danger btn-sm me-2 pe-3 ps-3">
			Delete</a>';
		}
		}
	}
	public static function edit_product($id){
	
		$article = DB::table('products')->where('product_id', "$id")->first();
		if (Auth::user()){
					if ($article->product_user_id == Auth::user()->id){
			echo '<a href="/s/h/products/edit/'.$article->product_id.'"  class="btn btn-success btn-sm me-2 pe-3 ps-3">
			Edit</a>';
		}
		}
	}
	public static  function get_image_thumbnail($url)
	{
		$vine = file_get_contents($url);
		preg_match('/property="og:image" content="(.*?)"/', $vine, $matches);

		if (!isset($matches[1])) {
			preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $vine, $imagex);

			$image = $imagex['src'];
			if (!isset($image)) {
				$image = null;
			}
		} else {
			$image = $matches[1];
		}
		return ($image);
	}
	public static function getIPAddress() {  
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			return $ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			return $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			return $ip = $_SERVER['REMOTE_ADDR'];
		}
		
	}  
	public static function getfilestype($content_id,$type){
        $product = DB::table("files")->where('file_content_id',$content_id)->where('type',"$type")->first();
		if($product == null){
			$product = DB::table("products")->where('product_id',$content_id)->first();
			return $product->product_image;
		}else{
			return $product->file_path;
		}

	}

	// public static function save_remote_image($url,$data='',$ref_url='',$login=false,$proxy=false,$proxystatus=false){
	public static function make_avatar($email){
		// $url = "https://last.today/logo.png";
		$url = 'https://api.multiavatar.com/'.$email.'.png';
		$content = Helper::curl_page("$url");
		// $path = 'https://api.multiavatar.com/'.uniqid().'.png';
		$filename = "Multiavatar_".uniqid().".png";
	
		$avatar_address = "files/avatars/".$filename;


		$photo = Image::make($url)
		->resize(400, null, function ($constraint) { $constraint->aspectRatio(); } )
		->encode('jpg',80);
		Storage::disk('public')->put("$avatar_address", $photo);
		return $avatar_address;
	}
	public static function save_app_icon($url){
	
		$header =  get_headers($url);
        if(preg_match("|200|", $header[0]))
        {
            echo '<img src="'.$url.'">';
			$content = file_get_contents($url);
			file_put_contents('/files/screen', $content);
        }
        else
        {
            echo "<span class=error>Not found</span>";
        }
		die;
		// $file_name = uniqid().$content->getClientOriginalExtension();
		// $content->move('files/screen', $file_name);
		// $file_path = 'files/screen/'. $file_name;
		
		// return $file_path;
		
		
	}
	public static function w_joda($string)
	{


		$x = explode(",", $string);

        foreach ($x as $tagsx) {
			$checker = DB::table('whatsapp_numbers')->where('wn_number',"$tagsx")->first();
            if($checker == null){
              $query = DB::table('whatsapp_numbers')->insert([
              'wn_number' => $tagsx,
              'wn_send' => 0,
              "created_at" =>  \Carbon\Carbon::now(), 
              "updated_at" => \Carbon\Carbon::now()
              ]);
            }
        }

				
	}
	public static function find_avatar($id)
	{
		$user = DB::table("users")->where('id',$id)->first();
		if($user->profile_photo_path == null){
			$avatar = "/files/avatars/Multiavatar-f789d926f4715e25c0.png";
			return $avatar;
		}else{
			$avatar = '/storage/'.$user->profile_photo_path;
			return $avatar;
		}
	}
	public static function find_avatar2($id)
	{
		$user = DB::table("users")->where('id',$id)->first();
		$avatar = '/storage/'.$user->profile_photo_path;
		return $avatar;
	}
	public static function getranduser($number){
		$users = DB::table("users")->orderBy('id','DESC')->paginate($number);
		return $users;
	}
	public static function getrandproduct($number){
		$products = DB::table("products")->orderBy('id','DESC')->paginate($number);
		return $products;
	}
	public static function find_photo($id)
	{
		$find_photo = DB::table("photos")->where('product_id',$id)->first();
		$photo = $find_photo->path;
		return $photo;
	}
	public static function find_product_by_slug($slug)
	{
		$product = DB::table("products")->where('product_slug',$slug)->first();
		return $product;
	}
	public static function find_product_by_id($id)
	{
		$product = DB::table("products")->where('product_id',$id)->first();
		return $product;
	}
	public static function find_user_info($id)
	{
		$user_info = DB::table("users")->where('id',$id)->first();
		return $user_info;
	}
	public static function find_user_by_username($username)
	{
		$user_info = DB::table("users")->where('username',$username)->first();
		return $user_info;
	}
	public static function find_user_notes()
	{
		$notes = DB::table("notes")->where('note_user_id',Auth::user()->id)->orderBy('note_id','DESC')->paginate(30);
		return $notes;
	}
	public static function userchecksms(){
		if (Auth::user()){
			$usersms = Chat::where('chat_receiver_id',Auth::user()->id)->orWhere('chat_sender_id',Auth::user()->id)->orderBy('chat_id','DESC')->paginate(10);
		}else{
			$usersms = Chat::where('chat_receiver_id',3)->orWhere('chat_sender_id',3)->orderBy('chat_id','DESC')->paginate(10);

		}
        return $usersms;
    }

	public static function strip_after_string($str,$char)
    {
        $pos=strpos($str,$char);    
        if ($pos!==false) 
        {
            //$char was found, so return everything up to it.
            return substr($str,0,$pos);
        } 
        else 
        {
            //this will return the original string if $char is not found.  if you wish to return a blank string when not found, just change $str to ''
            return $str; 
        }
    }

    public function resizeimage($file)
    {
        $img = Image::make("$file");
        $img->resize(600, 600);
        $filename = Helper::gen_uuid($len=16).date('Y_m_d') . '_' . $file->getClientOriginalName();
        $destination = "/images";
        $img->save("images/$filename");
        return $destination . '/' . $filename;
    }
    protected function UploadImage($file)
    {
        $filename = Helper::gen_uuid($len=16).date('Y_m_d') . '_' . $file->getClientOriginalName();
        $destination = "/images";
        $destinationPath = public_path($destination);
        $file->move($destinationPath, $filename);
        return $destination . '/' . $filename;
    }
	public static function user_shop_checker($username){
		$username_checker = DB::table("users")->where('username',$username)->first();
        $user_id = $username_checker->id;
		$shop_checker = DB::table("products")->where('product_user_id',$user_id)->first();
        if(empty($shop_checker)){
          echo null;
        }else{
			echo '<a  href="/'.$username.'/shop"><img src="/images/icons/icons8-market-100 (3).png" class="zoom" width="55px" /></a>';
		}

	}
	
	public static function user_follow_unfollow_checker($username)
	{
		if (Auth::user()){
			$follower_id = auth()->user()->id;
		}else{
			$follower_id = 0;
		}
		$username_checker = DB::table("users")->where('username',$username)->first();
        $follow_user_id = $username_checker->id;
        $follow_checker = DB::table("follows")->where('follow_user_id',$follow_user_id)->where('follower',$follower_id)->first();
		if($follow_checker == null){
			$check = 0;
			return $check;
			}elseif($follow_checker->follow_user_id == auth()->user()->id){
			$check = 3;
		  }
		  elseif($follow_checker->accept == 0){
			$check = 1;
			return $check;
			}
		  else{
			$check = 2;
			return $check;

        }
	}
	public static function hashtag_follow_unfollow_checker($name)
	{
		if(Auth::user()){
		
			$follow_checker = DB::table("follows")->where('follower',Auth::user()->id)->where('hashtag',$name)->first();
			
			if(empty($follow_checker)){
				$check = 0;
				return $check;
			}
			else{
				$check = 2;
			return $check;
			}
		}else{
			$check = 0;
			return $check;
		}

	}
	public static function reaction_number_content($content_id,$reaction){
		$checker = DB::table("reactions")->where('reaction_content_id',$content_id)->where('reaction_reaction',"$reaction")->first();
		if(empty($checker)){
			return 0;
		}else{
			$sql_count = DB::table("reactions")->where('reaction_content_id',$content_id)->where('reaction_reaction',"$reaction")->get();
			$count = count($sql_count);
			return $count;
		}

	}
	
	public static function showhashtagpost($content){
		// $pattern = '/(#\w+)/';
		// echo preg_replace($pattern,$pattern, $content);
		preg_match_all("/(#\w+)/", $content, $matches);
        foreach($matches[0] as $matche){
            $replaced = str_replace('#',null, $matche);
			echo "<a href='/s/hashtags/".encrypt($replaced)."' class='me-1'>$replaced</a>";

			
		}
	}
	public static function gen_uuid($len=8) {

		$hex = md5("farshid" . uniqid("", true));
	
		$pack = pack('H*', $hex);
		$tmp =  base64_encode($pack);
	
		$uid = preg_replace("#(*UTF8)[^A-Za-z0-9]#", "", $tmp);
	
		$len = max(4, min(128, $len));
	
		while (strlen($uid) < $len)
			$uid .= gen_uuid(22);
	
		return substr($uid, 0, $len);
	}
	
	public static function get_hashtags($string){
		preg_match_all("/#(.+?)(?=[\s.,:,]|$)/", $string, $matches);
		foreach($matches[0] as $matche){
			$clean = strip_tags($matche);
			$replaced = Str::replace('#',null, $matche);
			$clean2 = strip_tags($replaced);

			echo '<a href="/tags/'.$clean2.'">'.$clean.'&#160;</a>';
		}
	}


	public static function url_slug($str, $options = array())
	{
		$str = mb_convert_encoding((string) $str, 'UTF-8', mb_list_encodings());

		$defaults = array(
			'delimiter' => '_',
			'limit' => null,
			'lowercase' => true,
			'replacements' => array(),
			'transliterate' => false,
		);

		// Merge options
		$options = array_merge($defaults, $options);

		$char_map = array(
			// Latin
			'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C',
			'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
			'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O',
			'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH',
			'ß' => 'ss',
			'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c',
			'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
			'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o',
			'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th',
			'ÿ' => 'y',

			// Latin symbols
			'©️' => '(c)',

			// Greek
			'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
			'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
			'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
			'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
			'Ϋ' => 'Y',
			'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
			'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
			'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
			'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
			'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',

			// Turkish
			'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
			'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',

			// Russian
			'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
			'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
			'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
			'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
			'Я' => 'Ya',
			'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
			'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
			'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
			'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
			'я' => 'ya',

			// Ukrainian
			'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
			'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',

			// Czech
			'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U',
			'Ž' => 'Z',
			'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
			'ž' => 'z',

			// Polish
			'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z',
			'Ż' => 'Z',
			'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
			'ż' => 'z',

			// Latvian
			'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N',
			'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
			'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
			'š' => 's', 'ū' => 'u', 'ž' => 'z'
		);

		// Make custom replacements
		$str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);

		// Transliterate characters to ASCII
		if ($options['transliterate']) {
			$str = str_replace(array_keys($char_map), $char_map, $str);
		}

		// Replace non-alphanumeric characters with our delimiter
		$str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);

		// Remove duplicate delimiters
		$str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);

		// Truncate slug to max. characters
		$str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');

		// Remove delimiter from ends
		$str = trim($str, $options['delimiter']);

		return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
	}
	public static function files_checker($file_content_id,$type){
		$files = DB::table("files")->where('file_content_id',$file_content_id)->where('type',"$type")->orderBy('file_id', "ASC")->paginate(30);
		return $files;
	}
	public static function file_checker($file_content_id,$type){
		
		$file = DB::table("files")->where('file_content_id',$file_content_id)->where('type',"$type")->first();
		if(empty($file->file_path)){
			
		}else{
			$file_url = "/".$file->file_path;
			// return $file_url;
			if(preg_match('/\.(jpg|png|jpeg)$/', $file_url)) {
				$image = "<img src='".$file_url."'>";
				return $image;
			}
		}
		
		// elseif(preg_match('/\.(mp3|ogg)$/', $url)) {
		// 	echo '<audio controls width="100%" >
		// 	<source src="'.$url.'" type="audio/ogg">
		// 	<source src="'.$url.'" type="audio/mpeg">
		//   Your browser does not support the audio element.
		//   </audio>';
		// }elseif(preg_match('/\.(mov|mp4)$/', $url)){
		// 	echo '<video width="100%" height="240" controls>
		// 	<source src="'.$url.'" type="video/mp4">
		// 	<source src="'.$url.'" type="video/ogg">
		//   Your browser does not support the video tag.
		//   </video>';
		// }elseif(preg_match('/\.(pdf)$/', $url)) {
		// 	echo '<embed src="'.$url.'" width="100%" height="200px" />';
		// 	echo '<a href="'.$url.'" class="btn btn-info btn-sm w-50 mt-1 mb-1">Download</a>';
		// }
	}
	public static function make_thumbnail($url){
		
		if(preg_match('/\.(jpg|png|jpeg)$/', $url)) {
			echo '<img src="'.$url.'" class="img-fluid">';
		}elseif(preg_match('/\.(mp3|ogg)$/', $url)) {
			echo '<audio controls width="100%" >
			<source src="'.$url.'" type="audio/ogg">
			<source src="'.$url.'" type="audio/mpeg">
		  Your browser does not support the audio element.
		  </audio>';
		}elseif(preg_match('/\.(mov|mp4)$/', $url)){
			echo '<video width="100%" height="240" controls>
			<source src="'.$url.'" type="video/mp4">
			<source src="'.$url.'" type="video/ogg">
		  Your browser does not support the video tag.
		  </video>';
		}elseif(preg_match('/\.(pdf)$/', $url)) {
			echo '<embed src="'.$url.'" width="100%" height="200px" />';
			echo '<a href="'.$url.'" class="btn btn-info btn-sm w-50 mt-1 mb-1">Download</a>';
		}
	
	}
	public static function limit_characters($string, $length)
	{
	  // strip tags to avoid breaking any html
	  $string = strip_tags($string);
	  if (strlen($string) > $length) {

		  // truncate string
		  $stringCut = substr($string, 0, $length);
		  $endPoint = strrpos($stringCut, ' ');

		  //if the string doesn't contain any space then it will cut without word basis.
		  $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
		  $string .= '...';
	  }
	  return $string;

	}
	public static function get_match($regex,$content)
	{
		preg_match($regex,$content,$matches);
		return $matches[1];
	}
	public static function create_activity($everything_id,$type,$activity_in){
		if (Auth::user()){
			$user_id = Auth::user()->id;
		}else{
			$user_id = 3;

		}
		DB::table('activities')->insert([
			'activity_user_id' => $user_id,
			'activity_everything_id' => $everything_id,
			'activity_everything_type' => $type,
			'activity_in' => $activity_in,
			'activity_ip' => Helper::getIPAddress(),
			"created_at" =>  \Carbon\Carbon::now(), 
			"updated_at" => \Carbon\Carbon::now()
		]);
	}
	public static function show_activity($everything_id,$everything_type,$activity_in){
		$show_activity = DB::table('activities')->where('activity_everything_id',$everything_id)->where('activity_everything_type',$everything_type)->where('activity_in',$activity_in)->orderBy('activity_id', 'DESC')->paginate(10);
		return $show_activity;
	}
	public static function show_offers($offer_product_id){
		$show_offers = DB::table('offers')->where('offer_product_id',$offer_product_id)->paginate(7);
		return $show_offers;
	}
	public static function create_notification($sender_id,$reciver_id,$type,$everything_id,$everything_type){
		
		DB::table('notifications')->insert([
			'notification_sender_id' => $sender_id,
			'notification_reciver_id' => $reciver_id,
			'notification_type' => $type,
			'notification_everything_id' => $everything_id,
			'notification_everything_type' => $everything_type,
			'notification_read' => 0,
			"created_at" =>  \Carbon\Carbon::now(), 
			"updated_at" => \Carbon\Carbon::now()
		]);
	}
	public static function get_notification($notification_reciver_id){
		
		$get_notification = DB::table('notifications')->where('notification_reciver_id',$notification_reciver_id)->orderby('notification_id','DESC')->paginate(20);
		return $get_notification;

	}
	public static function countdown($date){
		$wedding = strtotime("$date"); 
		$current=strtotime('now');
		$diffference =$wedding-$current;
		$days=floor($diffference / (60*60*24));
		return "$days days left";

	}

	public static function user_bank_balance($id){
		$bank_balance = DB::table("bank")->where('bank_user_id',$id)->first();
		if(empty($bank_balance->bank_ltcoin_balance)){
			echo "LT Coin: 0 <br>";
			echo "USDT: 0";
		}else{
			echo "LT Coin: " .$bank_balance->bank_ltcoin_balance."<br>";
			echo "USDT: " .$bank_balance->bank_usdt_balance."<br>";
		}

	}
	public static function get_report_info($id){
		$get_report_info = DB::table('reports')->where('report_id',$id)->first();
		return $get_report_info;
	}
	public static function get_report_problem_info($id){
		if($id == 1){
			return "Share children porn";
		}elseif($id == 2){
			return "Human rights";
		}elseif($id == 3){
			return "Fake accounte";
		}elseif($id == 4){
			return "Spam";
		}
	}

	
	public static function  last_get_data($url){
		$ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
	}
	public static function  last_gethashttag($keyword){
		$keywords = array();
        $data = Helper::last_get_data('http://suggestqueries.google.com/complete/search?output=firefox&client=firefox&hl=en-US&q=' . urlencode($keyword));

        if (($data = json_decode($data, true)) !== null) {
            $keywords = $data[1];
        }

        $string = '';
        $i = 1;
        foreach ($keywords as $k) {
            $string .= '#'.url_slug($k);
            if ($i++ == 10) break;
        }
        return $string;
	}
	public static function  last_keyword($keyword){
		$keywords = array();
        $data = Helper::last_get_data('http://suggestqueries.google.com/complete/search?output=firefox&client=firefox&hl=en-US&q=' . urlencode($keyword));

        if (($data = json_decode($data, true)) !== null) {
            $keywords = $data[1];
        }

        $string = '';
        $i = 1;
        foreach ($keywords as $k) {
            $string .= $k . ', ';

			$checker = DB::table('searches')->where('search_query', 'like', '%' . $k . '%')->first();
			if($checker == null){
			  $query = DB::table('searches')->insert([
				'search_query' => $k,
				"created_at" =>  \Carbon\Carbon::now(), 
			  "updated_at" => \Carbon\Carbon::now()
			  ]);
			  
		
			}
			else{
			  $checker = DB::table('searches')->where('search_query', 'like', '%' . $k . '%')->first();
			  $query = DB::table('searches')->where('search_query', 'like', '%' . $k . '%')->update(array('search_view' =>$checker->search_view += 1,'updated_at' => \Carbon\Carbon::now()));
			}

            if ($i++ == 10) break;
        }
        return $string;
	}
	public static function search_checker($k){
		$checker = DB::table('searches')->where('search_query',"$k")->first();
		if($checker == null){
		  $query = DB::table('searches')->insert([
			'search_query' => $k,
			'search_crawl' => 0,
			"created_at" =>  \Carbon\Carbon::now(), 
		  "updated_at" => \Carbon\Carbon::now()
		  ]);

		}
		else{
		  $checker = DB::table('searches')->where('search_query',"$k")->first();
		  $query = DB::table('searches')->where('search_query',"$k")->update(array('search_crawl' => 1,'updated_at' => \Carbon\Carbon::now()));
		}
	}
	public static function search_checker_sexy($k){
		$checker = DB::table('searches')->where('search_query',"$k")->first();
		if($checker == null){
		  $query = DB::table('searches')->insert([
			'search_query' => $k,
			'search_crawl' => 0,
			"created_at" =>  \Carbon\Carbon::now(), 
		  "updated_at" => \Carbon\Carbon::now()
		  ]);

		}
		else{
		  $checker = DB::table('searches')->where('search_query',"$k")->first();
		  $query = DB::table('searches')->where('search_query',"$k")->update(array('search_crawl' => 2,'updated_at' => \Carbon\Carbon::now()));
		}
	}
	public static function sexy_spammer($keyword){
		$giphy = "https://giphy.com/search/".$keyword;
		if(Helper::url_test($giphy)){
			$html = HtmlDomParser::file_get_html("$giphy");
			$data = $html->find('a');
			foreach($data as $row){
			  $es = $row->find('text');
			  Helper::search_checker_sexy($es);
			}
		}
		$google = "https://www.google.com/search?q=".$keyword;
		if(Helper::url_test($google)){
			$html = HtmlDomParser::file_get_html("$google");
			$data = $html->find('a');
			foreach($data as $row){
			  $es = $row->find('text');
			  Helper::search_checker_sexy($es);
			}
		}
		$wikipedia = "https://en.wikipedia.org/w/index.php?search=".$keyword;
		if(Helper::url_test($wikipedia)){
			$html = HtmlDomParser::file_get_html("$wikipedia");
			$data = $html->find('a');
			foreach($data as $row){
			  $es = $row->find('text');
			  Helper::search_checker_sexy($es);
			}
		}



		
		
	}
	public static function gtrnd_k_mkr($keyword){
		$checker = DB::table('searches')->where('search_query', 'like', '%' . $keyword . '%')->first();
		if($checker == null){
		  $query = DB::table('searches')->insert([
			'search_query' => $keyword,
			"created_at" =>  \Carbon\Carbon::now(), 
		  "updated_at" => \Carbon\Carbon::now()
		  ]);


		}
		else{
		  $checker = DB::table('searches')->where('search_query', 'like', '%' . $keyword . '%')->first();
		  $query = DB::table('searches')->where('search_query', 'like', '%' . $keyword . '%')->update(array('search_view' => $checker->search_view += 1,'updated_at' => \Carbon\Carbon::now()));
		}
	}
	public static function  last_keyword_mker_search_crawl($keyword){
		$keywords = array();
        $data = Helper::last_get_data('http://suggestqueries.google.com/complete/search?output=firefox&client=firefox&hl=en-US&q=' . urlencode($keyword));

        if (($data = json_decode($data, true)) !== null) {
            $keywords = $data[1];
        }

        $string = '';
        $i = 1;
        foreach ($keywords as $k) {
            $string .= $k . ', ';

			$checker = DB::table('searches')->where('search_query', 'like', '%' . $k . '%')->first();
			if($checker == null){
			  $query = DB::table('searches')->insert([
				'search_query' => $k,
				'search_crawl' => 0,
				"created_at" =>  \Carbon\Carbon::now(), 
			  "updated_at" => \Carbon\Carbon::now()
			  ]);

		
			}
			else{
			  $checker = DB::table('searches')->where('search_query', 'like', '%' . $k . '%')->first();
			  $query = DB::table('searches')->where('search_query', 'like', '%' . $k . '%')->update(array('search_crawl' => 1,'updated_at' => \Carbon\Carbon::now()));
			}

            if ($i++ == 10) break;
        }
        return $string;
	}
	public static function  keyword_maker($keyword){
		$keywords = array();
        $data = Helper::last_get_data('http://suggestqueries.google.com/complete/search?output=firefox&client=firefox&hl=en-US&q=' . urlencode($keyword));

        if (($data = json_decode($data, true)) !== null) {
            $keywords = $data[1];
        }

        $string = '';
        $i = 1;
        foreach ($keywords as $k) {
            $string .= $k . ', ';
            if ($i++ == 10) break;
        }
        return $string;
	}
	public static function text_to_voice($text){



// 		$txt= $text;
//   $txt =htmlspecialchars($txt);
//   $txt =rawurlencode($txt);
//   $file_name1 = Helper::curl_page('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q='.$txt.'&tl=en-IN');

//   $file_name = md5("$text") . '.mp3';

// 	$files->move('files/others', $file_name);
// 	$file_path = 'files/others/'. $file_name;
// 	DB::table('files')->insert([
// 		'file_user_id' => 1,
// 		'file_path' => $file_path,
// 		'file_content_id' => rand(),
// 		'type' => 'search'
// 	]);

  
// 	$speech="<audio controls='controls' autoplay></audio>";
// 	echo $speech;
	

	}
	public static function find_first_google_result($string){
		$checker = DB::table('searches')->where('search_query', 'like', '%' . $string . '%')->first();


		if($checker == null){

			$query = DB::table('searches')->insert([
				'search_query' => $string,
				"created_at" =>  \Carbon\Carbon::now(), 
			"updated_at" => \Carbon\Carbon::now()
			]);
			$last_insert_ID = DB::getPdo()->lastInsertId();

			$search_query = $string;
			$search_query = urlencode( $search_query );
			$html = HtmlDomParser::file_get_html("https://www.google.com/search?q=$search_query&tbm=isch");
	
	
			$i=0;
			foreach ($html->find('img') as $e) {
				if($i==8) break;
				// echo "<img src='$e->src' width='200'>" . '<br>';
	
					$file = $e->src;
	
					if(Helper::url_test($file)){
						$file_name = Helper::gen_uuid($len=16).md5(uniqid()) . '.jpg';
						if(preg_match('/\.(jpg|png|jpeg)$/', $file_name)) {
							$img = Image::make($file);
							$img->resize(800, 800);
							$img->save("files/images/".$file_name);
							$file_path = "files/images/".$file_name;
						}else{
							$files->move('files/others', $file_name);
							$file_path = 'files/others/'. $file_name;
						}
						DB::table('files')->insert([
							'file_user_id' => 1,
							'file_path' => $file_path,
							'file_content_id' => $last_insert_ID,
							'type' => 'search'
						]);
					}else{

					}
				
				$i++;  
			} 
			$files = DB::table('files')->where('file_content_id',$last_insert_ID)->where('type','search')->skip(1)->take(7)->get();
			return $files;
			

		}
		else{

			$files = DB::table('files')->where('file_content_id',$checker->search_id)->where('type','search')->skip(1)->take(7)->get();
			return $files;

		}

	
	


	}
	

	
	

}