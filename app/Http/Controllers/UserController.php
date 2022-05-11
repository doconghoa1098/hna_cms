<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = new User();
        $users = $user->Paginate($user::PAGINATE_SIZE);

        $keyWord = $request->input('keyword');
        $users = User::where('name', 'like', "%$keyWord%")
            ->orWhere('email', 'like', "%$keyWord%")
            ->orWhere('id', 'like', "%$keyWord%")
            ->orderBy('id', 'desc')
            ->paginate($user::PAGINATE_SIZE);

        return view('users.index',compact('users','keyWord'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email = $request->email;
        $name = $request->name;
        $password = $request->password;
        $role = $request->role;
        $user = User::create([
            'email' => $email,
            'name' => $name,
            'role' => $role,
            'password' => Hash::make($password) 
        ]);
        if($request->hasFile('image')) {
            $newFileName = uniqid() . '-' . $request->image->getClientOriginalName();
            $imagePath = $request->image->storeAs('public/images/users', $newFileName);
            $user->image = str_replace('public/images/users', '', $imagePath);
        }
        $user->save();

        return redirect('/users')->with(['message' => 'Add Success']);
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
        $user = User::findOrFail($id);
        
        return view('users.edit',compact('user'));
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
        $user = User::findOrFail($id);

        $user->fill($request->all());
        if($request->hasFile('image')) {
            $newFileName = uniqid() . '-' . $request->image->getClientOriginalName();
            $imagePath = $request->image->storeAs('public/images/users', $newFileName);
            $user->image = str_replace('public/images/users', '', $imagePath);
        }
        $user->save();

        return redirect('/users')->with(['message' => 'Update Success']);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->back()->with(['message' => 'Delete Success']);
    }
}
