<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use App\Models\Specialty;
use App\Models\User;
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
    public function dashboard(Request $request)
    {
        $query = auth()->user()->hasRole('admin') ? Internship::with(['specialty', 'user']) : auth()->user()->internships()->with(['specialty', 'user']);

        if ($request->has('specialty')) {
            if ($request->input('specialty') === 'all') {
                $query->where('specialty_id', '!=', null);
            } else {
                $query->where('specialty_id', $request->input('specialty'));
            }
        }

        if ($request->has('user')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->input('user') . '%');
            });
        }

        $internshipApplications = $query->paginate(5);

        // Analytics data
        $totalUsers = User::count();
        $totalInternships = Internship::count();
        $specialties = Specialty::withCount('internships')->get();

        return Inertia::render('Dashboard', [
            'internshipApplications' => $internshipApplications,
            'specialties' => Specialty::all(),
            'filters' => $request->only(['specialty', 'user']),
            'analytics' => [
                'totalUsers' => $totalUsers,
                'totalInternships' => $totalInternships,
                'specialties' => $specialties,
            ],
        ]);
    }
    public function faq()
    {
        $faqs = config('faqs');
        return Inertia::render('FAQ', [
            'faqs' => $faqs
        ]);
    }

    public function users(){
        if(auth()->user()->hasRole('admin')){
            $users = User::with(['internships.specialty'])->paginate(5);
            $schools = User::select('school')->distinct()->pluck('school');
            $specialties = Specialty::all();

            return Inertia::render('Auth/Users', [
                'users' => $users,
                'schools' => $schools,
                'specialties' => $specialties,
            ]);
        }
        return redirect()->route('dashboard');
    }
}
