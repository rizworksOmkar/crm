<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeadSource;

class LeadSourceController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'lead_source' => 'required|string|max:255',
        ]);

        LeadSource::create([
            'lead_source' => $request->lead_source,
        ]);

        return redirect()->back()->with('success', 'Lead Source created successfully!');
    }
}

