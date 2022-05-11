<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Service\EscapeService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $escapeService;
    public function __construct(EscapeService $escapeService)
    {
        $this->escapeService = $escapeService;
    }

    public function index(Request $request)
    {
        $pagesize = config('common.default_page_size');
        $categoryQuery = Category::where('name', 'like', "%".$this->escapeService->escape_like($request->keyword)."%");
                    // ->orWhere('c', 'like', "%".$this->escapeService->escape_like($request->keyword)."%");
        $categories = $categoryQuery->paginate($pagesize);
        $categories->appends($request->except('page'));

        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
