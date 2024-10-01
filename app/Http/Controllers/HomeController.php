<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function about(){
        return Inertia::render('About');
    }

    public function contact()
    {
        return Inertia::render('Contact');
    }

    public function fees()
    {
        return Inertia::render('Fees');
    }
    public function fields()
    {
        return Inertia::render('Fields');
    }
    public function apply()
    {
        return Inertia::render('Auth/Apply',[
            'specialties' => Specialty::all()
        ]);
    }
    public function dashboard()
    {

        return Inertia::render('Dashboard', [
            'internshipApplications' => auth()->user()->internships()->with(['specialty', 'user'])->get(),
        ]);
    }
}
