<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\RootController::class, 'welcome']);



Route::get('/s/zs', [App\Http\Controllers\SearchController::class, 'zoomsearchget']);
Route::post('/zs/post', [App\Http\Controllers\SearchController::class, 'zoomsearch']);
Route::get('/s/zs/{string}', [App\Http\Controllers\SearchController::class, 'zoomsearchstring']);





Route::get('/{username}/blog', [App\Http\Controllers\RootController::class, 'usercontents']);
Route::get('/{username}/sms/', [App\Http\Controllers\RootController::class, 'smstouser']);
Route::post('/{username}/sms/send', [App\Http\Controllers\RootController::class, 'submitsmstouser']);

Route::get('/{username}/shop', [App\Http\Controllers\RootController::class, 'shousershop']);
Route::get('/{username}/reports', [App\Http\Controllers\RootController::class, 'userreports']);
Route::get('/{username}/reports/v/{code}', [App\Http\Controllers\RootController::class, 'reportview']);

//account
Route::get('/s/login/metamask', [App\Http\Controllers\WebLoginController::class, 'metamaskethmessage']);
Route::post('/s/login/metamask/verify', [App\Http\Controllers\WebLoginController::class, 'metamaskethverify']);
Route::get('/s/register/metamask/{address}', [App\Http\Controllers\WebLoginController::class, 'metamaskethregister']);
Route::get('/s/login/google', [App\Http\Controllers\WebLoginController::class, 'redirectToGoogle']);
Route::get('/s/login/google/callback', [App\Http\Controllers\WebLoginController::class, 'handleCallback']);
Auth::routes();
Route::get('/s/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/s/home/ajaxview', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth');
Route::get('/s/h/setting', [App\Http\Controllers\HomeController::class, 'setting']);
Route::patch('/s/h/setting', [App\Http\Controllers\HomeController::class, 'updatesetting']);
Route::patch('/s/h/profile/updateavatar', [App\Http\Controllers\HomeController::class, 'updateavatar']);
Route::post('/s/h/follow/{username}', [App\Http\Controllers\HomeController::class, 'follow_user']);
Route::get('/s/h/sms/', [App\Http\Controllers\HomeController::class, 'userchecksms']);
Route::post('/s/h/sms/send/{username}', [App\Http\Controllers\HomeController::class, 'usersendsmstouser']);
Route::get('/s/h/sms/talks/{username}', [App\Http\Controllers\HomeController::class, 'chatarchive']);
Route::get('/s/h/sms/talks/{username1}/{username2}', [App\Http\Controllers\HomeController::class, 'chatarchive2']);
Route::get('/s/h/products/', [App\Http\Controllers\HomeController::class, 'products']);
Route::get('/s/h/products/add', [App\Http\Controllers\HomeController::class, 'productadd']);
Route::post('/s/h/products/submit', [App\Http\Controllers\HomeController::class, 'productsubmit']);
Route::get('/s/h/products/edit/{id}', [App\Http\Controllers\HomeController::class, 'editproduct']);
Route::patch('/s/h/products/submit/edit/{id}', [App\Http\Controllers\HomeController::class, 'updateproduct']);
Route::get('/s/h/products/delete/{id}', [App\Http\Controllers\HomeController::class, 'deleteproduct']);
Route::get('/s/h/bank', [App\Http\Controllers\HomeController::class, 'bank']);
Route::patch('/s/h/updatecover', [App\Http\Controllers\HomeController::class, 'updatecover']);
Route::get('/s/h/removedecover', [App\Http\Controllers\HomeController::class, 'removedecover']);
Route::get('/s/h/blog/delete/{id}', [App\Http\Controllers\HomeController::class, 'deleteblogpost']);
Route::get('/s/h/nft/blogtext/{slug}', [App\Http\Controllers\HomeController::class, 'nftblogtext']);
Route::post('/s/h/submitnftproduct', [App\Http\Controllers\HomeController::class, 'submitnftproduct']);
Route::get('/s/h/bank/transactions', [App\Http\Controllers\HomeController::class, 'transactions']);
Route::get('/s/h/bank/rfp', [App\Http\Controllers\HomeController::class, 'requestforpayment']);
Route::get('/s/h/follow/hashtag/{tagname}', [App\Http\Controllers\HomeController::class, 'followhashtag']);
Route::get('/s/h/wall/hashtags', [App\Http\Controllers\HomeController::class, 'user_hashtags_wall']);
Route::get('/s/h/wall/connections', [App\Http\Controllers\HomeController::class, 'user_connections_wall']);
Route::post('/s/h/contentreaction', [App\Http\Controllers\HomeController::class, 'contentreactionsubmit']);
Route::post('/s/h/ajax/contentreaction', [App\Http\Controllers\HomeController::class, 'ajaxcontentreactionsubmit']);
Route::get('/s/h/offers', [App\Http\Controllers\HomeController::class, 'offers']);
Route::post('/s/h/bank/send', [App\Http\Controllers\BankController::class, 'send']);
Route::get('/s/h/notes', [App\Http\Controllers\HomeController::class, 'note']);
Route::post('/s/h/notepost', [App\Http\Controllers\HomeController::class, 'notepost']);
Route::get('/s/h/note/view/{id}', [App\Http\Controllers\HomeController::class, 'noteview']);
Route::get('/s/h/nft/addnftproduct', [App\Http\Controllers\HomeController::class, 'addnftproduct']);
Route::get('/s/h/connection/accept/{notification_sender_id}/{notification_id}', [App\Http\Controllers\HomeController::class, 'acceptconnection']);
Route::get('/s/h/connection/delete/{notification_sender_id}/{notification_id}', [App\Http\Controllers\HomeController::class, 'deleteconnection']);
Route::get('/s/h/notifications/{code}/{notification_id}', [App\Http\Controllers\HomeController::class, 'notificationread']);
Route::get('/s/h/connections/followers', [App\Http\Controllers\HomeController::class, 'userfollowers']);
Route::get('/s/h/connections/following', [App\Http\Controllers\HomeController::class, 'userfollowing']);
Route::post('/s/h/report/{username}', [App\Http\Controllers\HomeController::class, 'userreport']);
Route::get('/s/h/reports/{code}', [App\Http\Controllers\HomeController::class, 'reportinfoforuser']);
Route::post('/s/h/report/a/{username}/{code}', [App\Http\Controllers\HomeController::class, 'answeruserreport']);
Route::get('/s/h/report/c/{code}', [App\Http\Controllers\HomeController::class, 'reportconversations']);
Route::post('/s/h/report/c/{code}', [App\Http\Controllers\HomeController::class, 'reportconversationsform']);
Route::post('/s/h/comment/send', [App\Http\Controllers\CommentController::class, 'submitcomment']);
Route::get('/s/h/comment/delete/{code}', [App\Http\Controllers\CommentController::class, 'deletecomment']);
Route::post('/s/h/domain', [App\Http\Controllers\HomeController::class, 'userdomain']);







Route::get('/s/gtrend', [App\Http\Controllers\AutomaticController::class, 'gtrend']);
Route::get('/s/gtrend24', [App\Http\Controllers\AutomaticController::class, 'gtrend24']);
Route::get('/s/kmker', [App\Http\Controllers\AutomaticController::class, 'keyword_maker']);



