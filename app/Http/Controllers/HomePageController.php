<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index() 
    {
        $news = News::orderByDesc('id')->paginate(8);
        $users = User::orderByDesc('id')->paginate(8);
        $products = Product::orderByDesc('id')->paginate(8);

        return view('homepage.index', compact('news', 'users', 'products'));
    }
}
