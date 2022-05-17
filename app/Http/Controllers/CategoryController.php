<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryFormRequest;
use App\Http\Helpers\Helper;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $categories = Category::with('parent');

        $pagesize = config('common.default_page_size');
        $categoryQuery = Category::where('name', 'like', "%" . Helper::escape_like($request->keyword) . "%");
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
        $categoryParents = Category::whereNull('parent_id')
            ->with('children')
            ->get();

        return view('category.create', compact('categoryParents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryFormRequest $request)
    {
        $this->insertOrUpdate($request);

        return redirect(route('categories.index'))->with(['message' => 'Create Success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::where('id', $id)->with('children')->first();

        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categoryParentFind = Category::where('id', $id)
            ->with('children')
            ->first();

        $categoryParents = Category::whereNull('parent_id')
            ->with('children')
            ->get();

        return view('category.edit', compact('category', 'categoryParentFind', 'categoryParents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryFormRequest $request, $id)
    {
        $this->insertOrUpdate($request);

        return redirect(route('categories.index'))->with(['message' => "Updated category successfully !"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();

        return redirect(route('categories.index'))->with(['message' => 'Delete Success']);
    }

    public function insertOrUpdate(CategoryFormRequest $request, $id = '')
    {
        $category = empty($id) ? new Category() : Category::findOrFail($id);
        $category->fill($request->all());
        $category->save();
    }
}
