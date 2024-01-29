<?php

namespace App\Http\Controllers;
use App\Traits\Common;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class mailsendController extends Controller
{ use Common;
     public function show()
    {
        return view('SendMail');
    }



    public function create()
    {
        return view('ContactUs');
    }
    // public function send(Request $request){
    //     $content =[
    //         'First name'=>$request->Firstname,
    //         'Last name'=>$request->Lastname,
    //         'message'=>$request->message,
    //         'email'=>$request->email,
           
            
    //     ];
        

    //    Mail::to('Basma@example.com')->send(new SendMail($content ));
        
    //     return 'Done';
    // }

//     public function send()
//     {
//         $data = $request->validate([
//             'First name'=>'required|min:3',
//             'Last name'=>'required|min:3',
//             'message'=>'required|min:5',
//             'email'=>'required|email',
//         ]);
//    Mail::to('Basma@example.com')->send(new ContactUs($data ));
        
//         return dd ('sent');


//     }
// }
// public function contact(){
//     return view('ContactUs');
// }
public function received(Request $request){
    $content = [
        'Firstname' => $request->Firstname,
        'Lastname' => $request->Lastname,
        'message' => $request->message,
        'email' => $request->email,
        ];
    Mail::to('recipient@email.com')->send( 
        new SendMail($content),
    );
    
    return "mail sent!";
}

}





   
    

   
