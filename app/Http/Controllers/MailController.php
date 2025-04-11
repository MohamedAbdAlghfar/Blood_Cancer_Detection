<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\AdminNotification;

class MailController extends Controller
{
    public function sendEmail(Request $request)
    {
        // Validate request data
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Email data
        $data = [
            'name' => $request->name, 
            'email' => $request->email,
            'message' => $request->message,
        ]; 

        // Send email to admin
        Mail::to('mohammedabdodv@gmail.com')->send(new AdminNotification($data));

        return back()->with('success', 'Email sent successfully!');
    }
}
