<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Helper;
use App\Http\Requests\MakerFormRequest;
use App\Models\Maker;
use Illuminate\Http\Request;

class MakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyWord = $request->input('keyword');
        $makers = Maker::where('name', 'like', "%" . Helper::escape_like($keyWord) . "%")
            ->latest()
            ->paginate(config('common.default_page_size'));

        return view('maker.index', compact('makers', 'keyWord'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maker.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MakerFormRequest $request)
    {
        $maker = Maker::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        if ($request->hasFile('image')) {
            $newFileName = uniqid() . '-' . $request->image->getClientOriginalName();
            $imagePath = $request->image->storeAs(config('common.default_image_path') . 'makers', $newFileName);
            $maker->image = str_replace(config('common.default_image_path') . 'makers', '', $imagePath);
        }
        $maker->save();

        return redirect('/makers')->with(['message' => 'Add Success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $maker = Maker::findOrFail($id);

        return view('maker.show', compact('maker'));
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
