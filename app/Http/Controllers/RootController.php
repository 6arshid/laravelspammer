<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Codenixsv\CoinGeckoApi\CoinGeckoClient;
use App\Models\Setting;
use App\Models\Token;
use App\Models\Article;
use App\Models\Transaction;
use App\Models\Tron;
use App\Models\Photo;
use App\Models\Product;
use App\Models\User;
use Alert;
use Auth;
use Helper;
use Redirect;
use Response;
use File;
use Image;
use Namecheap;
use Socialite;

class RootController extends Controller
{   
    public function welcome(Request $request)
    {
        return view('welcome');
    }
    public function profile(Request $request,$username){
        if($username == 'home'){
            return redirect()->to('/s/home');
        }elseif($username == 'search'){
            return view('lt.search');
        }elseif($username == 'admin'||$username == 'contact'){
            toast('Inaccessible user !','error');
            return redirect()->to('/');
        }elseif($username == 'register'){
            return view('auth.register');
        }elseif($username == 'login'){
            return view('auth.login');
        }elseif($username == 'verify'){
            return view('auth.verify');
        }else{
            $user = DB::table("users")->where('username',$username)->first();
            $results = DB::table("articles")->where('article_user_id',$user->id)->orderBy('article_id', "DESC")->paginate(5);
            $data = '';
            if ($request->ajax()) {
                foreach ($results as $post) {
                    $data.='<li>'.$post->article_id.' <strong>'.$post->article_title.'</strong> : ';
                }
                return $data;
            }
            $user_conents = $data;

            $tokens = Token::all();


            if(isset($user)){
                if($user->theme == 1){
                    return view('lt.profile_themes.profile1',compact(['user','user_conents','tokens']));
                }
                if($user->theme == 2){
                    return view('lt.profile_themes.profile2',compact(['user','user_conents','tokens']));
                }
            }else{
                toast('We dont have this user !','error');
                return redirect()->to('/');
            }
        }
    }
    public function cryptocurrencyprices(){
        return view('lt.ccp');

    }
    public function cryptocurrencybitprice(){
        
$url = "https://www.bitstamp.net/api/ticker/";
$fgc = file_get_contents($url);
$json = json_decode($fgc, true);
 
 $price = $json["last"];
 $price = number_format($price, 2);
$high = $json["high"];
 $low = $json["low"];
 $date = date("d-m-y - h:i:sa");
 $open =$json["open"];

 echo "<div style='background: #c0c0c0; padding: opx;  color: green; font-size: 14px; text-align: center; '>";
 echo " currently: 1Btc  =  $ ". $price;  echo "  ::  Timestamp:". $date;
echo "</div>";

    }
    public function worldometers(){
        return response()->json();
    }
    public function market(){
        $products = DB::table("products")->join('users', 'products.product_user_id', '=', 'users.id')->where('product_nft',0)->orderBy('product_id','DESC')->paginate(30);
        return view('lt.market',compact(['products']));
    }
    public function showmarketproduct($slug){
        $product = DB::table("products")->where('product_slug',$slug)->first();
        return view('lt.showmarketproduct',compact(['product']));
    }
    public function addblogtext(Request $request){
  
      if (Auth::user()){
            $validator = Validator::make($request->all(), [
                'content' => 'nullable|min:1',
                'filenames' => 'nullable','max:9999048',
                'filenames.*' => 'mimes:jpg,png,mp3,ogg,mp4,mov,jpeg,gif,pdf'
           ]);
        }else{
            $validator = Validator::make($request->all(), [
                'content' => 'nullable|min:1',
                'filenames' => 'nullable','max:99048',
                'filenames.*' => 'mimes:jpg,png,mp3,ogg,mp4,mov,jpeg,gif,pdf'
           ]);
        }
        $errors = $validator->errors();
        foreach ($errors->all() as $message) {
            toast("$message",'error');
            return redirect()->back();
            die();
        }
        if(empty($request['content']) && empty($request['filenames'])){
            toast('Error,you request is empty !','error');
            return redirect()->to("/");
        }
        $content = $request['content'];
        // preg_match("'<h1(.*?)>(.*?)</h1>'si",$request['content'], $headings);
        $title_clean_html_code = strip_tags($content);
        $title = Helper::limit_characters($title_clean_html_code, 100);
        $clean_1 = str_replace("&amp;",Null,"$title");
        $clean_title_2 = str_replace("nbsp;",Null,"$clean_1");
        // $str = preg_replace('#<h1([^>]*)>(.*)</h1>#m',' ', $content);

        if(isset(Auth::user()->id)){
            $user_id = Auth::user()->id;
        }else{
            $user_id = 3;
        }

       

       
        $data = new Article;
        $data->article_type = 'blog';
        $data->article_title = $clean_title_2;
        $data->article_content = $content;
        $data->article_user_id =  $user_id;
        $data->article_lang =  $request->lang;
        $data->article_slug = encrypt(uniqid());
        $data->article_user_ip = Helper::get_client_ip();
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
        if ($request->filenames){
            foreach($request->filenames as $key => $files)
            {
                $file_name = Helper::gen_uuid($len=16).md5(uniqid()) . '.' . $files->getClientOriginalExtension();
                if(preg_match('/\.(jpg|png|jpeg)$/', $file_name)) {
                    $img = Image::make($files);
                    $img->resize(800, 800);
                    $img->save("files/images/".$file_name);
                    $file_path = "files/images/".$file_name;
                }else{
                    $files->move('files/blogs', $file_name);
                    $file_path = 'files/blogs/'. $file_name;

                }
                // $mydate= getdate(date("U"));
                // $imageName = Helper::find_user_info($user_id)->uniqid.uniqid().'.'.$files->extension();  
                // if (!file_exists('files/blogs/'.Helper::find_user_info($user_id)->uniqid."/".$mydate["year"].'/'.$mydate['month'].'/'.$mydate['mday'])) {
                //     mkdir('files/blogs/'.Helper::find_user_info($user_id)->uniqid."/".$mydate["year"].'/'.$mydate['month'].'/'.$mydate['mday'], 0777, true);
                // }
                // $files->move(public_path('files/blogs/'), $imageName);
              $query = DB::table('files')->insert([
                    'file_user_id' => $user_id,
                    'file_path' => $file_path,
                    'file_content_id' => $data->id,
                    'type' => 'blog'
                ]);
            }
        }

        if(isset($data)){
            toast('Your content success added','success');
        }else{
            toast('Error,Try again !','error');
        }

        $url = "/c/".$data->article_slug;
        return redirect()->to("$url");

    }

