<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use App\Http\Requests\NewFormRequest;
use App\Http\Service\EscapeService;
use Illuminate\Http\Request;

class NewController extends Controller
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
        $newQuery = News::where('title', 'like', "%".$this->escapeService->escape_like($request->keyword)."%")
                    ->orWhere('content', 'like', "%".$this->escapeService->escape_like($request->keyword)."%");
        $news = $newQuery->paginate($pagesize);
        $news->appends($request->except('page'));
        
        $users = User::all();

        return view('news.index', compact('news', 'users')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();

        return view('news.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewFormRequest $request)
    {
        $new = new News();
        $new->fill($request->all());

        if($request->hasFile('file_upload')) {
            $newFileName = uniqid() . '-' . $request->file_upload->getClientOriginalName();
            $imagePath = $request->file_upload->storeAs('public/images/news', $newFileName);
            $new->image = str_replace('public/', '', $imagePath);
        }
        $new->save();
        
        return redirect(route('news.index'))->with(['message' => 'Create Success']);;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::findOrFail($id);

        return view('news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        $users = User::all();

        return view('news.edit', compact('news', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewFormRequest $request, $id)
    {
        $new = News::findOrFail($id);

        if($request->hasFile('file_upload')) {
            $newFileName = uniqid() . '-' . $request->file_upload->getClientOriginalName();
            $imagePath = $request->file_upload->storeAs(config('common.default_image_path'), $newFileName);
            $new->image = str_replace(config('common.default_image_path'), '', $imagePath);
        }
        $new->fill($request->all());
        $new->save();

        return redirect(route('news.index'))->with(['message' => 'Update Success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::findOrFail($id)->delete();
    
        return redirect()->route('news.index')->with(['message' => 'Delete Success']);
    }
}
