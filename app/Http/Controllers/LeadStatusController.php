<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeadStatus;

class LeadStatusController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'status_type' => 'required|string|max:255',
        ]);

        LeadStatus::create([
            'status_type' => $request->status_type,
        ]);

        return redirect()->back()->with('success', 'Lead Status created successfully!');
    }
}

