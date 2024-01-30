<?php

namespace App\Http\Controllers;
use App\Models\Car;
use Illuminate\Http\RedirectResponse;
use App\Models\Category;
use App\Traits\Common; 
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Website.index');
    }
    public function blog()
    {
        return view('Website.blog');
    }
    public function listing()
    {
        $cars = Car::get();
        return view('Website.listing',compact('cars'));
      
    }
    public function single()

    {
        $cars = Car::get();
        return view('Website.single',compact('cars'));
    }
    public function testimonials()
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('Website.testimonials',compact('testimonial'));
      
    }
    public function about()
    {
        return view('Website.about');
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
        //
    }

    /**
     * Display the specified resource.
     */
    

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
    public function destroy(string $id)
    {
        //
    }
}
