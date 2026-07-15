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
}