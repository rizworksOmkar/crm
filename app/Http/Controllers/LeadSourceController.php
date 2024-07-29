<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeadSource;

class LeadSourceController extends Controller
{
    public function view(){
        $sources = LeadSource::all();
        return view('admin.masters.sources.source', compact('sources'));
    }
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
    public function destroy(LeadSource $source)
    {
        $source->delete();
        return redirect()->route('lead-sources.view')->with('success', 'Property Type deleted successfully!');
    }

}

