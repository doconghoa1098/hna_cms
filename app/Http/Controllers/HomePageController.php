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
        $news = News::latest()->paginate(config('common.default_show_new'));
        $users = User::latest()->paginate(config('common.default_show_new'));
        $products = Product::latest()->paginate(config('common.default_show_new'));

        return view('homepage.index', compact('news', 'users', 'products'));
    }
}