    public function gethashtagcontent($name){
   
        $clean =  decrypt($name);
        $result = DB::table('articles')->join('hashtags', 'articles.article_id', '=', 'hashtags.hashtag_post_id')->where('article_title', 'like', '%' . $clean . '%')->orWhere('article_content', 'like', '%' . $clean . '%')->orderBy('article_id', "DESC")->distinct()->paginate(30);
        return view('lt.hashtags',compact(['result']));
    }

    public function usercontents($username){
        $user = DB::table("users")->where('username',$username)->first();
            if(isset($user)){
                $user_conents = DB::table("articles")->where('article_user_id',$user->id)->orderBy('article_id', "DESC")->paginate(30);
                if($user_conents == null){
                    toast('This user has no content','info');
                    return redirect()->to('/');
                }
               else{
                return view('lt.blog',compact(['user_conents']));
               }
               
            }else{
                toast('We dont have this user !','error');
                return redirect()->to('/');
            }
    }
    public function nfts(){
        $products = DB::table("products")->where('product_nft',1)->orderBy('product_id', "DESC")->paginate(30);
        return view('lt.nfts',compact(['products']));
    }   

    public function showarticle($slug){
        $content = DB::table('articles')->where('article_slug', "$slug")->first();
        if(isset($content)){
            return view('lt.blogpost',compact(['content']));
        }else{
            toast('404 Error!','error');
            return redirect()->to('/');
        }
    }
    public function viewlive($slug){
        $live = DB::table('lives')->where('live_slug', "$slug")->first();
        return view('lt.viewlive',compact(['live']));
    }
    public function smstouser($username){
        return view('lt.sms',compact(['username']));
    }
    public function submitsmstouser(Request $request,$username){
        $validator = Validator::make($request->all(), [
            'message' => 'required'
       ]);
       $errors = $validator->errors();
       foreach ($errors->all() as $message) {
           toast("$message",'error');
           return redirect()->back();
           die();
       }
        $chat_user_id = Helper::find_user_by_username($username)->id;
        if (Auth::user()){
           $chat_sender_id = Auth::user()->id;
        }else{
            $chat_sender_id = 3;
        }

        $data = $request->all();
        #create or update your data here
        $query = DB::table('chats')->insert([
            'chat_receiver_id' => $chat_user_id,
            'chat_sender_id' => $chat_sender_id,
            'chat_message' => $request->message,
            'chat_sender_ip' => $request->ip,
            "created_at" =>  \Carbon\Carbon::now(), 
        "updated_at" => \Carbon\Carbon::now() 
        ]);

       

       
        if(isset($query)){
            toast('Your message has been successfully sent','success');
        }else{
            toast('Error!','error');
        }
        return redirect()->back();


    }
    public function users(Request $request){

        $users = DB::table("users")->orderByRaw('RAND()')->paginate(30);
        if ($request->ajax()) {
            $query = $request->liveusersearch;
            $data = DB::table('users')->where('username', 'LIKE', "%$query%")->take(5)->get();
           
            $output = '';
            if (count($data)>0) {
                // $output = '<div class="row" style="display: block; position: relative; z-index: 1">';
                $output = '<div class="row mt-3">';
                foreach ($data as $row) {
              
                    $output .= '<a href="/'.$row->username.'" class="col-md-2" target="_blank"><p > <img src="/'.Helper::find_avatar_username($row->username).'" class="img-fluid"> </p><h6 class="text-start btn btn-light">'.$row->username.'</h6></a>';
                }
                $output .= '</div>';
            }else {
                $output .= '<div class="mt-3">'.'No Data Found'.'</div>';
            }
            return $output;
        }
        return view('lt.users',compact(['users']));
    }
    public function usersajax(){
        return response()->json();
    }
    public function youtubelives(){
        $lives = DB::table("lives")->select('live_slug','live_image')->orderBy('live_id', "DESC")->paginate(30);
        return view('lt.ytlives',compact(['lives']));
    }
    public function youtubelivesajax(){
        return response()->json();
    }
    public function shousershop($username){
        $user_id = Helper::find_user_by_username($username)->id;
        $products = DB::table("products")->where('product_owner_id',$user_id)->where('product_nft',0)->orderBy('product_id', "DESC")->paginate(30);
        return view('lt.usershop',compact(['products']));

    }
    public function allcontentsarchive(Request $request)
    {
        $results = DB::table("articles")->orderBy('article_id', "DESC")->paginate(5);
        $artilces = '';
        if ($request->ajax()) {
            foreach ($results as $result) {
                $artilces.='<a href="/c/'.$result->article_slug.'"><div class="card mb-2"> <div class="card-body"><h5 class="card-title">'.$result->article_title.'</h5></div></div></a>';
            }
            return $artilces;
        }
        return view('lt.allcontents',compact(['artilces']));
    }


