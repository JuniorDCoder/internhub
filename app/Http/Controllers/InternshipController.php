<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserInternshipRequest;
use App\Models\Internship;
use Illuminate\Http\Request;
use App\Mail\GeneralMailNotifier;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

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

        // Send email notification
        $emailData = [
            'name' => $user->name,
            'specialty' => $internship->specialty->name,
            'start_date' => date('F j, Y', strtotime($internship->start_date)),
            'end_date' => date('F j, Y', strtotime($internship->end_date)),
        ];
        Mail::to($user->email)->send(new GeneralMailNotifier(
            'Your Internship Application is Under Review',
            'internship_application_review',
            $emailData
        ));

        return redirect()->route('apply')->with('success', 'Your application has been submitted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Internship $internship)
    {
        return Inertia::render('Auth/ApplicationDetails', [
            'internship' => $internship->load(['specialty', 'user']),
        ]);
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
        $status = $request->input('status');
        $isAccepted = $status === 'accepted';

        $internship->update([
            'status' => $status,
            'is_accepted' => $isAccepted,
        ]);

        $data = [
            'name' => $internship->user->name,
            'status' => $status,
            'whatsapp_link' => 'https://chat.whatsapp.com/ChKewkUoqky94qGgbrPJBQ',
        ];

        $subject = $isAccepted ? 'Congratulations! Your Internship Application is Accepted' : 'Update on Your Internship Application';

        Mail::to($internship->user->email)->send(new GeneralMailNotifier($subject, 'internship_application_status', $data));

        return redirect()->back()->with('success', 'Internship status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $application = Internship::findOrFail($id);
        $application->delete();

        return redirect()->back()->with('success', 'Application deleted successfully.');
    }
}
