<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Category;
use App\Models\Item;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;


class HomeController extends Controller
{
    public function view()
    {
        $services=Service::latest()->take(4)->get();
        $categories=Category::with('tag')->get();
        $chefs=TeamMember::latest()->take(4)->get();
        $about=AboutUs::first();
        $countChef=TeamMember::count();
        $testimonials=Testimonial::latest()->get();
        $items=Item::all();

        // dd($items->pluck('category_id'), $categories->pluck('id'));
        // die;
        
        $selectedItems = [];

        foreach ($categories as $category) {
            $selectedItems[$category->id] = $items->filter(function ($item) use ($category) {
                return $item->category_id === $category->id; // Compare category_id of item with id of category
            });
        }
        // dd($selectedItems);
        // die;
        return view('Frontend.pages.index',compact('services','categories','selectedItems','chefs','testimonials','about','countChef'));
    }
    public function about()
    {
        $PageTitle="About Us";
        $title="About";
        $chefs=TeamMember::latest()->take(4)->get();
        $about=AboutUs::first();
        $countChef=TeamMember::count();
        return view('Frontend.pages.about', compact('about','countChef','chefs','PageTitle','title'));
    }
    public function service()
    {

        $PageTitle="Services";
        $title="Services";
        $services=Service::latest()->get();
        return view('Frontend.pages.service',compact('PageTitle','title','services'));
    }
    public function menu()
    {
        $categories=Category::with('tag')->get();
        $items=Item::all();
        $selectedItems = [];

        foreach ($categories as $category) {
            $selectedItems[$category->id] = $items->filter(function ($item) use ($category) {
                return $item->category_id === $category->id; // Compare category_id of item with id of category
            });
        }
        $PageTitle="Food Menu";
        $title="Menu";
        return view('Frontend.pages.menu', compact('PageTitle','title','categories','items','selectedItems'));
    }
    public function booking()
    {
        $PageTitle="Booking";
        $title="Booking";
        $categories=Category::with('tag')->get();
        return view('Frontend.pages.booking', compact('PageTitle','title','categories'));
    }
    public function team()
    {
        $PageTitle="Our Team";
        $title="Team"; 
        $chefs=TeamMember::latest()->get();
        return view('Frontend.pages.team',compact('PageTitle','title','chefs'));
    }
    public function testimonials()
    {
        $PageTitle="Testimonial";
        $title="Testimonial"; 
        $testimonials=Testimonial::latest()->get();
        return view('Frontend.pages.testimonials',compact('PageTitle','title','testimonials'));
    }
    public function contact()
    {
        $PageTitle="Contact Us";
        $title="Contact"; 
        return view('Frontend.pages.contact',compact('PageTitle','title'));
    }
}
