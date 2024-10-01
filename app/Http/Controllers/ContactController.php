<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\GeneralMailNotifier;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:5000',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        Mail::to('info@traitz.tech')->send(new GeneralMailNotifier(
            'New Contact Form Entry',
            'contact_form',
            $data
        ));

        return response()->json(['message' => 'Your message was received successfully. We will reach back to you soonest.']);
    }
}
