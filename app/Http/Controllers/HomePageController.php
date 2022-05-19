<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Product;
use App\Models\User;

class HomePageController extends Controller
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
    
    public function index()
    {
        $news = News::latest()->paginate(config('common.default_show_new'));
        $users = User::latest()->paginate(config('common.default_show_new'));
        $products = Product::latest()->paginate(config('common.default_show_new'));

        return view('homepage.index', compact('news', 'users', 'products'));
    }
}
