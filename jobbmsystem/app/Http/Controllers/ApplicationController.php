<?php

namespace App\Http\Controllers;

use App\Models\Application; // Make sure this is imported
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    // ... your other methods (index, etc.) might be here ...

    public function approvals()
    {
        // Fetch applications to show in your table
        $applications = Application::all(); 
        
        return view('applications.approvals', compact('applications'));
    }

    public function update(Request $request, Application $application)
{
    // Validate that the request contains the status you want
    $request->validate([
        'status' => 'required|in:approved,rejected',
    ]);

    // Update the status
    $application->update([
        'status' => $request->status,
    ]);

    return back()->with('success', 'Application status updated successfully!');
}
}