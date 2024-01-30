<?php

namespace App\Http\Controllers;
use App\Models\Car;
use Illuminate\Http\RedirectResponse;
use App\Models\Category;
use App\Traits\Common; 
use App\Models\ContactUs;
use App\Models\Message;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ContactUss = ContactUs::get();

        return view('ContactUss', compact('ContactUss'));
     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages= $this->messages();

        $data = $request->validate([
            'firstName'=>'required',
            'lastName'=>'required',
            'message'=>'required',
            'email' => 'required',
           
        ], $messages);

        ContactUs:create($data);
       
        return 'done';
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ContactUss = ContactUs::findOrFail($id);
        return view('Dashboard.showMessage',compact('ContactUss'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id):RedirectResponse
    {
        ContactUss::findOrFail($id)->delete();
        return redirect()->route('ContactUss');
    }
}
