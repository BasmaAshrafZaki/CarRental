<?php

namespace App\Http\Controllers;
use App\Traits\Common;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Mail;

class mailsendController extends Controller

{ private $columns = ['firstName', 'lastName','message', 'email'];
    use Common;
    public function show(string $id)
    {
        $Message = ContactUs::findOrFail($id);
        return view('Dashboard.showMessage',compact('Message'));
    }
 
    public function create()

    {
        return view('ContactUs');
    }
  
public function received(Request $request){
    // return dd($request);
    $messages= $this->messages();

    $data = $request->validate([
        'firstName'=>'required',
        'lastName'=>'required',
        'message'=>'required',
        'email' => 'required',
       
    ], $messages);

    ContactUs::create($data);

    Mail::to('recipient@email.com')->send( 
        new SendMail($data),
    );
    
     return "mail sent!";
}
public function messages(){
    return [
        'firstName.required'=>'firstName is required',
        'lastName.required'=> 'lastName is required',
        'message.required'=>'message is required',
        'email.required'=>'email is required',
       
    ];
}



public function index()
{
   
    $Messages = ContactUs::get();
    // return dd($Messages);
    return view('Messages', compact('Messages'));
 
}


public function destroy($id):RedirectResponse
{
    ContactUs::findOrFail($id)->delete();
    return redirect()->route('Messages');
} 
}









   


 
