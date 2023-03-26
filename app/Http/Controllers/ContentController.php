<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function upload(Request $request)
    { 
        $uploadImg = request()->file('file')->store('images/contents', 'public');
        
        return response()->json(['location' => "/storage/$uploadImg" ]);
    }
}
