<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Helper;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\Maker;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $products = Product::where('name', 'like', "%" . Helper::escape_like($keyword) . "%");
        if ($request->get('maker')) {
            $products->where('maker_id', $request->maker);
        }

        $products = $products->latest()->paginate(config('common.default_page_size'))->appends($request->except('page'));

        $makers = Maker::all();
        $categories = Category::all();

        return view('product.index', compact('products', 'keyword', 'makers', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $makers = Maker::all();
        $categories = Category::all();

        return view('product.add', compact('makers', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $this->insertOrUpdate($request);

        return redirect()->back()->with(['message' => 'Create Product Success']);
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

    public function insertOrUpdate($request, $id = '')
    {
        $product = empty($id) ? new Product() : Product::findOrFail($id);

        $product->fill($request->all());
        if ($request->hasFile('product_image')) {
            $newFileName = uniqid() . '-' . $request->product_image->getClientOriginalName();
            $request->product_image->storeAs(config('common.default_image_path') . 'products', $newFileName);
            $product->image = $newFileName;
        }
        $product->save();
          
        foreach ($request->category as $category_id) {
            $product->category()->attach($category_id);
        }
    }
}
