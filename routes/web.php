<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\GenericUser;
//use Illuminate\Http\Request;
use Illuminate\Support\Str;
//Illuminate\Support\Facades\Request;
//use Request;

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



//Route::get('/', function () {
//    return view('form');
//});

Route::get('/', 'fetchController@myurl');
//Route::get('/', 'fetchController@ip');


Route::post('/',function(Request $request){
  //We first define the Form validation rule(s)
  $rules = array(
    'link' => 'required|url'
  );
  //Then we run the form validation
  $validation = Validator::make(Request::all(),$rules);
  //If validation fails, we return to the main page with an error info
  if($validation->fails()) {
    return Redirect::to('/home')
    ->withInput()
    ->withErrors($validation);
  } else {
	  $user_id = Auth::user()->id;
    //Now let's check if we already have the link in our database. If so, we get the first result
    $link = App\Link::where('user_id','=',Auth::id())->where('url','=',Request::get('link'))
    ->first();
    //If we have the URL saved in our database already, we provide that information back to view.
    if($link) {
      return Redirect::to('/home')
      ->withInput()
      ->with('link',$link->hash);
      //Else we create a new unique URL
    } else {
      //First we create a new unique Hash
      do {
        $newHash = Str::random(6);
      } while(App\Link::where('hash','=',$newHash)->count() > 0);

      //Now we create a new database record
//		$email = App\User::find('user','id')->links;
//		$user_id = Auth::user()->id;
		
		App\Link::create(array('url' => Request::get('link'),'hash' => $newHash, 'user_id' => $user_id 
//		App\Link::create(array('url' => Request::get('link'),'hash' => $newHash 
      
      ));

      //And then we return the new shortened URL info to our action
      return Redirect::to('/home')
      ->withInput()
      ->with('link',$newHash);
    }
  }
});

Route::get('{hash}',function($hash) {
  //First we check if the hash is from a URL from our database
  $link = App\Link::where('hash','=',$hash)
  ->first();
  //If found, we redirect to the URL
  if($link) {
    return Redirect::to($link->url);
    //If not found, we redirect to index page with error message
  } else {
    return Redirect::to('/home')
    ->with('message','Invalid Link');
  }
})->where('hash', '[0-9a-zA-Z]{6}');

Auth::routes();
Route::resource('/home', 'HomeController');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@myurl');
Route::get('/', function () {
    return view('auth.login');
});