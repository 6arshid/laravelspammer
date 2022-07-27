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
    public function rand($url){
        $tend_hashtagstend_hashtags = DB::table('searches')->select('search_query', DB::raw('COUNT(search_query) as count'))
		->groupBy('search_query')
		->inRandomOrder()
		->paginate(7);
		foreach($tend_hashtagstend_hashtags as $row){
            echo "<a href='https://".$url."/tags/".Helper::url_slug($row->search_query)."' target='_blank'>$row->search_query</a>";
        }
    }
    public function total(){
    $total = \DB::table('searches')->count();
    echo $total;
    }
   

    
}
