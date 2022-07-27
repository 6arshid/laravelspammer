<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use AlesZatloukal\GoogleSearchApi\GoogleSearchApi;
use Helper;

class SearchController extends Controller
{
    public function zoomsearchget(Request $request){
        if(empty($request->zoomsearch)){
            $query = "trend";
        }else{
            $query = $request->zoomsearch;

        }
        // $parameters = array(
        //     'start' => 10, 
        //     'num' => 10 
        // );
		// $googleSearch = new GoogleSearchApi(); 
        // $results = $googleSearch->getResults("$query", $parameters); 

        $tag_results = DB::table('hashtags')->where('hashtag_title', 'LIKE', "%$query%")->take(30)->get();
        $tag_results  = DB::table('hashtags')->select('hashtag_title', DB::raw('COUNT(hashtag_title) as count'))->groupBy('hashtag_title')->where('hashtag_title', 'LIKE', "%$query%")->orderBy('count', 'DESC')->paginate(30);
        $article_results  = DB::table('articles')->where('article_content', 'LIKE', "%$query%")->paginate(20);
        $product_results  = DB::table('products')->where('product_name', 'LIKE', "%$query%")->orwhere('product_description', 'LIKE', "%$query%")->paginate(20);
        return view('system.zoomsearch',compact('request','tag_results','article_results','product_results'));  
    }
    public function zoomsearchstring(Request $request,$string){
        $query = $string;
        $new = str_replace('_', ' ', $query);
        $request->zoomsearch = $new;
        $tag_results = DB::table('hashtags')->where('hashtag_title', 'LIKE', "%$query%")->take(30)->get();
        $article_results  = DB::table('articles')->where('article_content', 'LIKE', "%$query%")->paginate(20);
        $product_results  = DB::table('products')->where('product_name', 'LIKE', "%$query%")->orwhere('product_description', 'LIKE', "%$query%")->paginate(20);
        return view('system.zoomsearch',compact('request','tag_results','article_results','product_results'));

    }
    public function zoomsearch(Request $request){
        $query = $request->zoomsearch;       
        if ($request->ajax()) {
            if(!empty($request->zoomsearch)){
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
        // $parameters = array(
        //     'start' => 10, 
        //     'num' => 10 
        // );
		// $googleSearch = new GoogleSearchApi(); 
        // $results = $googleSearch->getResults("$query", $parameters); 
        $tag_results  = DB::table('hashtags')->select('hashtag_title', DB::raw('COUNT(hashtag_title) as count'))->groupBy('hashtag_title')->where('hashtag_title', 'LIKE', "%$query%")->orderBy('count', 'DESC')->paginate(30);
        $article_results  = DB::table('articles')->where('article_content', 'LIKE', "%$query%")->paginate(20);
        $product_results  = DB::table('products')->where('product_name', 'LIKE', "%$query%")->orwhere('product_description', 'LIKE', "%$query%")->paginate(20);
        return view('system.zoomsearch',compact('request','tag_results','article_results','product_results'));
    }

}
