<?php

namespace App\Http\Controllers;
use App\Models\Car;
use Illuminate\Http\RedirectResponse;
use App\Models\Category;
use App\Traits\Common; 
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use Common;
   

    private $columns = ['categoryName'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Categories = Category::get();

        return view('Categories', compact('Categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
      
        $cars = Car::get();

        return view('Dashboard.AddCategory', compact('cars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        $data = $request->validate([
            'categoryName'=>'required|string',
        ]);
        Category::create($data);
        // return dd($request);
        return 'done';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Category = Category::findOrFail($id);
        return view('Dashboard.UpdateCategory',compact('Category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages= $this->messages();

        $data = $request->validate([
            'categoryName'=>'required',
        ], $messages);
    

        
        Category::where('id', $id)->update($data);
        // return dd($data);
        return 'Updated';
    }
    public function messages(){
        return [
            'categoryName.required'=>'categoryName is required',
           
        ];
    }


public function destroy(string $id): RedirectResponse
{
    Category::where('id', $id)->delete();
    return redirect('Dashboard/Categories/Categories-index');
}
}