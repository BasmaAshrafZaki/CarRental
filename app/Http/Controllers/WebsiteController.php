<?php

namespace App\Http\Controllers;
use App\Models\Car;
use Illuminate\Http\RedirectResponse;
use App\Models\Category;
use App\Models\Testimonial;
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
        $recentTestimonials = Testimonial::where('published', true)->latest()->take(3)->get();
        $recentCars = Car::where('active', 1)->latest()->take(6)->get();
        return view('Website/pages/home',compact('recentTestimonials','recentCars'));
    }
    public function blog()
    {
        return view('Website/pages/blog');
    }
    public function listing()
    {
        $cars = Car::get();
        $recentTestimonials = Testimonial::where('published', true)->latest()->take(3)->get();
        return view('Website/pages/listing',compact('cars','recentTestimonials'));
      
    }
    public function single(string $id)

    {  $car = Car::findOrFail($id);
        $allCategories = Category::select('id', 'categoryName')->get();
        return view('Website/pages/single',compact('car','allCategories'));
    }
    public function testimonials( )
    {
        $testimonials = Testimonial::get();
        
        return view('Website/pages/testimonials',compact('testimonials'));
      
    }
    public function about()
    {
        return view('Website/pages/about');
    }
    public function ContactUs()
    {
        return view('Website/pages/ContactUs');
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