    public function autosearch(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('users')->where('email', 'LIKE', $request->name.'%')->get();
            $output = '';
            if (count($data)>0) {
                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
                foreach ($data as $row) {
                    $output .= '<li class="list-group-item">'.$row->name.'</li>';
                }
                $output .= '</ul>';
            }else {
                $output .= '<li class="list-group-item">'.'No Data Found'.'</li>';
            }
            return $output;
        }
        return view('autosearch');  
    }
    public function zoomsearch(Request $request){
        if ($request->ajax()) {
            if(!empty($request->zoomsearch)){
                $query = $request->zoomsearch;
                $data = DB::table('users')->where('username', 'LIKE', "%$query%")->take(5)->get();
                $data2 = DB::table('articles')->where('article_content', 'LIKE', "%$query%")->orwhere('article_title', 'LIKE', "%$query%")->take(5)->get();
                $data3 = DB::table('products')->where('product_name', 'LIKE', "%$query%")->orwhere('product_description', 'LIKE', "%$query%")->take(5)->get();
                $output = '';

                if (count($data)>0) {
                    // $output = '<div class="row" style="display: block; position: relative; z-index: 1">';
                    $output = '<div class="mt-3">';
                    foreach ($data as $row) {
                        $output .= '<a href="/'.$row->username.'" target="_blank"><h6 class="text-start btn btn-light">'.$row->username.'</h6><p class="Avatar"> <img src="/'.Helper::find_avatar_username($row->username).'" class="avatar" width="25px"> </p></a>';
                    }
                    $output .= '</div>';
                }elseif(count($data2)>0){
                    $output = '<div class="mt-3">';
                    foreach ($data2 as $row2) {
                        $output .= '<a href="/c/'.$row2->article_slug.'" target="_blank"><h6 class="text-start">'.$row2->article_title.' -> Article </h6></a>';
                    }
                    $output .= '</div>';
                }
                elseif(count($data3)>0){
                    $output = '<div class="mt-3">';
                    foreach ($data3 as $row3) {
                        $output .= '<a href="/s/products/'.$row3->product_slug.'" target="_blank"><h6 class="text-start">'.$row3->product_name.' -> Product </h6></a>';
                    }
                    $output .= '</div>';
                }
                else {
                    $output .= '<div class="mt-3">'.'No Data Found'.'</div>';
                }
                return $output;
            }
        }
        return view('lt.zoomsearch');  
    }
    public function autosearchuser(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('users')->where('name', 'LIKE', $request->name.'%')->orwhere('email', 'LIKE', $request->name.'%')->orwhere('username', 'LIKE', $request->name.'%')->get();
            $output = '';
            if (count($data)>0) {
                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
                foreach ($data as $row) {
                    $output .= '<li class="list-group-item bg-light">'.$row->name.'</li>';
                }
                $output .= '</ul>';
            }else {
                $output .= '<li class="list-group-item">'.'No Data Found'.'</li>';
            }
            return $output;
        }
        return view('autosearch');  
    }
    public function hashtagslist(){
        return view('lt.hashtagsforfollow'); 
    }
    public function notifications(Request $request,$code){
        if(decrypt($code) == 'notifications'){
            return view('lt.notifications');
        }

    }
    public function userreports($username){
        $user_id = Helper::find_user_by_username($username)->id;
        $reports = DB::table("reports")->where('report_reported_user_id',$user_id)->paginate(20);
        return view('lt.user.reports',compact(['reports']));


    }
    public function reportview($username,$code){
         $report_id = decrypt($code);
         $report = DB::table("reports")->where('report_id',$report_id)->first();
         $report_conversations = DB::table('reports_conversations')->where('report_c_report_id',$report_id)->paginate(10);
         return view('lt.user.report',compact(['report']));

    }
    public function namecheap(){
        $domain = 'mrlast.com';
        if ( gethostbyname($domain) != $domain ) {
         echo "DNS Record found";
        }
        else {
         echo "NO DNS Record found";
        }
//         $apiUser = $userName = 'faaddlist';
//         $apiKey = 'c5cd738279b9434f9baf43a15491be1e';
//         $clientIp = '213.237.85.68';
//         // Return type can be: xml (default), array, json
//         $returnType = 'json';

//         $client = new Namecheap\Api($apiUser, $apiKey, $userName, $clientIp, $returnType);
// $client->setCurlOption(CURLOPT_SSL_VERIFYPEER, false); // For local development env (if needed)

// $ncDomains = new  Namecheap\Domain\Domains($client);
// $ncDomains->enableSandbox(); // Enable sandbox mode for the current instance

// $domainList = $ncDomains->getList();

// print_r($domainList);

    }
   

    
}
