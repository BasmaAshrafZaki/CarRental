<?php

namespace App\Http\Controllers;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Traits\Common; 
use Illuminate\Http\RedirectResponse;


class TestimonialController extends Controller
{
    use Common;
    private $columns = ['name', 'content','position','published',];
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $Testimonials =Testimonial::get();

        return view('Testimonials', compact('Testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
         return view('Dashboard.AddTestimonials');
            
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages= $this->messages();

        $data = $request->validate([
            'name'=>'required',
            'content'=>'required',
            'position'=>'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
           
        ], $messages);

        $fileName = $this->uploadFile($request->image, 'assets/dashboard/images');
        $data['image']= $fileName;
        $data['published'] = isset($request->published);
        Testimonial::create($data);
       
        return 'done';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('Dashboard.TestimonialDetails',compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('Dashboard.UpdateTestimonials',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages= $this->messages();

        $data = $request->validate([
            'name'=>'required',
            'content'=>'required',
            'position'=>'required',
            'image' =>'sometimes|mimes:png,jpg,jpeg|max:2048',
        ], $messages);
       
        $data['published'] = isset($request->published);

        // update image if new file selected
        if($request->hasFile('image')){
            $fileName = $this->uploadFile($request->image, 'assets/dashboard/images/');
            $data['image']= $fileName;
        }

        
        Testimonial::where('id', $id)->update($data);
        // return dd($data);
        return 'Updated';
    }
    public function messages(){
        return [
            'name.required'=>'name is required',
            'content.required'=> 'should be text',
            'position.required'=>' required',

        ];
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id):RedirectResponse
    {
        Testimonial::findOrFail($id)->delete();
        return redirect()->route('Testimonials-index');
    }
}
