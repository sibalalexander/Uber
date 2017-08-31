<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use App\Link;

class fetchController extends Controller
{
    public function myurl()
	{
				$urls = DB::table('links')->paginate(1);
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
//	public function ip(Request $request)
//    {
//        $showip = $request->ip();
////        return view('form');
//    }
//	
//	 public function ip()
//	{/*
//						$domain = DB::table('links')->select('url')->get();
//
//				$ip = gethostbyname($domain);
//		
//		return view('form',compact('ip'));
//		*/
//		return view('form',compact('urls'));
//	}
}
