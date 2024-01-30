<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Traits\Common; 
class UserController extends Controller
{
    use Common;
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Users = User::get();

        return view('Users', compact('Users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.AddUser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages= $this->messages();

        $data = $request->validate([
            'name'=>'required',
            'username'=>'required',
            'email'=>'required',
            'password' => 'required',
           
        ], $messages);

        $data['active'] = isset($request->active);
        User::create($data);
       
        return 'done';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $User = User::findOrFail($id);
        return view('Dashboard.UserDetails',compact('User'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $User = User::findOrFail($id);
        return view('Dashboard.UpdateUser',compact('User'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages= $this->messages();

        $data = $request->validate([
            'name'=>'required',
            'username'=>'required',
            'email'=>'required',
            'password' => 'required',
           
        ], $messages);

        $data['active'] = isset($request->active);
        User::create($data);
       
        
        User::where('id', $id)->update($data);
        // return dd($data);
        return 'Updated';
    }
    public function messages(){
        return [
            'name.required'=>' required',
            'username.required'=> 'required',
            'email.required'=>' required',
            'password.required'=>' required',

        ];
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id):RedirectResponse
    {
        User::findOrFail($id)->delete();
        return redirect()->route('Users');
    }
}
