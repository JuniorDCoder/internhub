<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserInternshipRequest;
use App\Models\Internship;
use Illuminate\Http\Request;

class InternshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreUserInternshipRequest $request)
    {
        $user = auth()->user();
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->school = $request->school;
        $user->level = $request->level;

        if ($request->hasFile('resume')) {
            $user->resume = $request->file('resume')->store('resumes');
        }
        $user->save();

        $internship = new Internship();
        $internship->user()->associate($user);
        $internship->specialty_id = $request->specialty;
        $internship->start_date = $request->start_date;
        $internship->end_date = $request->end_date;
        $internship->is_accepted = false;
        $internship->status = 'pending';
        $internship->save();

        $slackNotification = new SendSlackNotification();
        $slackNotification->sendInternshipNotification($internship);

        return redirect()->route('apply')->with('success', 'Your application has been submitted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Internship $internship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Internship $internship)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Internship $internship)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Internship $internship)
    {
        //
    }
}
