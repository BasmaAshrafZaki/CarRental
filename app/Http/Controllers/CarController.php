<?php

namespace App\Http\Controllers;
use App\Models\Car;
use Illuminate\Http\RedirectResponse;
use App\Models\Category;
use App\Traits\Common; 
use Illuminate\Http\Request;

class CarController extends Controller
{
    use Common;
    private $columns = ['title', 'content','active',];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::get();

        return view('cars', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    $categories = Category::select('id', 'categoryName')->get();
    return view('Dashboard.AddCar', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  

        $messages= $this->messages();

        $data = $request->validate([
            'title'=>'required|string',
            'content'=>'required|string',
            'passenger'=>'required|integer',
            'luggage'=>'required|integer',
            'doors'=>'required|integer',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'price'=>'required|integer',
            'category_id'=> 'required',
        ], $messages);

        $fileName = $this->uploadFile($request->image, 'assets/dashboard/images');
        $data['image']= $fileName;
        $data['active'] = isset($request->active);
        Car::create($data);
       
        return 'done';
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::findOrFail($id);
        return view('Dashboard.CarDetails',compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::findOrFail($id);
        $categories = Category::select('id', 'categoryName')->get();
        return view('Dashboard.UpdateCar',compact('car', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages= $this->messages();

        $data = $request->validate([
            'title'=>'required',
            'content'=>'required',
            'passenger'=>'required',
            'luggage'=>'required',
            'doors'=>'required',
            'price'=>'required',
            'image' =>'sometimes|mimes:png,jpg,jpeg|max:2048',
            'category_id' => 'required',
        ], $messages);
       
        $data['active'] = isset($request->active);

        // update image if new file selected
        if($request->hasFile('image')){
            $fileName = $this->uploadFile($request->image, 'assets/dashboard/images/');
            $data['image']= $fileName;
        }

        
        Car::where('id', $id)->update($data);
        // return dd($data);
        return 'Updated';
    }
    public function messages(){
        return [
            'title.required'=>'Title is required',
            'content.required'=> 'should be text',
            'passenger.required'=>'should be integer',
            'luggage.required'=>'should be integer',
            'doors.required'=>'should be integer',
            'price.required'=>'should be integer',
        ];
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Car::findOrFail($id)->delete();

        return redirect('Dashboard/Cars/car-index');
    }


    
}




   