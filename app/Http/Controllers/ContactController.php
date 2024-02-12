<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function submitForm(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        // Handle the form submission (e.g., send an email, store in the database, etc.)
        // You can add your logic here.

        // Assuming a successful submission
        return response()->json(['success' => 'You have successfully subscribed']);
    }
}
