<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Ures;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
	 public function myurl()
	{

//				$urls = DB::table('links')->paginate(1);
		 		$urls = DB::table('links')->where('user_id', Auth::id())->paginate(2);
		 
		 		
//				$ips = DB::table('links')->select('url');
//						$ip = file_get_contents ('http://php.net/manual/en/function.gethostbyname.php');
//		$url = 'http://us1.php.net/parse_url';
//		$url = DB::table('links')->get(['url']);
//		$parse = parse_url($url);
//		$host = $parse['host']; // prints 'google.com'
//		$ip = gethostbyname($host);
//		$ip = DB::table('links')->select('url');
//		return view('form',compact('urls','url'));
		return view('home',compact('urls'));
		
		
		
	}
	
	  public function destroy($id)
    {
      $crud = DB::table('links')->where('id',$id)->delete();
//      $crud->delete();

      return redirect('/home');
    }
	
    public function index()
    {
        return view('home');
    }
}
