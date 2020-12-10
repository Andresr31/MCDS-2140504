<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Game;
use App\Category;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['welcome','filter']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 'Admin') {
            return view('dashboard-admin');
        } 
        else if(Auth::user()->role == 'Editor') {
            return view('dashboard-editor');
        } else {
            $user = User::find(Auth::user()->id);
            return view('dashboard-customer')->with('user', $user);
        } 
    }

    public function welcome() {
        $sliders = Game::where('slider', 1)->get();
        $cats    = Category::all();
        $games   = Game::all();

        return view('welcome')->with('sliders', $sliders)
                              ->with('cats', $cats)
                              ->with('games', $games);
    }

    public function filter(Request $request) {

        if($request->category_id >=0){
            $games = Game::where('category_id',$request->category_id)->get();
            $categories = Category::where('id',$request->category_id)->get();
        }else{
            $categories    = Category::all();
            $games   = Game::all();
        }
        
        
        return view('filter')->with('games', $games)
                             ->with('categories', $categories);
    }
}
